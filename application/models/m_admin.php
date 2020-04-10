<?php 

class M_admin extends CI_Model{	
    function view() {
        $this->db->select('id, tanggal, odp, pdp,
            positif, sembuh, meninggal');
        $this->db->from('histori');
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get();
    }
    function get($id) {
        $where = array(
            'id' => $id
        );
        return $this->db->get_where('histori', $where);
    }
    function save($data) {
        $ret = false;
        if ($this->db->insert('histori', $data)) $ret = true;
        return $ret;	
    }
    function update($data) {
        $ret = false;
        $where = array(
            'id' => $data->id
        );
        $this->db->where($where);
        if ($this->db->update('histori', $data)) $ret = true;
        return $ret;
    }
    function delete($id) {
        $ret = false;
        $where = array(
            'id' => $id
        );
        $this->db->where($where);
        if ($this->db->delete('histori')) $ret = true;
        return $ret;
    }
}