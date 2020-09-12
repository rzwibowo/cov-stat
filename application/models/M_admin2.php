<?php 

class M_admin2 extends CI_Model{	
    function view($par, $val) {
        $this->db->select('id, tanggal, suspek, probabel,
            konfirmasi, sembuh, meninggal');
        $this->db->from('histori_v2');
        if ($par == 'nav') {
            $this->db->limit(10, $val);
        } elseif ($par == 'tgl') {
            $where = array(
                'tanggal' => $val
            );
            $this->db->where($where);
        }
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get();
    }
    function counted() {
        return $this->db->count_all('histori_v2');
    }
    function get($id) {
        $where = array(
            'id' => $id
        );
        return $this->db->get_where('histori_v2', $where);
    }
    function save($data) {
        $ret = false;
        if ($this->db->insert('histori_v2', $data)) $ret = true;
        return $ret;	
    }
    function update($data) {
        $ret = false;
        $where = array(
            'id' => $data->id
        );
        $this->db->where($where);
        if ($this->db->update('histori_v2', $data)) $ret = true;
        return $ret;
    }
    function delete($id) {
        $ret = false;
        $where = array(
            'id' => $id
        );
        $this->db->where($where);
        if ($this->db->delete('histori_v2')) $ret = true;
        return $ret;
    }
}