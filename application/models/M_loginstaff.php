<?php
class M_loginstaff extends CI_Model{

    //cek username dan password staff
    public function login_staff($staff_nip,$staff_password){
      return $this->db->query("SELECT * FROM staff WHERE staff_nip='$staff_nip' AND staff_pass='$staff_password'")->row();
    }
}

?>