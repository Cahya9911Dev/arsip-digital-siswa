<?php

class M_kelas extends CI_Model{
    private $table = 'kelas';
    private $id = 'kelas_id';
    private $nama = 'kelas_nama';


    public function get_data($table){
        return $this->db->get($table);  
    }

    public function tampilsiswa($kelas_id){
        $query = $this->db->query("SELECT siswa.siswa_id,
        siswa.`siswa_nis`,
        siswa.`siswa_nama`,
        siswa.`siswa_alamat`,
        siswa.`siswa_nomorhp`,
        siswa.`siswa_status`,
        siswa.`siswa_statusarsip`,
        kelas.`kelas_nama`
        FROM siswa INNER JOIN kelas
        ON siswa.`siswa_kelas`=kelas.`kelas_id`
        WHERE kelas.`kelas_id`='$kelas_id'")->result_array();
        return $query;
    }
    

    function generateIdKelas()
   {
        $this->db->select('RIGHT(kelas_id,3) as kelas_id', false);
        $this->db->order_by("kelas_id", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('kelas');

        if($query->num_rows() <> 0)
        {
            $data       = $query->row();
            $IdKelas  = intval($data->kelas_id) + 1; 
        }else{
            $IdKelas  = 1;
        }

        $lastKode = str_pad($IdKelas, 3, "0", STR_PAD_LEFT);
        $kl      = "KL";

        $newKode  = $kl."-".$lastKode;

        return $newKode;
    }
        

    public function insert_data($data,$table){
        $this->db->insert($table,$data);
    }

    public function update_data($table,$data,$where){
        $this->db->update($table, $data,$where);
    }

    public function arsipkan_kelas($table,$data,$where){
        $this->db->update($table, $data,$where);
    }

    public function hapuskelas($kelas_id)
    {
        $this->db->where($this->id, $kelas_id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
}