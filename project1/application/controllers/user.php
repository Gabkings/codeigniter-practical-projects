<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	}

	public function update()
	{
		$result = $this->user_model->update(['login' => 'Gabkings1'],2);
		print_r($result);
	}
		


	public function test_get()
	{
		$re = $this->user_model->get();
		print_r($re);
		
	}


	public function login(){
		$login = $this->input->post('login');
		$password = $this->input->post('password');
		$result = $this->user_model->get([
			 'login' => $login,
			 'password' =>hash('sha256',$password.SALT)
			]);
		$this->output->set_content_type('application_json');
		if($result){
			$this->session->set_userdata(['user_id' => $result[0]['user_id']]);
			$this->output->set_output(json_encode(['result' => 1]));
			return false;
		}
		$this->output->set_output(json_encode(['result' => 0]));
	}

	//register function

	public function register(){
		$this->output->set_content_type('application_json');
		$login = $this->input->post('login');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$confirm_password = $this->input->post('confirm_password');
		$this->form_validation->set_rules('login','Login','required|min_length[4]|max_length[25]|is_unique[user.login]');
		$this->form_validation->set_rules('email','Email','required|is_unique[user.email]|valid_email');
		$this->form_validation->set_rules('password','Password','required|min_length[4]|max_length[16]|matches[confirm]');
		//$this->form_validation->set_rules('confirm', 'Confirm Password', '');
		if($this->form_validation->run() == false){
			$this->output->set_output(json_encode(['result' => 0,'error' => $this->form_validation->error_array()]));
			return false;
		}

		
		$user_id = $this->model->insert([
			'login' => $login,
			'email' => $email,
			'password' => hash('sha256',$password.SALT)
		]);
		echo $user_id;
		die('not yet ready');
		
		if($user_id){
			$this->session->set_userdata(['user_id' => $user_id]);
			$this->output->set_output(json_encode(['result' => 1]));
			return false;
		}
		$this->output->set_output(json_encode(['result' => 0,'error' => 'user not created']));
	}
	public function insert()
	{
		$result = $this->user_model->insert(['login' => 'Gabkings1']);
		print_r($result);
	}

	public function delete()
	{
		$result = $this->user_model->delete(2);
		if($result){
			echo "deleted";
		}
	}
	
}