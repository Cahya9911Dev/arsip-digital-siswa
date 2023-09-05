<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

public function __construct(){
	parent::__construct();
        $this->load->model('m_siswa');
        $this->load->model('m_kelas');

        if($this->session->userdata('status') != "login"){
                redirect(base_url("loginstaff"));
        }

        if($this->session->userdata('level') != "staff"){
                redirect(base_url('loginstaff'));
        }

	}

	public function index()
	{
                $data['title'] = "Data Siswa";
                $data['siswa'] = $this->m_siswa->get_data('siswa')->result();
                $data['staff'] = $this->db->get_where('staff', ['staff_nip' =>
                $this->session->userdata('staff_nip')])->row_array();

                $this->load->view('template_staff/header',$data);
                $this->load->view('template_staff/navbar');
                $this->load->view('staff/siswa',$data);
                $this->load->view('template_staff/footer');
	}

        public function detail($siswa_id){
                $this->load->model('m_siswa');
                $data['title'] = "Detail Data Siswa";
                $data['staff'] = $this->db->get_where('staff', ['staff_nip' =>
                $this->session->userdata('staff_nip')])->row_array();
                $detail = $this->m_siswa->get_by_id($siswa_id);
                $data['detail'] = $detail;

                $this->load->view('template_staff/header',$data);
                $this->load->view('template_staff/navbar');
                $this->load->view('staff/detailsiswa',$data);
                $this->load->view('template_staff/footer');
        }

        public function siswabelumada()
	{
                $data['title'] = "Data Siswa | Belum Ada Berkas";
                $data['staff'] = $this->db->get_where('staff', ['staff_nip' =>
                $this->session->userdata('staff_nip')])->row_array();
                $data['siswa'] = $this->m_siswa->get_siswabelumada('siswa')->result();

                $this->load->view('template_staff/header',$data);
                $this->load->view('template_staff/navbar');
                $this->load->view('staff/siswabelumadaberkas',$data);
                $this->load->view('template_staff/footer');
	}

        public function siswakurang()
	{
                $data['title'] = "Data Siswa | Berkas Kurang";
                $data['staff'] = $this->db->get_where('staff', ['staff_nip' =>
                $this->session->userdata('staff_nip')])->row_array();
                $data['siswa'] = $this->m_siswa->get_siswakurang('siswa')->result();

                $this->load->view('template_staff/header',$data);
                $this->load->view('template_staff/navbar');
                $this->load->view('staff/siswakurang',$data);
                $this->load->view('template_staff/footer');
	}

        public function siswalengkap()
	{
                $data['title'] = "Data Siswa | Berkas Lengkap";
                $data['staff'] = $this->db->get_where('staff', ['staff_nip' =>
                $this->session->userdata('staff_nip')])->row_array();
                $data['siswa'] = $this->m_siswa->get_siswalengkap('siswa')->result();

                $this->load->view('template_staff/header',$data);
                $this->load->view('template_staff/navbar');
                $this->load->view('staff/siswalengkap',$data);
                $this->load->view('template_staff/footer');
	}

        public function tambahsiswa(){
                $data['title'] = "Tambah Data Siswa";
                $data['staff'] = $this->db->get_where('staff', ['staff_nip' =>
                $this->session->userdata('staff_nip')])->row_array();
                $data['kelas'] = $this->m_kelas->get_data('kelasaktif')->result();
                $this->load->model("M_siswa", "Mgenerate"); 
                $data['IdSiswa']  = $this->Mgenerate->generateIdSiswa(); 

                $this->load->view('template_staff/header',$data);
                $this->load->view('template_staff/navbar');
                $this->load->view('staff/tambahsiswa',$data);
                $this->load->view('template_staff/footer');
        }

        public function tambahsiswaaksi(){
                $siswa_id = $this->input->post('siswa_id');
                $siswa_nis = $this->input->post('siswa_nis');
                $siswa_nama = $this->input->post('siswa_nama');
                $siswa_pass = $this->input->post('siswa_pass');
                $siswa_alamat = $this->input->post('siswa_alamat');
                $siswa_nomorhp = $this->input->post('siswa_nomorhp');
                $siswa_tempatlahir = $this->input->post('siswa_tempatlahir');
                $siswa_tgllahir = $this->input->post('siswa_tgllahir');
                $siswa_jenkel = $this->input->post('siswa_jenkel');
                $siswa_kelas = $this->input->post('siswa_kelas');
                $siswa_status = $this->input->post('siswa_status');
                $siswa_statusarsip = $this->input->post('siswa_statusarsip');

                       
                $data = array(
                        'siswa_id' => $siswa_id,
                        'siswa_nis' => $siswa_nis,
                        'siswa_nama' => $siswa_nama,
                        'siswa_pass' => (md5($siswa_pass)),
                        'siswa_alamat' => $siswa_alamat,
                        'siswa_nomorhp' => $siswa_nomorhp,
                        'siswa_tempatlahir' => $siswa_tempatlahir,
                        'siswa_tgllahir' => $siswa_tgllahir,
                        'siswa_jenkel' => $siswa_jenkel,
                        'siswa_kelas' => $siswa_kelas,
                        'siswa_status'=>'Aktif',
                        'siswa_statusarsip' => $siswa_statusarsip,
                );
                
                if (!empty($_FILES['siswa_foto']['name'])) {
                        $siswa_foto = $this->upload_sfoto();
                        $data['siswa_foto'] = $siswa_foto;
                    }

                if (!empty($_FILES['siswa_kk']['name'])) {
                        $siswa_kk = $this->upload_skk();
                        $data['siswa_kk'] = $siswa_kk;
                    }

                if (!empty($_FILES['siswa_akta']['name'])) {
                        $siswa_akta = $this->upload_sakta();
                        $data['siswa_akta'] = $siswa_akta;
                    }
                
                if (!empty($_FILES['siswa_ktpayah']['name'])) {
                        $siswa_ktpayah = $this->upload_sktpa();
                        $data['siswa_ktpayah'] = $siswa_ktpayah;
                    }

                if (!empty($_FILES['siswa_ktpibu']['name'])) {
                        $siswa_ktpibu = $this->upload_sktpi();
                        $data['siswa_ktpibu'] = $siswa_ktpibu;
                    }

                if (!empty($_FILES['siswa_sktm']['name'])) {
                        $siswa_sktm = $this->upload_ssktm();
                        $data['siswa_sktm'] = $siswa_sktm;
                    }
                
                if (!empty($_FILES['siswa_kips']['name'])) {
                        $siswa_kips = $this->upload_skips();
                        $data['siswa_kips'] = $siswa_kips;
                    }

                if (!empty($_FILES['siswa_ijazah']['name'])) {
                        $siswa_ijazah = $this->upload_sijazah();
                        $data['siswa_ijazah'] = $siswa_ijazah;
                    }

                if (!empty($_FILES['siswa_skhun']['name'])) {
                        $siswa_skhun = $this->upload_sskhun();
                        $data['siswa_skhun'] = $siswa_skhun;
                    }       

                $this->m_siswa->insertsiswa($data);
                $text = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i> Data Siswa Berhasil Ditambahkan
                </div>';
                echo $this->session->set_flashdata('pesan',$text);
                redirect('staff/siswa',$data);
	}

        public function updatesiswa($siswa_id){
                $data['title'] = 'Update Data Siswa';
                $data['staff'] = $this->db->get_where('staff', ['staff_nip' =>
                $this->session->userdata('staff_nip')])->row_array();
                $data['kelas'] = $this->m_kelas->get_data('kelasaktif')->result();
                $data['siswa'] = $this->m_siswa->get_by_id($siswa_id);
                
                $this->load->view('template_staff/header',$data);
                $this->load->view('template_staff/navbar');
                $this->load->view('staff/formupdatesiswa',$data);
                $this->load->view('template_staff/footer');
        }

        public function ubahpassword($siswa_id){
                $data['title'] = 'Ubah Password Siswa';
                $data['staff'] = $this->db->get_where('staff', ['staff_nip' =>
                $this->session->userdata('staff_nip')])->row_array();
                $data['siswa'] = $this->m_siswa->get_by_id($siswa_id);
                
                $this->load->view('template_staff/header',$data);
                $this->load->view('template_staff/navbar');
                $this->load->view('staff/formubahpassword',$data);
                $this->load->view('template_staff/footer');
        }

        public function ubahpasswordaksi(){
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
                echo $this->session->set_flashdata('pesan',$text);
                redirect('staff/siswa');
        }

        public function updatesiswaaksi(){
                $siswa_id = $this->input->post('siswa_id');
                $siswa_nis = $this->input->post('siswa_nis');
                $siswa_nama = $this->input->post('siswa_nama');
                $siswa_alamat = $this->input->post('siswa_alamat');
                $siswa_nomorhp = $this->input->post('siswa_nomorhp');
                $siswa_tempatlahir = $this->input->post('siswa_tempatlahir');
                $siswa_tgllahir = $this->input->post('siswa_tgllahir');
                $siswa_jenkel = $this->input->post('siswa_jenkel');
                $siswa_kelas = $this->input->post('siswa_kelas');
                $siswa_status = $this->input->post('siswa_status');
                $siswa_statusarsip = $this->input->post('siswa_statusarsip');

                       
                $data = array(
                        'siswa_id' => $siswa_id,
                        'siswa_nis' => $siswa_nis,
                        'siswa_nama' => $siswa_nama,
                        'siswa_alamat' => $siswa_alamat,
                        'siswa_nomorhp' => $siswa_nomorhp,
                        'siswa_tempatlahir' => $siswa_tempatlahir,
                        'siswa_tgllahir' => $siswa_tgllahir,
                        'siswa_jenkel' => $siswa_jenkel,
                        'siswa_kelas' => $siswa_kelas,
                        'siswa_status'=>'Aktif',
                        'siswa_statusarsip' => $siswa_statusarsip,
                );

                if (!empty($_FILES['siswa_foto']['name'])) {
                        $siswa_foto = $this->upload_sfoto();
                        $upload = $this->m_siswa->get_by_id($siswa_id);
                        if (file_exists('assets/berkas_siswa/'.$upload->siswa_foto) && $upload->siswa_foto) {
                            unlink('assets/berkas_siswa/'.$upload->siswa_foto);
                        }
                        $data['siswa_foto'] = $siswa_foto;
                    }

                if (!empty($_FILES['siswa_kk']['name'])) {
                        $siswa_kk = $this->upload_skk();
                        $upload = $this->m_siswa->get_by_id($siswa_id);
                        if (file_exists('assets/berkas_siswa/'.$upload->siswa_kk) && $upload->siswa_kk) {
                            unlink('assets/berkas_siswa/'.$upload->siswa_kk);
                        }
                        $data['siswa_kk'] = $siswa_kk;
                    }

                if (!empty($_FILES['siswa_akta']['name'])) {
                        $siswa_akta = $this->upload_sakta();
                        $upload = $this->m_siswa->get_by_id($siswa_id);
                        if (file_exists('assets/berkas_siswa/'.$upload->siswa_akta) && $upload->siswa_akta) {
                            unlink('assets/berkas_siswa/'.$upload->siswa_akta);
                        }
                        $data['siswa_akta'] = $siswa_akta;
                    }
                
                if (!empty($_FILES['siswa_ktpayah']['name'])) {
                        $siswa_ktpayah = $this->upload_sktpa();
                        $upload = $this->m_siswa->get_by_id($siswa_id);
                        if (file_exists('assets/berkas_siswa/'.$upload->siswa_ktpayah) && $upload->siswa_ktpayah) {
                            unlink('assets/berkas_siswa/'.$upload->siswa_ktpayah);
                        }
                        $data['siswa_ktpayah'] = $siswa_ktpayah;
                    }

                if (!empty($_FILES['siswa_ktpibu']['name'])) {
                        $siswa_ktpibu = $this->upload_sktpi();
                        $upload = $this->m_siswa->get_by_id($siswa_id);
                        if (file_exists('assets/berkas_siswa/'.$upload->siswa_ktpibu) && $upload->siswa_ktpibu) {
                            unlink('assets/berkas_siswa/'.$upload->siswa_ktpibu);
                        }
                        $data['siswa_ktpibu'] = $siswa_ktpibu;
                    }

                if (!empty($_FILES['siswa_sktm']['name'])) {
                        $siswa_sktm = $this->upload_ssktm();
                        $upload = $this->m_siswa->get_by_id($siswa_id);
                        if (file_exists('assets/berkas_siswa/'.$upload->siswa_sktm) && $upload->siswa_sktm) {
                            unlink('assets/berkas_siswa/'.$upload->siswa_sktm);
                        }
                        $data['siswa_sktm'] = $siswa_sktm;
                    }
                
                if (!empty($_FILES['siswa_kips']['name'])) {
                        $siswa_kips = $this->upload_skips();
                        $upload = $this->m_siswa->get_by_id($siswa_id);
                        if (file_exists('assets/berkas_siswa/'.$upload->siswa_kips) && $upload->siswa_kips) {
                            unlink('assets/berkas_siswa/'.$upload->siswa_kips);
                        }
                        $data['siswa_kips'] = $siswa_kips;
                    }

                if (!empty($_FILES['siswa_ijazah']['name'])) {
                        $siswa_ijazah = $this->upload_sijazah();
                        $upload = $this->m_siswa->get_by_id($siswa_id);
                        if (file_exists('assets/berkas_siswa/'.$upload->siswa_ijazah) && $upload->siswa_ijazah) {
                            unlink('assets/berkas_siswa/'.$upload->siswa_ijazah);
                        }
                        $data['siswa_ijazah'] = $siswa_ijazah;
                    }

                if (!empty($_FILES['siswa_skhun']['name'])) {
                        $siswa_skhun = $this->upload_sskhun();
                        $upload = $this->m_siswa->get_by_id($siswa_id);
                        if (file_exists('assets/berkas_siswa/'.$upload->siswa_skhun) && $upload->siswa_skhun) {
                            unlink('assets/berkas_siswa/'.$upload->siswa_skhun);
                        }
                        $data['siswa_skhun'] = $siswa_skhun;
                    } 

                $this->m_siswa->updatesiswa($data,$siswa_id);
                $text = '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i> Data Siswa Berhasil Diperbarui
                </div>';
                echo $this->session->set_flashdata('pesan',$text);
                redirect('staff/siswa');
        }


                private function upload_sfoto(){
                        $sfoto_name = time().'-'.$_FILES["siswa_foto"]['name'];

                        $config['upload_path'] 		= 'assets/berkas_siswa/';
                        $config['allowed_types'] 	= 'jpg|png|jpeg';
                        $config['max_size'] 		= 500;
                        $config['file_name'] 		= $sfoto_name;

                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('siswa_foto')) {
                        $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
                        redirect('');
                        }
                        return $this->upload->data('file_name');
                }

                private function upload_skk(){
                        $skk_name = time().'-'.$_FILES["siswa_kk"]['name'];
        
                        $config['upload_path'] 		= 'assets/berkas_siswa/';
                        $config['allowed_types'] 	= 'jpg|png|jpeg';
                        $config['max_size'] 		= 500;
                        $config['file_name'] 		= $skk_name;
        
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('siswa_kk')) {
                        $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
                        redirect('');
                        }
                        return $this->upload->data('file_name');
                }

                private function upload_sakta(){
                        $sakta_name = time().'-'.$_FILES["siswa_akta"]['name'];

                        $config['upload_path'] 		= 'assets/berkas_siswa/';
                        $config['allowed_types'] 	= 'jpg|png|jpeg';
                        $config['max_size'] 		= 500;
                        $config['file_name'] 		= $sakta_name;

                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('siswa_akta')) {
                        $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
                        redirect('');
                        }
                        return $this->upload->data('file_name');
                }

                private function upload_sktpi(){
                        $sktpi_name = time().'-'.$_FILES["siswa_ktpibu"]['name'];

                        $config['upload_path'] 		= 'assets/berkas_siswa/';
                        $config['allowed_types'] 	= 'jpg|png|jpeg';
                        $config['max_size'] 		= 500;
                        $config['file_name'] 		= $sktpi_name;

                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('siswa_ktpibu')) {
                        $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
                        redirect('');
                        }
                        return $this->upload->data('file_name');
                }

                private function upload_sktpa(){
                        $sktpa_name = time().'-'.$_FILES["siswa_ktpayah"]['name'];
        
                        $config['upload_path'] 		= 'assets/berkas_siswa/';
                        $config['allowed_types'] 	= 'jpg|png|jpeg';
                        $config['max_size'] 		= 500;
                        $config['file_name'] 		= $sktpa_name;
        
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('siswa_ktpayah')) {
                        $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
                        redirect('');
                        }
                        return $this->upload->data('file_name');
                }

                private function upload_ssktm(){
                        $ssktm_name = time().'-'.$_FILES["siswa_sktm"]['name'];

                        $config['upload_path'] 		= 'assets/berkas_siswa/';
                        $config['allowed_types'] 	= 'jpg|png|jpeg';
                        $config['max_size'] 		= 500;
                        $config['file_name'] 		= $ssktm_name;

                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('siswa_sktm')) {
                        $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
                        redirect('');
                        }
                        return $this->upload->data('file_name');
                }

                private function upload_skips(){
                        $skips_name = time().'-'.$_FILES["siswa_kips"]['name'];
        
                        $config['upload_path'] 		= 'assets/berkas_siswa/';
                        $config['allowed_types'] 	= 'jpg|png|jpeg';
                        $config['max_size'] 		= 500;
                        $config['file_name'] 		= $skips_name;
        
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('siswa_kips')) {
                        $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
                        redirect('');
                        }
                        return $this->upload->data('file_name');
                }

                private function upload_sskhun(){
                        $sskhun_name = time().'-'.$_FILES["siswa_skhun"]['name'];

                        $config['upload_path'] 		= 'assets/berkas_siswa/';
                        $config['allowed_types'] 	= 'jpg|png|jpeg';
                        $config['max_size'] 		= 500;
                        $config['file_name'] 		= $sskhun_name;

                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('siswa_skhun')) {
                        $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
                        redirect('');
                        }
                        return $this->upload->data('file_name');
                }

                private function upload_sijazah(){
                        $sijazah_name = time().'-'.$_FILES["siswa_ijazah"]['name'];

                        $config['upload_path'] 		= 'assets/berkas_siswa/';
                        $config['allowed_types'] 	= 'jpg|png|jpeg';
                        $config['max_size'] 		= 500;
                        $config['file_name'] 		= $sijazah_name;

                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('siswa_ijazah')) {
                        $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
                        redirect('');
                        }
                        return $this->upload->data('file_name');
                }

        public function hapus_siswaaktif($siswa_id){
                $data = array('siswa_status'=>'Tidak Aktif',
                              'siswa_tahunkeluar' => date('Y'));

                $where = array('siswa_id'=> $siswa_id);

                $this->m_siswa->hapussiswaaktif('siswa',$data,$where);
                $text = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Data Siswa Berhasil Diarsipkan!
                </div>';
                echo $this->session->set_flashdata('pesan',$text);
                redirect('staff/siswa');
        }

        public function hapus_siswa($siswa_id){
                
                $upload = $this->m_siswa->get_by_id($siswa_id);
                if (file_exists('assets/berkas_siswa/'.$upload->siswa_foto) && $upload->siswa_foto) {
                        unlink('assets/berkas_siswa/'.$upload->siswa_foto);
                    }
                if (file_exists('assets/berkas_siswa/'.$upload->siswa_kk) && $upload->siswa_kk) {
                        unlink('assets/berkas_siswa/'.$upload->siswa_kk);
                    }
                if (file_exists('assets/berkas_siswa/'.$upload->siswa_akta) && $upload->siswa_akta) {
                        unlink('assets/berkas_siswa/'.$upload->siswa_akta);
                    }
                if (file_exists('assets/berkas_siswa/'.$upload->siswa_ktpibu) && $upload->siswa_ktpibu) {
                        unlink('assets/berkas_siswa/'.$upload->siswa_ktpibu);
                    }
                if (file_exists('assets/berkas_siswa/'.$upload->siswa_ktpayah) && $upload->siswa_ktpayah) {
                        unlink('assets/berkas_siswa/'.$upload->siswa_ktpayah);
                    }
                if (file_exists('assets/berkas_siswa/'.$upload->siswa_sktm) && $upload->siswa_sktm) {
                        unlink('assets/berkas_siswa/'.$upload->siswa_sktm);
                    }
                if (file_exists('assets/berkas_siswa/'.$upload->siswa_kips) && $upload->siswa_kips) {
                        unlink('assets/berkas_siswa/'.$upload->siswa_kips);
                    }
                if (file_exists('assets/berkas_siswa/'.$upload->siswa_ijazah) && $upload->siswa_ijazah) {
                        unlink('assets/berkas_siswa/'.$upload->siswa_ijazah);
                    }
                if (file_exists('assets/berkas_siswa/'.$upload->siswa_skhun) && $upload->siswa_skhun) {
                        unlink('assets/berkas_siswa/'.$upload->siswa_skhun);
                    }
                $this->m_siswa->hapussiswa($siswa_id);
                $text = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Data Siswa Berhasil Dihapus!
                </div>';
                echo $this->session->set_flashdata('pesan',$text);
                redirect('staff/arsipsiswa');
        }

}