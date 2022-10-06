<?php
class M_admin extends CI_Model{
    public function index(){

    } 
    public function get_data_category(){
        return $this->db->get('tb_category')->result();
    }
    public function get_data_variasi(){
        return $this->db->get('tb_variasi_menu')->result();
    }
    public function add($table,$data) {
        $this->db->insert($table,$data);
    }
    public function delete($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
     } 
     public function get_data_category_where($id){
        $this->db->where_in('id_category', $id);
        return $this->db->get('tb_category')->result();
    }
    public function update($where,$table,$data){
        $this->db->where($where);
        $this->db->update($table,$data);
     }
     public function get_data_variasi_where($id){
        $this->db->where_in('id_variasi', $id);
        return $this->db->get('tb_variasi_menu')->result();
    }
   
}