<?php
class M_hotel extends CI_Model
{
    public function getHotel()
    {
        $query = "SELECT `hotel`.*,`city`.`city`,`user`.`email`
                    FROM `hotel` JOIN `city`
                    ON `hotel`.`id_city` = `city`.`id`
                    JOIN `user` ON `hotel`.`id_user` = `user`.`id`
        ";
        return $this->db->query($query)->result();
    }
    public function update($where, $table, $data)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}