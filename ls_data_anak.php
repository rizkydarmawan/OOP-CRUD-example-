<?php require 'core/init.php'; ?>
<?php
require 'template/header.php'; 
?>

<h2> List Data Anak </h2>
<table>
	<thead>
		<th> No </th>
		<th> Nama </th>
		<th> Alamat </th>
		<th> No kesukaan </th>
		<th> Action </th>
	</thead>
	<tbody>
	<?php
	$no = 1;
	$anaks = $anak->show_all_data('tbl_anak');
	foreach ($anaks as $anak) {
	?>
		<tr>
			<td> <?= $no++ ?> </td>
			<td> <?= $anak['nama'] ?> </td>
			<td> <?= $anak['alamat'] ?> </td>
			<td> <?= $anak['no'] ?> </td>
			<td>
				<a href="edit_anak.php?id=<?= $anak['id'] ?>"> Edit </a> ||
				<a href="delete.php?id=<?= $anak['id']?>&token=<?= Token::generate()?>"> Hapus </a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>


<?php require 'template/footer.php'; ?>