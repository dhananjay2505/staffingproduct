<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobsearchmodel extends CI_model {

	/*this function for new register user*/

	public function statedata()
	{
		
		$q = $this->db->select('Job_state')
					->distinct()
						->get('job_detail');
		if ($q->num_rows()>0) {
			return $q->result();
			
		}else{
			return false;
		}
		
	}


	public function locationdata()
	{
		
		$q = $this->db->select('job_location')
					->distinct()
						->get('job_detail');
		if ($q->num_rows()>0) {
			return $q->result();
			
		}else{
			return false;
		}
		
	}

	public function business_type()
	{
		
		$q = $this->db->select('business_type')
					->distinct()
						->get('job_detail');
		if ($q->num_rows()>0) {
			return $q->result();
			
		}else{
			return false;
		}
	}

	public function job_type()
	{
		
		$q = $this->db->select('job_type')
					->distinct()
						->get('job_detail');
		if ($q->num_rows()>0) {
			return $q->result();
			
		}else{
			return false;
		}
	}


	/*expreince*/

	public function expreince()
	{
		
		$q = $this->db->select('experience')
					->distinct()
						->get('job_detail');
		if ($q->num_rows()>0) {
			return $q->result();
			
		}else{
			return false;
		}


		
	}


	public function fetalljobs(){
	
		$q = $this->db->get('job_detail');
		if ($q->num_rows()>0) {
			return $q->result();
			
		}else{
			return false;
		}		
	}


	public function make_query($search_box_data, $city, $state, $expreinces, $job_type, $industry, $minimum_price, $maximum_price)
	 {
	  $query = "
	  SELECT * FROM job_detail WHERE created_at IS NOT NULL ";

	  if(isset($minimum_price, $maximum_price) && !empty($minimum_price) &&  !empty($maximum_price))
	  {
	   $query .= "
	    AND monthly_salary BETWEEN '".$minimum_price."' AND '".$maximum_price."'
	   ";
	  }

	  if(isset($search_box_data))
	  {
	   $query .= "
	    AND job_title LIKE('%".$search_box_data."%')
	   ";
	  }

	  if(isset($city))
	  {
	   $storage_filter = implode("','", $city);
	   $query .= "
	    AND Job_state IN('".$storage_filter."')
	   ";
	  }

	  if(isset($state))
	  {
	   $state_filter = implode("','", $state);
	   $query .= "
	    AND job_location IN('".$state_filter."')
	   ";
	  }

	  if(isset($expreinces))
	  {
	   $expreinces_filter = implode("','", $expreinces);
	   $query .= "
	    AND experience IN('".$expreinces_filter."')
	   ";
	  }

	  if(isset($industry))
	  {
	   $industry_filter = implode("','", $industry);
	   $query .= "
	    AND business_type IN('".$industry_filter."')
	   ";
	  }

	  if(isset($job_type))
	  {
	   $job_type_filter = implode("','", $job_type);
	   $query .= "
	    AND job_type IN('".$job_type_filter."')
	   ";
	  }

	  return $query;
	 }

	public function count_all($search_box_data, $city, $state, $expreinces, $job_type, $industry, $minimum_price, $maximum_price)
	 {
	  $query = $this->make_query($search_box_data, $city, $state, $expreinces, $job_type, $industry, $minimum_price, $maximum_price);
	  $data = $this->db->query($query);
	  return $data->num_rows();
	 }




	public function fetch_data($limit, $start, $search_box_data, $city, $state, $expreinces, $job_type, $industry, $minimum_price, $maximum_price)
	{
	  $query = $this->make_query($search_box_data, $city, $state, $expreinces, $job_type, $industry, $minimum_price, $maximum_price);
	  $query .= ' ORDER BY Job_detail_id DESC ';
	  $query .= ' LIMIT '.$start.', ' . $limit;

	  $data = $this->db->query($query);

	  $output = '';
	  if($data->num_rows() > 0)
	  {
	   foreach($data->result_array() as $row)
	   {

	    $output .= '
	    <li>
	     <a href="'.base_url('jobdetails/').$row['Job_detail_id'].'/" href="Jobdetails">
	     	<div class="job_container">
	     		<div class="job_img"> <img src="'.base_url('assets/images/job_2.png').'" /> </div>
	     			<div class="job_caption">
	     				<span class="primery_title">'. $row['company_name'].'</span>
	     				<span class="second_subtitle">'.$row['job_title'].'</span>
	     				<ul class="service_tag">
	     					<li> <span class="icon_set icon-placeholders-1 mr_5"></span>'.$row['Job_state'].'</li>
	     					<li><span class="icon_set icon-wall-clock mr_5"></span>'.$this->get_time_ago(strtotime($row['created_at'])).'</li>
	     					<li> <span class="icon_set icon-work mr_5"></span>'.$row['experience'].'</li>
	     				</ul>
	     				<span class="part_time">'.$row['job_type'].'</span>
	     			</div>
	     		</div>
	     	</div>
	     </a>
	    </li>

	     
	    ';
	   }
	  }
	  else
	  {
	   $output = '<h3>No Data Found</h3>';
	  }
	  return $output;
	 }


	public function count_row_data($search_box_data, $city, $state, $expreinces, $job_type, $industry, $minimum_price, $maximum_price)
	{
	  $query = $this->make_query($search_box_data, $city, $state, $expreinces, $job_type, $industry, $minimum_price, $maximum_price);

	  $data = $this->db->query($query);
	  return $data->num_rows();
	}


	public function get_time_ago( $time )
	{
		date_default_timezone_set("Asia/Calcutta");
	    $time_difference = time() - $time;

	    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
	    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
	                30 * 24 * 60 * 60       =>  'month',
	                24 * 60 * 60            =>  'day',
	                60 * 60                 =>  'hour',
	                60                      =>  'minute',
	                1                       =>  'second'
	    );

	    foreach( $condition as $secs => $str )
	    {
	        $d = $time_difference / $secs;

	        if( $d >= 1 )
	        {
	            $t = round( $d );
	            return  $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
        	}
   	 	}
	}

	public function fetch_data_search()
 	{
  		$query = $this->db->select('job_title')
					->distinct()
					->get('job_detail');
  				
  		if($query->num_rows() > 0)
  		{
  			return $query->result();
  		}
  	}

  	public function searchdatamodal($title){
  		$data = $this->db->like('job_title', $title)
  					->get('job_detail');

  		$output = '';
		if($data->num_rows() > 0)
		{
			foreach($data->result_array() as $row)
			{

		    $output .= '
		    <li>
		     <a href="'.base_url('jobdetails/').$row['Job_detail_id'].'/" href="Jobdetails">
		     	<div class="job_container">
		     		<div class="job_img"> <img src="'.base_url('assets/images/job_2.png').'" /> </div>
		     			<div class="job_caption">
		     				<span class="primery_title">'. $row['company_name'].'</span>
		     				<span class="second_subtitle">'.$row['job_title'].'</span>
		     				<ul class="service_tag">
		     					<li> <span class="icon_set icon-placeholders-1 mr_5"></span>'.$row['Job_state'].'</li>
		     					<li><span class="icon_set icon-wall-clock mr_5"></span>'.$this->get_time_ago(strtotime($row['created_at'])).'</li>
		     					<li> <span class="icon_set icon-work mr_5"></span>'.$row['experience'].'</li>
		     				</ul>
		     				<span class="part_time">'.$row['job_type'].'</span>
		     			</div>
		     		</div>
		     	</div>
		     </a>
		    </li>

		     
		    ';
		   }
		  }
		  else
		  {
		   $output = '<h3>No Data Found</h3>';
		  }
		  return $output;
  	}

}
