<?php
require "core/init.php";
if (Input::get('token')){

		if (!$user->is_admin(Session::get('username'))) {
			Redirect::to('404.php');
		} else {
			$anak->delete('tbl_anak','id',Input::get('id'));
			Redirect::to('ls_data_anak.php');
		}
} else {
	Redirect::to('404.php');
}
?>