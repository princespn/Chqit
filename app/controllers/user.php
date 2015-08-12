<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	public function index()
	{
		
		if(($this->session->userdata('user_name')!=""))
		{
			$this->welcome();
		}
		else{
			if(($this->session->userdata('user_name')==""))
			{
				
			$data['title']= 'Inventory Management';
			$this->load->view('header_view',$data);
			$this->load->view("login_view.php", $data);
			$this->load->view('footer_view',$data);
				
			}
			else			
			{
			$data['title']= 'Welcome New User in Inventory Management';
			$this->load->view('header_view',$data);
			$this->load->view("register_view.php", $data);
			$this->load->view('footer_view',$data);
				
				
			}
			
		}
	}
	public function welcome()
	{
		$data['title']= 'Welcome to Inventory Management';
		$this->load->view('header_view',$data);
		$this->load->view('welcome_view.php', $data);
		$this->load->view('footer_view',$data);
	}
	public function login()
	{
		$this->load->library('form_validation');
		// field name, error message, validation rules
		$this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$email = $this->input->post('email');
		$password = md5($this->input->post('pass'));

		$result = $this->user_model->login($email,$password);
		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else {
			if ($this->input->post('btn_login') == "Login")
               {
				 if ($result > 0) 
                    {
						$this->welcome();
						
					}
				 else
                    {
                         $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username or password!</div>');
                         $this->index();
                    }
						
				   
			   }
			else
               {
                    $this->index();
               }
			
			
		}
		
	}
	public function thank()
	{
		$data['title']= 'Thank';
		$this->load->view('header_view',$data);
		$this->load->view('thank_view.php', $data);
		$this->load->view('footer_view',$data);
	}
	public function register()
	{
		$this->load->library('form_validation');
		// field name, error message, validation rules
		$this->form_validation->set_rules('user_name', 'User Name', 'trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('email_address', 'Your Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');

		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$this->user_model->add_user();
			$this->thank();
		}
	}
	public function logout()
	{
		$newdata = array(
		'user_id'   =>'',
		'user_name'  =>'',
		'user_email'     => '',
		'logged_in' => FALSE,
		);
		$this->session->unset_userdata($newdata );
		$this->session->sess_destroy();
		$this->index();
	}
}
?>