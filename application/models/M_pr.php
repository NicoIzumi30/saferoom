<?php
class M_pr extends CI_Model
{
    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function article_where($id)
    {
        $this->db->where_in('id_artikel', $id);
        return $this->db->get('artikel')->result();
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
}
