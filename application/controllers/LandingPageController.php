<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingPageController extends CI_Controller {

	public function index()
	{
		$date=date("Y-m-d");
		$url = 'https://newsapi.org/v2/top-headlines?q=&from='.$date.'&sortBy=popularity&apiKey=14f0efd2e4c74f51965c77cfb874601e&pageSize=100&category=general&country=in';
		$jsondata = file_get_contents($url);
		$jsonarray['data'] = json_decode($jsondata,true);
		// $size = $json['totalResults'];
		// echo $json['articles'][0]['title'];
		$this->load->view('Main/LandingPage',$jsonarray);
	}

	public function Technology()
	{
		$date=date("Y-m-d");
		$url = 'https://newsapi.org/v2/top-headlines?q=&from='.$date.'&sortBy=popularity&apiKey=14f0efd2e4c74f51965c77cfb874601e&pageSize=100&category=technology&country=in';
		$jsondata = file_get_contents($url);
		$jsonarray['data'] = json_decode($jsondata,true);
		// $size = $json['totalResults'];
		// echo $json['articles'][0]['title'];
		$this->load->view('Main/LandingPage',$jsonarray);
	}

	public function Business()
	{
		$date=date("Y-m-d");
		$url = 'https://newsapi.org/v2/top-headlines?q=&from='.$date.'&sortBy=popularity&apiKey=14f0efd2e4c74f51965c77cfb874601e&pageSize=100&category=business&country=in';
		$jsondata = file_get_contents($url);
		$jsonarray['data'] = json_decode($jsondata,true);
		// $size = $json['totalResults'];
		// echo $json['articles'][0]['title'];
		$this->load->view('Main/LandingPage',$jsonarray);
	}

	public function Entertainment()
	{
		$date=date("Y-m-d");
		$url = 'https://newsapi.org/v2/top-headlines?q=&from='.$date.'&sortBy=popularity&apiKey=14f0efd2e4c74f51965c77cfb874601e&pageSize=100&category=entertainment&country=in';
		$jsondata = file_get_contents($url);
		$jsonarray['data'] = json_decode($jsondata,true);
		// $size = $json['totalResults'];
		// echo $json['articles'][0]['title'];
		$this->load->view('Main/LandingPage',$jsonarray);
	}

	public function Sports()
	{
		$date=date("Y-m-d");
		$url = 'https://newsapi.org/v2/top-headlines?q=&from='.$date.'&sortBy=popularity&apiKey=14f0efd2e4c74f51965c77cfb874601e&pageSize=100&category=sports&country=in';
		$jsondata = file_get_contents($url);
		$jsonarray['data'] = json_decode($jsondata,true);
		// $size = $json['totalResults'];
		// echo $json['articles'][0]['title'];
		$this->load->view('Main/LandingPage',$jsonarray);
	}

	public function Health()
	{
		$date=date("Y-m-d");
		$url = 'https://newsapi.org/v2/top-headlines?q=&from='.$date.'&sortBy=popularity&apiKey=14f0efd2e4c74f51965c77cfb874601e&pageSize=100&category=health&country=in';
		$jsondata = file_get_contents($url);
		$jsonarray['data'] = json_decode($jsondata,true);
		// $size = $json['totalResults'];
		// echo $json['articles'][0]['title'];
		$this->load->view('Main/LandingPage',$jsonarray);
	}

	public function Search()
	{
		$keyword = $_GET["keyword"];
		$date=date("Y-m-d");
		$keyword=str_replace(" ","%20",$keyword);
		$url = 'https://newsapi.org/v2/everything?q=+"'.$keyword.'"&sortBy=popularity&apiKey=14f0efd2e4c74f51965c77cfb874601e&pageSize=100';
		$jsondata = file_get_contents($url);
		$jsonarray['data'] = json_decode($jsondata,true);
		$this->load->view('Main/LandingPage',$jsonarray);
		
	}

	
}
