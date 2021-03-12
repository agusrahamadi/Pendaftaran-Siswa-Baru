<title>Data Pasien</title>
    <link href="../../css/bootstrap.css" rel="stylesheet" />
	<body style="
    background-color: #fff;
">

<div id="content2" style="overflow: scroll; margin-top: 0px;">   
<table class="table table-bordered" border='1' align='center' width='400' class="scroll" style="margin: auto; margin-left: 4px; margin-top: 0px;">
        <tr style="background-color:#dbd9de;">
				
	<th><center>No Pendaftaraan</center></th>
	<th><center>Nama Siswa</center></th>
	</tr>

<?php
 $mysqli= mysqli_connect("localhost","root","","ppbd_online");            
$query = "SELECT * FROM tb_pendaftaran WHERE ni = 'n' ORDER BY no_pendaftaran ASC";
$exe = mysqli_query($mysqli, $query);                   
while($row = mysqli_fetch_assoc($exe)){
$b = $row['no_pendaftaran'];
$c = $row['nama_siswa'];
?>
<tr id="tabel1" align="center" >			
<td><a href="#" style="text-decoration: none;"
onclick="window.opener.document.getElementById('no_pendaftaran').value = '<?php echo $b;?>';
	window.opener.document.getElementById('nama_siswa').value = '<?php echo $c;?>';
	 window.close();"><?php echo $b;?></a></td>
<td align="left"><a href="#" style="text-decoration: none;"
onclick="window.opener.document.getElementById('no_pendaftaran').value = '<?php echo $b;?>';
	window.opener.document.getElementById('nama_siswa').value = '<?php echo $c;?>';
	 window.close();"><?php echo $c;?></a></td>
</tr>
</br>
<?php
}
?>
</html>
