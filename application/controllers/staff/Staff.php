<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

public function __construct(){
	parent::__construct();
        $this->load->model('m_staff');

        if($this->session->userdata('status') != "login"){
                redirect(base_url("loginstaff"));
        }

        if($this->session->userdata('level') != "staff"){
                redirect(base_url('loginstaff'));
        }

        if($this->session->userdata('akses') != "Administrator"){
            redirect(base_url('loginstaff'));
    }

	}

	public function index()
	{
        $data['title'] = "Data Staff";
        $data['staf'] = $this->m_staff->get_data('staff')->result();

        $data['staff'] = $this->db->get_where('staff', ['staff_nip' =>
        $this->session->userdata('staff_nip')])->row_array();

        $this->load->view('template_staff/header',$data);
        $this->load->view('template_staff/navbar');
        $this->load->view('staff/staff',$data);
        $this->load->view('template_staff/footer');
	}

    public function tambahstaff(){
        $data['title'] = "Tambah Data Staff";
        $data['staff'] = $this->db->get_where('staff', ['staff_nip' =>
        $this->session->userdata('staff_nip')])->row_array();

        $this->load->model("M_staff", "Mgenerate"); 
        $data['IdStaff']  = $this->Mgenerate->generateIdStaff(); 

        $this->load->view('template_staff/header',$data);
        $this->load->view('template_staff/navbar');
        $this->load->view('staff/tambahstaff',$data);
        $this->load->view('template_staff/footer');
    }

    public function tambahstaffaksi(){
        $staff_id = $this->input->post('staff_id');
        $staff_nip = $this->input->post('staff_nip');
        $staff_nama = $this->input->post('staff_nama');
        $staff_pass = $this->input->post('staff_pass');
        $staff_role = $this->input->post('staff_role');
               
        $data = array(
                'staff_id' => $staff_id,
                'staff_nip' => $staff_nip,
                'staff_nama' => $staff_nama,
                'staff_pass' => (md5($staff_pass)),
                'staff_role' => $staff_role
        );

        $this->m_staff->insertstaff($data);
        $text = '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fa fa-check"></i> Data Staff Berhasil Ditambahkan
        </div>';
        echo $this->session->set_flashdata('pesan',$text);
        redirect('staff/staff',$data);
    }

    public function updatestaff($staff_id){
        $data['title'] = 'Update Data Staff';
        $data['staff'] = $this->db->get_where('staff', ['staff_nip' =>
        $this->session->userdata('staff_nip')])->row_array();

        $data['staf'] = $this->m_staff->get_by_id($staff_id);
        
        $this->load->view('template_staff/header',$data);
        $this->load->view('template_staff/navbar');
        $this->load->view('staff/formupdatestaff',$data);
        $this->load->view('template_staff/footer');
    }

    public function updatestaffaksi(){
        $staff_id = $this->input->post('staff_id');
        $staff_nip = $this->input->post('staff_nip');
        $staff_nama = $this->input->post('staff_nama');
        $staff_pass = $this->input->post('staff_pass');
        $staff_role = $this->input->post('staff_role');
               
        $data = array(
                'staff_id' => $staff_id,
                'staff_nip' => $staff_nip,
                'staff_nama' => $staff_nama,
                'staff_pass' => (md5($staff_pass)),
                'staff_role' => $staff_role
        );

        $this->m_staff->updatestaff($data,$staff_id);
        $text = '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fa fa-check"></i> Data Staff Berhasil Diperbarui
        </div>';
        echo $this->session->set_flashdata('pesan',$text);
        redirect('staff/staff');
    }

    public function hapus_staff($staff_id){
        $this->m_staff->hapusstaff($staff_id);
        $text = '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Data Staff Berhasil Dihapus!
        </div>';
        echo $this->session->set_flashdata('pesan',$text);
        redirect('staff/staff');
    }
}
