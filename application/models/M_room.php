<?php
class M_room extends CI_Model
{
    public function getRoom()
    {
        $query = "SELECT `room`.*,`user`.`email`,`hotel`.`nama_hotel`,`name`.`room_type`
                    FROM `hotel` JOIN `city`
                    ON `room`.`user_id` = `user`.`id`
                    JOIN `hotel` ON `room`.`hotel_id` = `hotel`.`id`
                    JOIN `room_type` ON `room`.`type_id` = `type`.`id`
        ";
        return $this->db->query($query)->result();
    }
    public function update($where, $table, $data)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}