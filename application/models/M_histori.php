<?php 

class M_histori extends CI_Model{	
    function latest() {
        $this->db->select('id, tanggal, odp, pdp,
            positif, sembuh, meninggal');
        $this->db->from('histori');
        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit(1);
        return $this->db->get();
    }
    function rangeTanggal($tgl_awal, $tgl_akhir) {
        $this->db->select('id, tanggal, odp, pdp,
            positif, sembuh, meninggal');
        $this->db->from('histori');
        $this->db->where('tanggal BETWEEN \''.$tgl_awal.'\' AND \''.$tgl_akhir.'\'');
        $this->db->order_by('tanggal');
        return $this->db->get();
    }
}