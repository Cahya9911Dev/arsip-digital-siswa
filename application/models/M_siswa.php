<?php

class M_siswa extends CI_Model{

    private $table = 'siswa';
    private $id = 'siswa.siswa_id';
    private $kid ='siswa.siswa_kelas';

    public function get_data()
    {
        return $this->db->query("SELECT * FROM siswaaktif");
    }

    public function get_arsipsiswa()
    {
        $table=$this->db->query("SELECT * FROM arsipsiswa");
        return $table;
    }

    public function get_siswabelumada()
    {
        $table=$this->db->query("SELECT * FROM siswabelum");
        return $table;
    }

    public function get_siswakurang()
    {
        $table=$this->db->query("SELECT * FROM siswakurang");
        return $table;
    }

    public function get_siswalengkap()
    {
        $table=$this->db->query("SELECT * FROM siswalengkap");
        return $table;
    }

    public function get_by_id($siswa_id)
    {
        $query = $this->db->query("SELECT 
        siswa.`siswa_id`,
        siswa.`siswa_nis`,
        siswa.`siswa_nama`,
        siswa.`siswa_alamat`,
        siswa.`siswa_nomorhp`,
        siswa.`siswa_tempatlahir`,
        siswa.`siswa_tgllahir`,
        siswa.`siswa_jenkel`,
        siswa.`siswa_status`,
        siswa.`siswa_tahunkeluar`,
        siswa.`siswa_statusarsip`,
        siswa.`siswa_foto`,
        siswa.`siswa_kk`,
        siswa.`siswa_akta`,
        siswa.`siswa_ktpayah`,
        siswa.`siswa_ktpibu`,
        siswa.`siswa_kips`,
        siswa.`siswa_sktm`,
        siswa.`siswa_ijazah`,
        siswa.`siswa_skhun`,
        kelas.`kelas_id`,
        kelas.`kelas_nama`,
        kelas.`kelas_wali` 
        FROM siswa INNER JOIN kelas
        ON siswa.`siswa_kelas`=kelas.`kelas_id`
        WHERE siswa.`siswa_id`='$siswa_id';");
        return $query->row();
    }

    public function get_kelas_id($kelas_id)
    {
        $query = $this->db->query("SELECT 
        siswa.`siswa_id`,
        siswa.`siswa_nis`,
        siswa.`siswa_nama`,
        siswa.`siswa_alamat`,
        siswa.`siswa_nomorhp`,
        siswa.`siswa_tempatlahir`,
        siswa.`siswa_tgllahir`,
        siswa.`siswa_jenkel`,
        siswa.`siswa_status`,
        siswa.`siswa_tahunkeluar`,
        siswa.`siswa_statusarsip`,
        siswa.`siswa_foto`,
        siswa.`siswa_kk`,
        siswa.`siswa_akta`,
        siswa.`siswa_ktpayah`,
        siswa.`siswa_ktpibu`,
        siswa.`siswa_kips`,
        siswa.`siswa_sktm`,
        siswa.`siswa_ijazah`,
        siswa.`siswa_skhun`,
        kelas.`kelas_id`,
        kelas.`kelas_nama`,
        kelas.`kelas_wali` 
        FROM siswa INNER JOIN kelas
        ON siswa.`siswa_kelas`= kelas.`kelas_id`
        WHERE kelas.`kelas_id`='$kelas_id';");
        return $query->row();
    }

    function generateIdSiswa()
   {
        $this->db->select('RIGHT(siswa_id,3) as siswa_id', false);
        $this->db->order_by("siswa_id", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('siswa');

        if($query->num_rows() <> 0)
        {
            $data       = $query->row();
            $IdSiswa  = intval($data->siswa_id) + 1; 
        }else{
            $IdSiswa  = 1;
        }

        $lastKode = str_pad($IdSiswa, 3, "0", STR_PAD_LEFT);
        $sw      = "SW";

        $newKode  = $sw."-".$lastKode;

        return $newKode;
    }

    public function insertsiswa($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function updatesiswa($data, $siswa_id)
    {
        $this->db->where($this->id, $siswa_id);
        $this->db->update($this->table, $data);

        return $this->db->affected_rows();
    }

    public function hapussiswaaktif($table,$siswa,$wheresiswa){
        $this->db->update($table, $siswa,$wheresiswa);
    }

    public function hapussiswa($siswa_id)
    {
        $this->db->where($this->id, $siswa_id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function hapussiswakelas($kelas_id)
    {
        $this->db->where($this->kid, $kelas_id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

}
