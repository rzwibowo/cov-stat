<?php 

class Histori extends CI_Controller{

	function __construct(){
		parent::__construct();
	}

	function index(){
        $data = array(
			'title' => "Perkembangan Kasus"
		);
		$this->load->view('stat', $data);
	}
}