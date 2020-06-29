<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobsearch extends CI_Controller {

	public $CI = NULL;

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('user_token')) {
			redirect('/login/');
		}
		$this->CI = & get_instance();
		$this->load->model('Jobsearchmodel');
		$this->load->database();
	}	
	public function index()
	{
		
		//$this->load->view('inc/header');

		$this->load->model('Jobdetailsmodel');
		$searchjob['state'] = $this->Jobsearchmodel->statedata();
		$searchjob['locationdata'] = $this->Jobsearchmodel->locationdata();
		$searchjob['job_type'] = $this->Jobsearchmodel->job_type();
		$searchjob['business'] = $this->Jobsearchmodel->business_type();
		$searchjob['expreince'] = $this->Jobsearchmodel->expreince();
		$this->load->view('job_search', $searchjob);
		
		
	}

	public function fetch_data()
	{
		$search_box_data = $this->input->post('search');
	  	$city = $this->input->post('city');
	  	$state = $this->input->post('state');
	  	$expreinces = $this->input->post('expreinces');
	  	$job_type = $this->input->post('job_type');
	  	$industry = $this->input->post('industry');
	  	$minimum_price = $this->input->post('minimum_price');
	  	$maximum_price = $this->input->post('maximum_price');

	  	$this->load->library('pagination');
	  	$config = array();
	  	$config['base_url'] = '#';
	  	$config['total_rows'] = $this->Jobsearchmodel->count_all($search_box_data, $city, $state, $expreinces, $job_type, $industry, $minimum_price, $maximum_price);
	  	$config['per_page'] = 10;
	  	$config['uri_segment'] = 3;
	  	$config['use_page_numbers'] = TRUE;
	  	$config['full_tag_open'] = '<ul class="pagination">';
	  	$config['full_tag_close'] = '</ul>';
	  	$config['first_tag_open'] = '<li class="page-item">';
	  	$config['first_tag_close'] = '</li>';
	  	$config['last_tag_open'] = '<li>';
	  	$config['last_tag_close'] = '</li>';
	  	$config['next_link'] = '&gt;';
	  	$config['next_tag_open'] = '<li>';
	  	$config['next_tag_close'] = '</li>';
	  	$config['prev_link'] = '&lt;';
	  	$config['prev_tag_open'] = '<li>';
	  	$config['prev_tag_close'] = '</li>';
	  	$config['cur_tag_open'] = "<li class='active page-item'><a class='page-link' href='#'>";
	  	$config['cur_tag_close'] = '</a></li>';
	  	$config['num_tag_open'] = '<li>';
	  	$config['num_tag_close'] = '</li>';
	  	$config['num_links'] = 3;
	  	$this->pagination->initialize($config);
	  	$page = $this->uri->segment(3);
	  	$start = ($page - 1) * $config['per_page'];
	  	$output = array(
		   'pagination_link'  => $this->pagination->create_links(),
		   'product_list'   => $this->Jobsearchmodel->fetch_data($config["per_page"], $start, $search_box_data, $city, $state, $expreinces, $job_type, $industry, $minimum_price, $maximum_price),
		   'count' => $this->Jobsearchmodel->count_row_data($search_box_data, $city, $state, $expreinces, $job_type, $industry, $minimum_price, $maximum_price)
		  );
	  echo json_encode($output);
	 }

	public $array = array();
	public function fetch_search()
	{
		if ($data = $this->Jobsearchmodel->fetch_data_search()) {
			foreach ($data as $lue) {
			$array[] = ucfirst(strtolower($lue->job_title));
		}
		echo json_encode($array);
		}else{
			show_404();
		}
		
			
	}

	public function search($q=""){
		$getdata = $this->input->get('q');
		$this->index();
		$fetch = $this->Jobsearchmodel->searchdatamodal($getdata);
	}

}
