<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_Controller extends CI_Controller 
{
	public function index()
	{
		$this->load->view('home');
	}

	public function about()
	{
		$this->load->view('about');
	}

	public function contact()
	{
		$data['nohp'] = '089672323232';
		$data['email'] = 'erysetiyawan@gmail.com';
		$this->load->view('contact', $data);
	}

	public function news($param = null)
	{
		if($param == null)
		{
			$param = "<b>Paramater url belum dimasukan</b><a href= ".base_url('News/ery').">Klik Berikut Untuk Memberi Parameter</a>";
		}

		$data['nama'] = $param;
		$this->load->view('news',$data);
	}
}
