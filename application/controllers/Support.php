<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Support extends CI_Controller {

	public function bank(){
		$data['title'] = "Support - Bank";
		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);
		$this->load->view('pages/support/bank');
		$this->load->view('templates/dashboard/footer', $data);
	}

	public function crypto(){
		$data['title'] = "Support - Crypto";
		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);
		$this->load->view('pages/support/crypto');
		$this->load->view('templates/dashboard/footer', $data);
	}
    
}
