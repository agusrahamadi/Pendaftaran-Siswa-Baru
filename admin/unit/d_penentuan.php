<?php
session_start();
require_once '../lib/koneksi.php';

$act = $_GET['act'];
switch($act){
    case "datagrid":
        ?>
<?php
include("../admin/leftbar.php");
?> 
<div class="main-content">
    <div class="main-content-inner">
	<div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="adminmainapp.php?unit=beranda">beranda</a>
                </li>
                <li>Data Penentuan kelulusan Calon Siswa</li>
		<li>Data Penentuan kelulusan Calon Siswa</li>
            </ul><!-- /.breadcrumb -->
	</div>
        <div class="page-content">
            <div class="page-header">
                <h1>Data Penentuan kelulusan Calon Siswa
                </h1>
            </div>
          
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row">
                        <div class="box box-primary">
                            <div class="box-body table-responsive padding">
                              <table id="datatable" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No.</th>
                                        <th style="text-align: center">No Pendaftaran</th>
                                        <th style="text-align: center">Nama Siswa</th>
                                        <th style="text-align: center">Satatus Seleksi</th>
                                        <th style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
                                    $qdatagrid =" SELECT * FROM tb_pendaftaran ";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
                                        $st="";
                            if($ddatagrid['status_seleksi']=='z')
                            {
                                    $st='<span class="label label-success">Lulus</span>';		
                            }
                            else if ($ddatagrid['status_seleksi']=='w')
                            {
                                    $st= '<span class="label label-danger">Tidak Lulus</span>';
                            }
                            else if($ddatagrid['status_seleksi']=='t')
                            {
                                    $st='<span class="label label-warning">Cadangan</span>';
                            }
                            else if($ddatagrid['status_seleksi']=='a')
                            {
                                    $st='<span class="label label-info">Menunggu</span>';
                            }
                                        echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
                                             <td style= text-align:left  >$ddatagrid[no_pendaftaran]</td>
                                                 <td style= text-align:left  >$ddatagrid[nama_siswa]</td>
                                                  <td style= text-align:left  >$st</td>
                                                    
                                             <td style=text-align:center>
                                                <a href=?unit=d_penentuan&act=lulus&kd_pendaftaran=$ddatagrid[kd_pendaftaran] class=' btn-sm btn-success glyphicon glyphicon-ok' onclick='return confirm(\"Lulus?\")'></a>
					<a href=?unit=d_penentuan&act=tolak&kd_pendaftaran=$ddatagrid[kd_pendaftaran] class=' btn-sm btn-danger glyphicon glyphicon-off' onclick='return confirm(\"Gagal?\")'></a>
                                            <a href=?unit=d_penentuan&act=cadangan&kd_pendaftaran=$ddatagrid[kd_pendaftaran] class=' btn-sm btn-warning glyphicon glyphicon-refresh' onclick='return confirm(\"Cadangan?\")'></a>
					     <a href=?unit=d_penentuan&act=menunggu&kd_pendaftaran=$ddatagrid[kd_pendaftaran] class=' btn-sm btn-info glyphicon glyphicon-refresh' onclick='return confirm(\"Menunggu?\")'></a>
					     </td>                
                                        </tr>
                                        ";
                                        $no++;
                                     }
                                     ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- /.row -->
                <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<?php
include("../admin/footer.php");
?>
      <!-- DATA TABLES SCRIPT -->
     <script src="../css/backend/js/jquery.dataTables.min.js" type="text/javascript"></script>
      <script src="../css/backend/js/jquery.dataTables.bootstrap.min.js" type="text/javascript"></script>
      <script type="text/javascript">
      function confirmDialog() {
       return confirm('Apakah anda yakin?')
      }
        $('#datatable').dataTable({
          "lengthMenu": [[10, 25, 50, 100, 500, 1000, -1], [10, 25, 50, 100, 500, 1000, "Semua"]]
        });
      </script>
	</body>
</html>
 <?php
        
        break;
    
   case "lulus":
      $kd_pendaftaran = $_GET['kd_pendaftaran'];
                $status = $_POST['status_seleksi'];
        $qupdate = "
          UPDATE tb_pendaftaran SET
            status_seleksi = 'z' 
     
          WHERE
            kd_pendaftaran = '$kd_pendaftaran' 
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        header("location:?unit=d_penentuan&act=datagrid");


        break;
    case "tolak":
      $kd_pendaftaran = $_GET['kd_pendaftaran'];
                $status = $_POST['status_seleksi'];
        $qupdate = "
          UPDATE tb_pendaftaran SET
            status_seleksi = 'w' 
     
          WHERE
            kd_pendaftaran = '$kd_pendaftaran' 
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        header("location:?unit=d_penentuan&act=datagrid");


        break;
    case "cadangan":
      $kd_pendaftaran = $_GET['kd_pendaftaran'];
                $status = $_POST['status_seleksi'];
        $qupdate = "
          UPDATE tb_pendaftaran SET
            status_seleksi = 't' 
     
          WHERE
            kd_pendaftaran = '$kd_pendaftaran' 
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        header("location:?unit=d_penentuan&act=datagrid");


        break;    
    case "menunggu":
      $kd_pendaftaran = $_GET['kd_pendaftaran'];
                $status = $_POST['status_seleksi'];
        $qupdate = "
          UPDATE tb_pendaftaran SET
            status_seleksi = 'a' 
     
          WHERE
            kd_pendaftaran = '$kd_pendaftaran' 
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        header("location:?unit=d_penentuan&act=datagrid");


        break;       
}