<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berkassiswa extends CI_Controller {

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
        $data['title'] = "Data Berkas Siswa";
        $data['siswa'] = $this->db->get_where('siswa', ['siswa_nis' =>
        $this->session->userdata('siswa_nis')])->row_array();

        $this->load->view('template_siswa/header',$data);
        $this->load->view('template_siswa/navbar');
        $this->load->view('siswa/berkassiswa',$data);
        $this->load->view('template_siswa/footer');
    }

    public function uploadberkas(){
        $data['title'] = 'Upload Berkas Siswa';
        $data['siswa'] = $this->db->get_where('siswa', ['siswa_nis' =>
        $this->session->userdata('siswa_nis')])->row_array();

        $this->form_validation->set_rules('siswa_id', 'Nama Siswa', 'required');
        
        if ($this->form_validation->run() == false){
            $this->load->view('template_siswa/header',$data);
            $this->load->view('template_siswa/navbar');
            $this->load->view('siswa/uploadberkas',$data);
            $this->load->view('template_siswa/footer');
        }
        
        else{
            $siswa_id = $this->input->post('siswa_id');
            $siswa_nis = $this->input->post('siswa_nis');

            $upload_foto = $_FILES['siswa_foto']['name'];

            if($upload_foto){
                $config['upload_path'] 		= 'assets/berkas_siswa/';
                $config['allowed_types'] 	= 'jpg|png|jpeg';
                $config['max_size'] 		= 500;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('siswa_foto')) {
                    $old_foto = $data['siswa']['siswa_foto'];
                    unlink(FCPATH . 'assets/berkas_siswa/' . $old_foto);
                    
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('siswa_foto', $new_foto);

                }else{
                    echo $this->upload->display_errors();
                }
            }

            $upload_kk = $_FILES['siswa_kk']['name'];

            if($upload_kk){
                $config['upload_path'] 		= 'assets/berkas_siswa/';
                $config['allowed_types'] 	= 'jpg|png|jpeg';
                $config['max_size'] 		= 500;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('siswa_kk')) {
                    $old_kk = $data['siswa']['siswa_kk'];
                    unlink(FCPATH . 'assets/berkas_siswa/' . $old_kk);
                    
                    $new_kk = $this->upload->data('file_name');
                    $this->db->set('siswa_kk', $new_kk);

                }else{
                    echo $this->upload->display_errors();
                }
            }

            $upload_akta = $_FILES['siswa_akta']['name'];

            if($upload_akta){
                $config['upload_path'] 		= 'assets/berkas_siswa/';
                $config['allowed_types'] 	= 'jpg|png|jpeg';
                $config['max_size'] 		= 500;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('siswa_akta')) {
                    $old_akta = $data['siswa']['siswa_akta'];
                    unlink(FCPATH . 'assets/berkas_siswa/' . $old_akta);
                    
                    $new_akta = $this->upload->data('file_name');
                    $this->db->set('siswa_akta', $new_akta);

                }else{
                    echo $this->upload->display_errors();
                }
            }

            $upload_ktpayah = $_FILES['siswa_ktpayah']['name'];

            if($upload_ktpayah){
                $config['upload_path'] 		= 'assets/berkas_siswa/';
                $config['allowed_types'] 	= 'jpg|png|jpeg';
                $config['max_size'] 		= 500;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('siswa_ktpayah')) {
                    $old_ktpayah = $data['siswa']['siswa_ktpayah'];
                    unlink(FCPATH . 'assets/berkas_siswa/' . $old_ktpayah);
                    
                    $new_ktpayah = $this->upload->data('file_name');
                    $this->db->set('siswa_ktpayah', $new_ktpayah);

                }else{
                    echo $this->upload->display_errors();
                }
            }

            $upload_ktpibu = $_FILES['siswa_ktpibu']['name'];

            if($upload_ktpibu){
                $config['upload_path'] 		= 'assets/berkas_siswa/';
                $config['allowed_types'] 	= 'jpg|png|jpeg';
                $config['max_size'] 		= 500;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('siswa_ktpibu')) {
                    $old_ktpibu = $data['siswa']['siswa_ktpibu'];
                    unlink(FCPATH . 'assets/berkas_siswa/' . $old_ktpibu);
                    
                    $new_ktpibu = $this->upload->data('file_name');
                    $this->db->set('siswa_ktpibu', $new_ktpibu);

                }else{
                    echo $this->upload->display_errors();
                }
            }

            $upload_kips = $_FILES['siswa_kips']['name'];

            if($upload_kips){
                $config['upload_path'] 		= 'assets/berkas_siswa/';
                $config['allowed_types'] 	= 'jpg|png|jpeg';
                $config['max_size'] 		= 500;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('siswa_kips')) {
                    $old_kips = $data['siswa']['siswa_kips'];
                    unlink(FCPATH . 'assets/berkas_siswa/' . $old_kips);
                    
                    $new_kips = $this->upload->data('file_name');
                    $this->db->set('siswa_kips', $new_kips);

                }else{
                    echo $this->upload->display_errors();
                }
            }

            $upload_sktm = $_FILES['siswa_sktm']['name'];

            if($upload_sktm){
                $config['upload_path'] 		= 'assets/berkas_siswa/';
                $config['allowed_types'] 	= 'jpg|png|jpeg';
                $config['max_size'] 		= 500;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('siswa_sktm')) {
                    $old_sktm = $data['siswa']['siswa_sktm'];
                    unlink(FCPATH . 'assets/berkas_siswa/' . $old_sktm);
                    
                    $new_sktm = $this->upload->data('file_name');
                    $this->db->set('siswa_sktm', $new_sktm);

                }else{
                    echo $this->upload->display_errors();
                }
            }

            $upload_skhun = $_FILES['siswa_skhun']['name'];

            if($upload_skhun){
                $config['upload_path'] 		= 'assets/berkas_siswa/';
                $config['allowed_types'] 	= 'jpg|png|jpeg';
                $config['max_size'] 		= 500;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('siswa_skhun')) {
                    $old_skhun = $data['siswa']['siswa_skhun'];
                    unlink(FCPATH . 'assets/berkas_siswa/' . $old_skhun);
                    
                    $new_skhun = $this->upload->data('file_name');
                    $this->db->set('siswa_skhun', $new_skhun);

                }else{
                    echo $this->upload->display_errors();
                }
            }

            $upload_ijazah = $_FILES['siswa_ijazah']['name'];

            if($upload_ijazah){
                $config['upload_path'] 		= 'assets/berkas_siswa/';
                $config['allowed_types'] 	= 'jpg|png|jpeg';
                $config['max_size'] 		= 500;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('siswa_ijazah')) {
                    $old_ijazah = $data['siswa']['siswa_ijazah'];
                    unlink(FCPATH . 'assets/berkas_siswa/' . $old_ijazah);
                    
                    $new_ijazah = $this->upload->data('file_name');
                    $this->db->set('siswa_ijazah', $new_ijazah);

                }else{
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('siswa_nis', $siswa_nis);
            $this->db->where('siswa_id', $siswa_id);
            $this->db->update('siswa');

            $text = '<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fa fa-check"></i> Berkas berhasil diupload!
            </div>';
            echo $this->session->set_flashdata('msg',$text);
            redirect('siswa/berkassiswa');
        }
    }

}