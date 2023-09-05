<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("loginsiswa"));
        }

        if($this->session->userdata('level') != "siswa"){
            redirect(base_url('loginsiswa'));
    }

    }

    public function index(){
        $data['title'] = "Data Siswa";
        $data['siswa'] = $this->db->get_where('siswakelas', ['siswa_nis' =>
        $this->session->userdata('siswa_nis')])->row_array();

        $this->load->view('template_siswa/header',$data);
        $this->load->view('template_siswa/navbar');
        $this->load->view('siswa/dashboard',$data);
        $this->load->view('template_siswa/footer');
    }

}