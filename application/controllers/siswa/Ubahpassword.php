<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubahpassword extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('m_siswa');

        if($this->session->userdata('status') != "login"){
            redirect(base_url("loginsiswa"));
        }

        if($this->session->userdata('level') != "siswa"){
            redirect(base_url('loginsiswa'));
    }
    }

    public function index(){
        $data['title'] = "Ubah Password Siswa";
        $data['siswa'] = $this->db->get_where('siswa', ['siswa_nis' =>
        $this->session->userdata('siswa_nis')])->row_array();

        $this->load->view('template_siswa/header',$data);
        $this->load->view('template_siswa/navbar');
        $this->load->view('siswa/ubahpassword',$data);
        $this->load->view('template_siswa/footer');
    }

    public function simpanpassword(){
        $siswa_id = $this->input->post('siswa_id');
        $siswa_pass = $this->input->post('siswa_pass');
        $data = array(
                'siswa_id' => $siswa_id,
                'siswa_pass' => (md5($siswa_pass)),
        );

        $this->m_siswa->updatesiswa($data,$siswa_id);
        $text = '<div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fa fa-check"></i> Password berhasil diperbarui!
        </div>';
        echo $this->session->set_flashdata('msg',$text);
        redirect('siswa/dashboard');
    }
}