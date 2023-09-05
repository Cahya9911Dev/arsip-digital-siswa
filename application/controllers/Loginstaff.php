<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginstaff extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index(){
		$this->form_validation->set_rules('nip', 'Nip', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

        if($this->form_validation->run() == false){
			$this->load->view('loginstaff');
		}
		else{
			$this->_login();
		}
	}

	private function _login(){
		$staff_nip = $this->input->post('nip');
		$staff_pass = $this->input->post('password');

		$staff = $this->db->get_where('staff',['staff_nip' => $staff_nip])->row_array();

		if($staff){
			//data staff ada
			if($staff['staff_nip'] == $staff_nip){
				if(md5($staff_pass) == $staff['staff_pass']){
					if ($staff['staff_role'] == 'Administrator'){
					$data = [
						'staff_nip' => $staff['staff_nip'],
						'staff_nama' => $staff['staff_nama'],
						'akses'  => 'Administrator',
						'status' => "login",
						'level' => "staff",
					];
					$text = '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Selamat Datang di SIARSIS SMP Negeri 2 Godean !
                    </div>';
            		echo $this->session->set_flashdata('msg',$text);
					$this->session->set_userdata($data);
					redirect('staff/dashboard');
					}

					if ($staff['staff_role'] == 'Staff Biasa'){
						$data = [
							'staff_nip' => $staff['staff_nip'],
							'staff_nama' => $staff['staff_nama'],
							'akses'  => 'Staff Biasa',
							'status' => "login",
							'level' => "staff",
						];
						$text = '<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						Selamat Datang di SIARSIS SMP Negeri 2 Godean !
						</div>';
						echo $this->session->set_flashdata('msg',$text);
						$this->session->set_userdata($data);
						redirect('staff/dashboard');
						}
				}
				else{
					$text = '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Password salah!</h4>
					Silahkan cek kembali!
					</div>';
					$this->session->set_flashdata('msg',$text);
					redirect('loginstaff');
				}

			}
			else {
				$text = '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-warning"></i> Data Staff Tidak Valid!</h4>
				Silahkan cek kembali!
				</div>';
				$this->session->set_flashdata('msg',$text);
				redirect('loginstaff');
			}
		}
		else {
			$text = '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-warning"></i> Data Staff salah!</h4>
			Silahkan cek kembali!
			</div>';
			$this->session->set_flashdata('msg',$text);
			redirect('loginstaff');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('loginstaff');
	}
	}
 
