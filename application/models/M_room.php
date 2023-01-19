<?php
class M_room extends CI_Model
{
    public function getRoom()
    {
        $query = "SELECT `room`.*,`hotel`.`nama_hotel`,`user`.`email`,`room_type`.`name`
                    FROM `room` JOIN `hotel`
                    ON `room`.`hotel_id` = `hotel`.`id`
                    JOIN `user` ON `room`.`user_id` = `user`.`id`
                    JOIN `room_type` ON `room`.`type_id` = `room_type`.`id`
        ";
        return $this->db->query($query)->result();
    }
    public function update($where, $table, $data)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function room($id)
    {
        $query = "SELECT `room`.*,`city`.`city`
                    FROM `room` JOIN `city` ON `room`.`city_id` = `city`.`id`
                    WHERE `room`.`city_id` = $id
        ";
        return $this->db->query($query)->result();
    }
    public function search($keywoard)
    {
        $query = "SELECT `room`.*,`city`.`city`
                    FROM `room` JOIN `city` ON `room`.`city_id` = `city`.`id`
                    WHERE `room`.`room_name` LIKE '%$keywoard%'
        ";
        return $this->db->query($query)->result();
    }
    public function getRoomW($id)
    {
        $query = "SELECT `room`.*,`hotel`.`nama_hotel`,`hotel`.`id_city`,`user`.`email`,`room_type`.`name`
                    FROM `room` JOIN `hotel`
                    ON `room`.`hotel_id` = `hotel`.`id`
                    JOIN `user` ON `room`.`user_id` = `user`.`id`
                    JOIN `room_type` ON `room`.`type_id` = `room_type`.`id`
                    WHERE `room`.`user_id` = $id
        ";
        return $this->db->query($query)->result();
    }
    public function getRoomWH($id)
    {
        $query = "SELECT `room`.*,`room_type`.`name`
                    FROM `room` JOIN `room_type` ON `room`.`type_id` = `room_type`.`id`
                    WHERE `room`.`id` = $id
        ";
        return $this->db->query($query)->row_array();
    }
    public function getRoomWHO($id)
    {
        $query = "SELECT `room`.*,`room_type`.`name`,`hotel`.`maps`
                    FROM `room` JOIN `room_type` ON `room`.`type_id` = `room_type`.`id`
                    JOIN `hotel` ON `room`.`hotel_id` = `hotel`.`id`
                    WHERE `room`.`id` = $id
        ";
        return $this->db->query($query)->result();
    }
    public function shorten($string, $length, $end = '…')
    {
        if (strlen($string) > $length) {
            $length -= strlen($end);
            $string  = substr($string, 0, $length);
            $string .= $end;
        }

        return $string;
    }
    public function pesanan()
    {
        $query = "SELECT `pesanan`.*,`hotel`.`nama_hotel`,`user_client`.`full_name`,`payment_method`.`method`,`room`.`room_name`
        FROM `pesanan` JOIN `hotel`
        ON `pesanan`.`hotel_id` = `hotel`.`id`
        JOIN `user_client` ON `pesanan`.`user_id` = `user_client`.`id`
        JOIN `payment_method` ON `pesanan`.`payment_method` = `payment_method`.`id`JOIN `room` ON `pesanan`.`room_id` = `room`.`id`
        WHERE `pesanan`.`status` = 'Menunggu'
";
        return $this->db->query($query)->result();
    }
    public function failed()
    {
        $query = "SELECT `pesanan`.*,`hotel`.`nama_hotel`,`user_client`.`full_name`,`payment_method`.`method`,`room`.`room_name`
        FROM `pesanan` JOIN `hotel`
        ON `pesanan`.`hotel_id` = `hotel`.`id`
        JOIN `user_client` ON `pesanan`.`user_id` = `user_client`.`id`
        JOIN `payment_method` ON `pesanan`.`payment_method` = `payment_method`.`id`JOIN `room` ON `pesanan`.`room_id` = `room`.`id`
        WHERE `pesanan`.`status` = 'Expired'
";
        return $this->db->query($query)->result();
    }
    public function transaksi()
    {

        $query = "SELECT `transaksi`.*,`hotel`.`nama_hotel`,`user_client`.`full_name`,`payment_method`.`method`,`room`.`room_name`
        FROM `transaksi` JOIN `hotel`
        ON `transaksi`.`hotel_id` = `hotel`.`id`
        JOIN `user_client` ON `transaksi`.`user_id` = `user_client`.`id`
        JOIN `payment_method` ON `transaksi`.`payment_method` = `payment_method`.`id`JOIN `room` ON `transaksi`.`room_id` = `room`.`id`
";
        return $this->db->query($query)->result();
    }
    public function transaksiPart()
    {
        $hotel = $this->db->get_where('hotel', ['id_user' => $this->session->userdata('id')])->row_array();
        $id = $hotel['id'];
        $query = "SELECT `transaksi`.*,`hotel`.`nama_hotel`,`user_client`.`full_name`,`payment_method`.`method`,`room`.`room_name`
        FROM `transaksi` JOIN `hotel`
        ON `transaksi`.`hotel_id` = $id
        JOIN `user_client` ON `transaksi`.`user_id` = `user_client`.`id`
        JOIN `payment_method` ON `transaksi`.`payment_method` = `payment_method`.`id`JOIN `room` ON `transaksi`.`room_id` = `room`.`id`
";
        return $this->db->query($query)->result();
    }
}