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

	public function cek_nama($table, $field, $value)
	{
		$data = $this->_db->get_info($table, $field, $value);
        if ($data) return true ;
        else return false;
	}

	public function show_all_data($table)
	{
		return $this->_db->get_info($table);
	}
	public function get_data($id)
	{	
		if ($this->cek_nama('tbl_anak','id',$id)){
			return $this->_db->get_info('tbl_anak','id',$id);
		}
	}
	public function update($table, $field = array(), $id)
	{
		if($this->_db->update($table, $field, $id)){
			return true;
		} else return false;
	}

	public function delete($table, $field, $id)
	{
		if ($this->_db->delete($table, 'id', $id)) {
			return true;
		}else return false;
	}
}

?>