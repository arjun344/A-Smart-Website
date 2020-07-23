<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EyeController extends CI_Controller {


	public function index()
	{
		$Alphabets = array("A", "B", "C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q",".","R","S","T","U","V",".com","W","X","Y","Z","@",".org","space","send","Back","key1","key2","key3");

		$data['keys'] = $Alphabets;
		
		$this->load->view('Main/EyeType.php',$data);
	}

	public function Login()
	{
		$this->load->view('Main/Login.php');
	}

	public function GazeView()
	{
		
		$this->load->view('Main/gazeview.php');
	}

	public function SignUp()
	{
		
		$this->load->view('Main/Signup.php');
	}

	
	
}
