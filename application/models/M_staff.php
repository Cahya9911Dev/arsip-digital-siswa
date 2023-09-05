<?php

class M_staff extends CI_Model{

    private $table = 'staff';
    private $id = 'staff.staff_id';

    public function get_data()
    {
        return $this->db->query("SELECT * FROM staff");
    }

    public function get_by_id($staff_id)
    {
        $this->db->from($this->table);
        $this->db->where($this->id, $staff_id);
        $query = $this->db->get();
        return $query->row();
    }

    function generateIdStaff()
   {
        $this->db->select('RIGHT(staff_id,3) as staff_id', false);
        $this->db->order_by("staff_id", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('staff');

        if($query->num_rows() <> 0)
        {
            $data       = $query->row();
            $IdStaff  = intval($data->staff_id) + 1; 
        }else{
            $IdStaff  = 1;
        }

        $lastKode = str_pad($IdStaff, 3, "0", STR_PAD_LEFT);
        $st      = "ST";

        $newKode  = $st."-".$lastKode;

        return $newKode;
    }

    public function insertstaff($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function updatestaff($data, $staff_id)
    {
        $this->db->where($this->id, $staff_id);
        $this->db->update($this->table, $data);

        return $this->db->affected_rows();
    }

    public function hapusstaff($staff_id)
    {
        $this->db->where($this->id, $staff_id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

}