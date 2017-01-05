<?php require 'core/init.php'; ?>

<?php
if (!$user->is_login('username')) {
	Redirect::to('404.php');
}
$data_anak = $anak->get_data(Input::get('id'));
$errors = array();
if ($user->is_admin(Session::get('username'))) {
	
	$update = Input::get('update');
	if ($update) {
		if (Token::check(Input::get('token') )) {
			$nama   = Input::get('nama');
			$alamat = Input::get('alamat');
			$no     = Input::get('nomor');
			$validation = new Validation();
			$validation = $validation->check(array(
				'nama' => array(
							'required' => true,
							'min'      => 3,
							'max'      => 50,
						),
				'alamat' => array(
							'required' => true,
							'min'      => 3,
							'max'      => 100,
						),
				'nomor'  => array(
							'min'      => 1,
						)
			));
			if ($anak->cek_nama('tbl_anak','nama', $nama)) {
				$errors[] = "Nama Sudah Ada Di data Lain!";
			} else {
				if ($validation->passed()) {
						$anak->update('tbl_anak',array(
								'nama'   => $nama,
								'alamat' => $alamat,
								'no'	 => $no,
							), Input::get('id'));
					// Session::flash('add', '<h3> Berhasil Input Anak </h3>');
					Redirect::to('ls_data_anak.php');
				} else {
					$errors = $validation->errors();
				}
			}
		} else $errors[] = "Jangan Coba2";
	}
}
require 'template/header.php'; 
?>
<fieldset>
<legend><h2> Tambah Data Anak</h2></legend>
<form action="" method="post">
	<input type="text" name="nama" value="<?= $data_anak['nama'] ?>">
	<input type="text" name="alamat" value="<?= $data_anak['alamat'] ?>">
	<input type="number" name="nomor" value="<?= $data_anak['no'] ?>">
	<input type="hidden" name="token" value="<?= Token::generate()?>">
	<input type="submit" name="update" value="Save">
</form>
</fieldset>
<div class="error">
	<?php 
	foreach ($errors as $error) { ?>
		<li> <?= toUpper($error) ?> </li>
	<?php } ?>
</div>
<?php require 'template/footer.php'; ?>