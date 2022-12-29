<?php

class Student extends CI_Model{
    public function getData()
    {
        //kembalikan nilai yang diambil dari database
        return $this->db->get('tb_ci');
    }

    public function input_data($data, $table){
        $this->db->insert($table,$data);
    }

    public function delete($id){
        $idData = $this->db->where('id', $id);
        $this->db->delete('tb_ci');
    }
    public function edit($id){
        return $this->db->get_where('tb_ci', array('id' => $id));
    }
    public function update_data($data, $table, $id){
        $this->db->where('id', $id);
        $this->db->update($table,$data);
    }
}
?>