<?php require 'core/init.php'; ?>


<?php
if (!$user->is_login('username')) {
	Redirect::to('404.php');
}
$errors = array();
if ($user->is_admin(Session::get('username'))) {
	$save = Input::get('submit');
	if ($save) {
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

		if ($anak->cek_nama($nama)){
			$errors[] = "Nama Sudah Ada";
		} else {
			if ($validation->passed()) {
				$anak->insert(array(
							'nama'   => $nama,
							'alamat' => $alamat,
							'no'	 => $no,
						));
				// Session::flash('add', '<h3> Berhasil Input Anak </h3>');
				Redirect::to('add_data_anak.php');
			} else {
				$errors = $validation->errors();
			}
		}
	}
}
require 'template/header.php'; 
?>
<fieldset>
<legend><h2> Tambah Data Anak</h2></legend>
<form accept="" method="post">
	<input type="text" name="nama" placeholder="Nama Anak">
	<input type="text" name="alamat" placeholder="Alamat">
	<input type="number" name="nomor" placeholder="No Kesukaan anak">
	<input type="submit" name="submit" value="Save">
</form>
</fieldset>
<div class="error">

	<?php foreach ($errors as $error) {?>
	<li> <?= toUpper($error) ?> </li>
	<?php } 
	// if (Session::exists('add')) {
	// 	echo Session::flash('add');
	// }
	?>
</div>
<?php require 'template/footer.php'; ?>