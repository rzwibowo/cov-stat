<?php 

class M_login extends CI_Model{	
	function cek_login($where){
        $result = false;
        if ($where['username'] == 'admin' 
            && $where['password'] == md5('lawanCorona2020!')) {
            $result = true;
        }
		return $result;
	}	
}