<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VideoPageController extends CI_Controller {

	public function index()
	{
		$keyword="ek+ladki+ko+dekha+to";
		$apikey = 'AIzaSyAdDTsXO16jeLU5nfwXsyf4mFTmxcdgwTo'; 
    	$googleApiUrl = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . $keyword . '&maxResults=20&key=' . $apikey;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);



    curl_close($ch);
	// $response = file_get_contents('ytdata.json');
    $data = json_decode($response);
    $value = json_decode(json_encode($data), true);
    $jsonarray['viddata'] = json_decode(json_encode($data), true);

    $this->load->view('Main/VideoPage',$jsonarray);
}

public function search()
  {
    $keyword = $_GET["keyword"];
    $keyword=str_replace(" ","+",$keyword);
    $apikey = 'AIzaSyAdDTsXO16jeLU5nfwXsyf4mFTmxcdgwTo'; 
      $googleApiUrl = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . $keyword . '&maxResults=20&videoEmbeddable=true&type=video&videoSyndicated=true&key=' . $apikey;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);



    curl_close($ch);
  // $response = file_get_contents('ytdata.json');
    $data = json_decode($response);
    $value = json_decode(json_encode($data), true);
    $jsonarray['viddata'] = json_decode(json_encode($data), true);

    $this->load->view('Main/VideoPage',$jsonarray);
}
	
}
