<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

        public function __construct(){
	parent::__construct();
        $this->load->model('m_kelas');
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
                $data['title'] = "Data Kelas Aktif";;
                $data['kelas'] = $this->m_kelas->get_data('kelasaktif')->result();
                $data['staff'] = $this->db->get_where('staff', ['staff_nip' =>
                $this->session->userdata('staff_nip')])->row_array();

                $this->load->view('template_staff/header',$data);
                $this->load->view('template_staff/navbar');
                $this->load->view('staff/kelas',$data);
                $this->load->view('template_staff/footer');
	}

        public function arsipkelas()
	{
                $data['title'] = "Data Arsip Kelas";;
                $data['kelas'] = $this->m_kelas->get_data('arsipkelas')->result();
                $data['staff'] = $this->db->get_where('staff', ['staff_nip' =>
                $this->session->userdata('staff_nip')])->row_array();

                $this->load->view('template_staff/header',$data);
                $this->load->view('template_staff/navbar');
                $this->load->view('staff/arsipkelas',$data);
                $this->load->view('template_staff/footer');
	}

        public function detailkelas($kelas_id){
                $data['title'] = "Daftar Siswa Kelas $kelas_id";
                $data['staff'] = $this->db->get_where('staff', ['staff_nip' =>
                $this->session->userdata('staff_nip')])->row_array();
                $tampilsiswa = $this->m_kelas->tampilsiswa($kelas_id);
                $data['tampilsiswa'] = $tampilsiswa;
                
                $this->load->view('template_staff/header',$data);
                $this->load->view('template_staff/navbar');
                $this->load->view('staff/kelasdetail',$data);
                $this->load->view('template_staff/footer');
        }


	public function cetaklaporan($kelas_id)
	{
                $data['staff'] = $this->db->get_where('staff', ['staff_nip' =>
                $this->session->userdata('staff_nip')])->row_array();
		$cetaksiswa = $this->m_kelas->tampilsiswa($kelas_id);
                $data['tampilsiswa'] = $cetaksiswa;

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-data-siswa.pdf";
		$this->pdf->load_view('staff/laporan_siswa', $data);

	}

        public function detailarsipkelas($kelas_id){
                $data['title'] = "Daftar Siswa Kelas $kelas_id";
                $data['staff'] = $this->db->get_where('staff', ['staff_nip' =>
                $this->session->userdata('staff_nip')])->row_array();
                $tampilsiswa = $this->m_kelas->tampilsiswa($kelas_id);
                $data['tampilsiswa'] = $tampilsiswa;
                
                $this->load->view('template_staff/header',$data);
                $this->load->view('template_staff/navbar');
                $this->load->view('staff/arsipkelasdetail',$data);
                $this->load->view('template_staff/footer');
        }

        public function tambahkelas(){
                $data['title'] = "Tambah Data Kelas";
                $data['staff'] = $this->db->get_where('staff', ['staff_nip' =>
                $this->session->userdata('staff_nip')])->row_array();
                $this->load->model("M_kelas", "Mgenerate"); 
                $data['IdKelas']  = $this->Mgenerate->generateIdKelas(); 

                $this->load->view('template_staff/header',$data);
                $this->load->view('template_staff/navbar');
                $this->load->view('staff/tambahkelas',$data);
                $this->load->view('template_staff/footer');
        }


        public function tambahkelasaksi(){
                $kelas_id = $this->input->post('kelas_id');
                $kelas_nama = $this->input->post('kelas_nama');
                $kelas_wali = $this->input->post('kelas_wali');
                $kelas_grupwa = $this->input->post('kelas_grupwa');

                $data = array(
                        'kelas_id' => $kelas_id,
                        'kelas_nama' => $kelas_nama,
                        'kelas_wali' => $kelas_wali,
                        'kelas_grupwa' => $kelas_grupwa,
                        'kelas_status' => 'Aktif'
                );

                $this->m_kelas->insert_data($data,'kelas');
                        $text = '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fa fa-check"></i> Data Kelas Berhasil Ditambahkan
                        </div>';
                        echo $this->session->set_flashdata('pesan',$text);
                        redirect('staff/kelas');
        }

        public function updatekelas($kelas_id){
                $where = array('kelas_id' => $kelas_id);
                $data['title'] = 'Update Data Kelas';
                $data['staff'] = $this->db->get_where('staff', ['staff_nip' =>
                $this->session->userdata('staff_nip')])->row_array();
                $data['kelas'] = $this->db->query("SELECT * FROM kelas WHERE kelas_id='$kelas_id'")->result();

                $this->load->view('template_staff/header',$data);
                $this->load->view('template_staff/navbar');
                $this->load->view('staff/formupdatekelas',$data);
                $this->load->view('template_staff/footer');
        }

        public function updatekelasaksi(){
                $kelas_id = $this->input->post('kelas_id');
                $kelas_nama = $this->input->post('kelas_nama');
                $kelas_wali = $this->input->post('kelas_wali');
                $kelas_grupwa = $this->input->post('kelas_grupwa');

                $data = array(
                        'kelas_id' => $kelas_id,
                        'kelas_nama' => $kelas_nama,
                        'kelas_wali' => $kelas_wali,
                        'kelas_grupwa' => $kelas_grupwa,
                        'kelas_status' => 'Aktif'
                );

                $where = array('kelas_id' => $kelas_id);

                        $this->m_kelas->update_data('kelas',$data,$where);
                        $text = '<div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fa fa-check"></i> Data Kelas Berhasil Diupdate
                        </div>';
                        echo $this->session->set_flashdata('pesan',$text);
                        redirect('staff/kelas');
        }

        public function arsipkankelas($kelas_id){
                $where = array('kelas_id' => $kelas_id);
                $data['title'] = 'Arsipkan Data Kelas';
                $data['staff'] = $this->db->get_where('staff', ['staff_nip' =>
                $this->session->userdata('staff_nip')])->row_array();
                $data['kelas'] = $this->db->query("SELECT * FROM kelas WHERE kelas_id='$kelas_id'")->result();

                $this->load->view('template_staff/header',$data);
                $this->load->view('template_staff/navbar');
                $this->load->view('staff/formarsipkankelas',$data);
                $this->load->view('template_staff/footer');
        }

        public function arsipkankelasaksi(){
                $kelas_id = $this->input->post('kelas_id');
                $kelas_nama = $this->input->post('kelas_nama');
                $kelas_wali = $this->input->post('kelas_wali');
                $kelas_grupwa = $this->input->post('kelas_grupwa');

                $data = array(
                        'kelas_id' => $kelas_id,
                        'kelas_nama' => $kelas_nama,
                        'kelas_wali' => $kelas_wali,
                        'kelas_grupwa' => $kelas_grupwa,
                        'kelas_status' => 'Tidak Aktif');

                $where = array('kelas_id' => $kelas_id);

                $siswa = array('siswa_status'=>'Tidak Aktif',
                                'siswa_tahunkeluar' => date('Y')); 
                $wheresiswa = array('siswa_kelas'=> $kelas_id);
        
                $this->m_siswa->hapussiswaaktif('siswa',$siswa,$wheresiswa);
                $this->m_kelas->arsipkan_kelas('kelas',$data,$where);
                $text = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Data Kelas Berhasil Diarsipkan!
                </div>';
                echo $this->session->set_flashdata('pesan',$text);
                redirect('staff/kelas');
        }

}