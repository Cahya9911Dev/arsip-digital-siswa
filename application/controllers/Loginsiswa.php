<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginsiswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index(){
		$this->form_validation->set_rules('nis', 'Nis', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

        if($this->form_validation->run() == false){
			$this->load->view('loginsiswa');
		}
		else{
			$this->_login();
		}
	}

	private function _login(){
		$siswa_nis = $this->input->post('nis');
		$siswa_pass = $this->input->post('password');

		$siswa = $this->db->get_where('siswa',['siswa_nis' => $siswa_nis])->row_array();

		if($siswa){
			//data siswa ada
			if($siswa['siswa_status'] == 'Aktif'){
				if(md5($siswa_pass) == $siswa['siswa_pass']){
					$data = [
						'siswa_nis' => $siswa['siswa_nis'],
						'siswa_nama' => $siswa['siswa_nama'],
						'status' => "login",
						'level' => "siswa",
					];
					$text = '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Selamat Datang di SIARSIS SMP Negeri 2 Godean !
                    </div>';
            		echo $this->session->set_flashdata('msg',$text);
					$this->session->set_userdata($data);
					redirect('siswa/dashboard');
				}
				else{
					$text = '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Password salah!</h4>
					Silahkan cek kembali!
					</div>';
					$this->session->set_flashdata('msg',$text);
					redirect('loginsiswa');
				}

			}
			else {
				$text = '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-warning"></i> Data Siswa tidak aktif!</h4>
				Silahkan hubungi staff TU!
				</div>';
				$this->session->set_flashdata('msg',$text);
				redirect('loginsiswa');
			}
		}
		else {
			$text = '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-warning"></i> Data Siswa salah!</h4>
			Silahkan cek kembali!
			</div>';
			$this->session->set_flashdata('msg',$text);
			redirect('loginsiswa');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('loginsiswa');
	}
	}
 
