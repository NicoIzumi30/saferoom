<?php
class M_menu extends CI_Model
{
    public function get_data_menu_where($id)
    {
        $this->db->where_in('id', $id);
        return $this->db->get('user_menu')->result();
    }
    public function get_data_role_where($id)
    {
        $this->db->where_in('id', $id);
        return $this->db->get('user_role')->result();
    }

    public function update($where, $table, $data)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*,`user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
        ";
        return $this->db->query($query)->result_array();
    }
    public function getSubMenuWhere($id)
    {
        $query = "SELECT `user_sub_menu`.*,`user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                    WHERE `user_sub_menu`.id = $id
        ";
        return $this->db->query($query)->result();
    }
    public function get_data_submenu_where($id)
    {
        $this->db->where_in('id', $id);
        return $this->db->get('user_menu')->result();
    }
    public function get_data_access()
    {
        $this->db->select('*');
        $this->db->from('user_access_menu');
        $this->db->join('user_role', 'user_role.id = user_access_menu.role_id');
        $this->db->join('user_menu', 'user_menu.id = user_access_menu.menu_id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_data_roleId_where($id)
    {
        $this->db->where_in('id', $id);
        return $this->db->get('user_role')->result();
    }
    public function getAccMenuWhere($id)
    {
        $this->db->select('*');
        $this->db->from('user_access_menu');
        $this->db->join('user_role', 'user_role.id = user_access_menu.role_id');
        $this->db->join('user_menu', 'user_menu.id = user_access_menu.menu_id');
        $this->db->where('user_access_menu.id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
}
