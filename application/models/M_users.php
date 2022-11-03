<?php
class M_users extends CI_Model
{
    public function getUsers()
    {
        $query = "SELECT `user`.*,`user_role`.`role`
                    FROM `user` JOIN `user_role`
                    ON `user`.`role_id` = `user_role`.`id`
        ";
        return $this->db->query($query)->result();
    }
}
