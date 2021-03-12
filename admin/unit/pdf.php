<!DOCTYPE html>
<?php 
ob_start();
?>
<page>
		<style type="text/css">
		table#barang{
			border: 2px solid darkgrey;
		}
		th{
			border-bottom: 2px solid darkgrey;
		}
		td.table-td{
			border-bottom: 2px solid darkgrey;
			border-right: 0.5px solid darkgrey;
		}
		</style>
		<h1 align="center"> </h1>
		<table border="0" align="center" style="font-size: 16px; border-collapse: collapse; width: 100%;">
			<tr><td style="font-size: 18px; width: 90%;" align="center;"><b>KEMENTRIAN AGAMA</b></td></tr>
			<tr><td style="font-size: 18px; width: 90%;" align="center;"><b>HULU SUNGAI SELATAN</b></td></tr>
			<tr><td style="font-size: 18px; width: 90%;" align="center;"><b>MADRASAH ALIYAH MEGERI 2</b></td></tr>
			<tr><td style="font-size: 14px; width: 92%;" align="center;">Jl.Telaga Sungai Tabuk No.13 Mandiangin, Barabai 0517 (41046)</td></tr>
		</table>
		<hr>
		<h3 align="center">DATA PENDAFTARAN</h3>
		<p></p>
		<table border="3" style="font-size: 16px; border-collapse: collapse; width: 100%;">
			<tr>
			<td>&nbsp;No&nbsp;</td>
			<td>&nbsp; No Pendaftraan &nbsp;</td>
			<td> &nbsp; NISN &nbsp;</td>
			<td> &nbsp; Nama Siswa &nbsp;</td>
			<td> &nbsp; Jenis Kelamin &nbsp;</td>
			<td> &nbsp; Asal Sekolah &nbsp;</td>
			<td> &nbsp; Status &nbsp;</td>
			</tr>
		 <?php
		 $no=1;
         $mysqli= mysqli_connect("localhost","root","","ppbd_online");
        $no_pendaftaran = $_GET['no_pendaftaran'];
        $qupdate = "SELECT * FROM tb_pendaftaran";
        $rupdate = mysqli_query($mysqli, $qupdate);
        while($dupdate = mysqli_fetch_assoc($rupdate)){
        	$st="";
                            if($dupdate['status_seleksi']=='z')
                            {
                                    $st='<span>Lulus</span>';		
                            }
                            else if ($dupdate['status_seleksi']=='w')
                            {
                                    $st= '<span >Tidak Lulus</span>';
                            }
                            else if($dupdate['status_seleksi']=='t')
                            {
                                    $st='<span>Cadangan</span>';
                            }
                            else if($dupdate['status_seleksi']=='a')
                            {
                                    $st='<span >Menunggu</span>';
                            }
		?>
<tr><td>&nbsp;<?php echo $no ?>&nbsp;</td>
<td>&nbsp;<?php echo $dupdate['no_pendaftaran']; ?>&nbsp;</td>
<td> &nbsp; <?php echo $dupdate['nisn']; ?>&nbsp;</td>
<td> &nbsp; <?php echo $dupdate['nama_siswa']; ?>&nbsp;</td>
<td> &nbsp; <?php echo $dupdate['jenis_kelamin']; ?>&nbsp;</td>
<td> &nbsp; <?php echo $dupdate['asal_sekolah']; ?>&nbsp;</td>
<td> &nbsp; <?php echo $st ?> &nbsp;</td></tr>

<?php $no++; } ?>
		</table>
       
		
<p></p>
	


		
		
		<br />
        <p></p>
		<?php
		
        ?>
		<table border="0" align="right" style="font-size: 16px; border-collapse: collapse; width: 100%;">
			<tr><td style="width: 100%; padding: 2;" align="right;">Barabai, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
			<tr><td style="width: 100%; padding: 2;" align="right;">Petugas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
			<tr><td style="width: 100%; padding: 2;" align="right;">&nbsp;<br/>&nbsp;<br/>&nbsp;</td></tr>
			<tr><td style="width: 100%; padding: 2;" align="right;">(..................................) &nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
		</table>
</page>
<?php
    $content = ob_get_clean();

// conversion HTML => PDF
 require_once(dirname(__FILE__).'../../../html2pdf/html2pdf.class.php');
 try
 {
 $html2pdf = new HTML2PDF('P','A4', 'fr', false, 'ISO-8859-15');
 $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
 ob_end_clean();
 $html2pdf->Output();
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>
</html>