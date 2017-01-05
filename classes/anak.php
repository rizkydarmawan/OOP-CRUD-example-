<?php

class Anak
{
	private $_db;
	public function __construct()
	{
		$this->_db = Database::getInstance();
	}
	public function insert($field = array())
	{
		if($this->_db->insert('tbl_anak', $field)){
			return true;
		} else return false;
	}

	public function cek_nama($nama)
	{
		$data = $this->_db->get_info('tbl_anak', 'nama', $nama);
        if ($data) return true ;
        else return false;
	}
}

?>