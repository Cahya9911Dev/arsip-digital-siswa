<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

        public function __construct(){
                parent::__construct();
                $this->load->model('m_dashboard');

        if($this->session->userdata('status') != "login"){
                redirect(base_url("loginstaff"));
        }

        if($this->session->userdata('level') != "staff" ){
                redirect(base_url('loginstaff'));
        }

	}

        public function index()
	{
        $data['staff'] = $this->db->get_where('staff', ['staff_nip' =>
        $this->session->userdata('staff_nip')])->row_array();

        // total siswa aktif
        $wt = "siswa_status = 'Aktif'";
        $data['total'] = count($this->m_dashboard->total($wt));

        // Persentasi belum ada data
        $wb = "siswa_statusarsip = 'Belum Ada Berkas' AND siswa_status = 'Aktif'";
        $belum = $this->m_dashboard->belum($wb);
        $data['totalb'] = count($belum);


        // Persentasi kurang
        $wk = "siswa_statusarsip = 'Kurang' AND siswa_status = 'Aktif'";
        $kurang = $this->m_dashboard->kurang($wk);
        $data['totalk'] = count($kurang);


        // Persentasi lengkap
        $wl = "siswa_statusarsip = 'Lengkap' AND siswa_status = 'Aktif'";
        $lengkap = $this->m_dashboard->lengkap($wl);
        $data['totall'] = count($lengkap);


        $data['title'] = "Dashboard";

        $this->load->view('template_staff/header',$data);
        $this->load->view('template_staff/navbar');
        $this->load->view('staff/dashboard',$data);
        $this->load->view('template_staff/footer');
	}

}