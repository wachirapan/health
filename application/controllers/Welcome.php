<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->library("pagination");
			if($this->session->userdata('userlogin') == ""){
			redirect("LoginPage/login","refresh");
			exit();
		}
	}
	public function setsessionindex()
	{
		$this->session->set_userdata(array("projectid"=>$this->input->get("pk")));
		redirect("welcome/index","refersh");
		exit();
	}
	public function index()
	{
		if(empty($this->session->userdata('projectid'))){
			redirect("welcome/groupproject","refresh");
			exit();
		}else {
			$config = array();
			$config["base_url"] = base_url() . "index.php/welcome/index";
			$config["total_rows"] = $this->QueryModel->getcountcruit();
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
			$config['full_tag_close'] = '</ul></nav></div>';
			$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close'] = '</span></li>';
			$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
			$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['next_tag_close'] = '<span aria-hidden="true"></span></span></li>';
			$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['prev_tag_close'] = '</span></li>';
			$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['first_tag_close'] = '</span></li>';
			$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['last_tag_close'] = '</span></li>';
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			$data["results"] = $this->QueryModel->qrecruit($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
			$this->load->view('header');
			$this->load->view('index', $data);
			$this->load->view('footer');
		}
	}
	public function moo()
	{
		$this->load->view('header');
		$this->load->view('moo/moo');
		$this->load->view('footer');
	}
	public function tumbol()
	{
		$this->load->view('header');
		$this->load->view('tumbol/tumbol');
		$this->load->view('footer');
	}
	function register()
	{
		$config = array();
		$config["base_url"] = base_url() . "index.php/welcome/register";
		$config["total_rows"] = $this->QueryModel->qcountpersonal();
		$config["per_page"] = 5;
		$config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav></div>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close'] = '<span aria-hidden="true"></span></span></li>';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close'] = '</span></li>';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] = '</span></li>';
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close'] = '</span></li>';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data["results"] = $this->QueryModel->qpersonal($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();

		$this->load->view('header');
		$this->load->view('register/register', $data);
		$this->load->view('footer');
	}
	function position()
	{
		$this->load->view('header');
		$this->load->view('position/position');
		$this->load->view('footer');
	}
	function screening()
	{
		$this->load->view('header');
		$this->load->view('screening/screening');
		$this->load->view('footer');
	}
	function groupproject()
	{
		$config = array();
		$config["base_url"] = base_url() . "index.php/welcome/groupproject";
		$config["total_rows"] = $this->QueryModel->qcountproject();
		$config["per_page"] = 50;
		$config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav></div>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close'] = '<span aria-hidden="true"></span></span></li>';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close'] = '</span></li>';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] = '</span></li>';
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close'] = '</span></li>';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data["results"] = $this->QueryModel->qproject($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();

		$this->load->view('header');
		$this->load->view('groupproject/groupproject',$data);
		$this->load->view('footer');
	}
	function projectjoin()
	{
		$config = array();
		$config["base_url"] = base_url() . "index.php/welcome/projectjoin";
		$config["total_rows"] = $this->QueryModel->qcountcheckregis();
		$config["per_page"] = 50;
		$config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav></div>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close'] = '<span aria-hidden="true"></span></span></li>';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close'] = '</span></li>';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] = '</span></li>';
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close'] = '</span></li>';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data["results"] = $this->QueryModel->qcheckregis($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();

		$this->load->view('header');
		$this->load->view('projectjoin/projectjoin', $data);
		$this->load->view('footer');
	}
	function schedule()
	{
		$this->load->view('header');
		$this->load->view('schedule/schedule');
		$this->load->view('footer');
	}
	function leave()
	{
		$this->load->view('header');
		$this->load->view('leave/leave');
		$this->load->view('footer');
	}
	function carlenda()
	{
		$this->load->view('header');
		$this->load->view('carlenda/carlenda');
		$this->load->view('footer');
	}
	function information()
	{
		$id = $this->input->get('id');
		$name = $this->input->get('name');
		$lastname = $this->input->get('lastname');
		$result = array("id"=>$id, "name"=>$name, "lastname"=>$lastname);
		$this->load->view('header');
		$this->load->view('information/information',$result);
		$this->load->view('footer');
	}
	function fishishforvolunteer()
	{
		$this->load->view('header');
		$this->load->view('fishishforvolunteer/fishishforvolunteer');
		$this->load->view('footer');
	}
	function infodocter()
	{
		$this->load->view('header');
		$this->load->view('infodocter/infodocter');
		$this->load->view('footer');
	}
	function infomationdoc()
	{
		$id = $this->input->get('id');
		$name = $this->input->get('name');
		$lastname = $this->input->get('lastname');
		$result = array("id"=>$id, "name"=>$name, "lastname"=>$lastname);
		$this->load->view('header');
		$this->load->view('infomationdoc/infomationdoc',$result);
		$this->load->view('footer');
	}
	function resultdoctor()
	{
		$this->load->view('header');
		$this->load->view('resultdoctor/resultdoctor');
		$this->load->view('footer');
	}
	function ambulance()
	{
		$this->load->view('header');
		$this->load->view('ambulance/ambulance');
		$this->load->view('footer');
	}
	function outofproject()
	{
		$config = array();
		$config["base_url"] = base_url() . "index.php/welcome/outofproject";
		$config["total_rows"] = $this->QueryModel->qcountoutofproject();
		$config["per_page"] = 50;
		$config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav></div>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close'] = '<span aria-hidden="true"></span></span></li>';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close'] = '</span></li>';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] = '</span></li>';
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close'] = '</span></li>';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data["results"] = $this->QueryModel->qoutofproject($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();

		$this->load->view('header');
		$this->load->view('outofproject/outofproject',$data);
		$this->load->view('footer');
	}
}
