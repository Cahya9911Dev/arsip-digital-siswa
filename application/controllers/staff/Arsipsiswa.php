<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsipsiswa extends CI_Controller {

public function __construct(){
	parent::__construct();
        $this->load->model('m_siswa');

        if($this->session->userdata('status') != "login"){
                redirect(base_url("loginstaff"));
        }

        if($this->session->userdata('level') != "staff"){
                redirect(base_url('loginstaff'));
        }

	}

	public function index()
	{
                $data['title'] = "Data Arsip Siswa";
                $data['staff'] = $this->db->get_where('staff', ['staff_nip' =>
                $this->session->userdata('staff_nip')])->row_array();
                $data['siswa'] = $this->m_siswa->get_arsipsiswa('siswa')->result();

                $this->load->view('template_staff/header',$data);
                $this->load->view('template_staff/navbar');
                $this->load->view('staff/arsipsiswa',$data);
                $this->load->view('template_staff/footer');
	}
}