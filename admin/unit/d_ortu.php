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
                <li>Data Ortu Calon Siswa</li>
		<li>Data Ortu Calon Siswa</li>
            </ul><!-- /.breadcrumb -->
	</div>
        <div class="page-content">
            <div class="page-header">
                <h1>Data Ortu Calon Siswa
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
                                        <th style="text-align: center">Nama Orang Tua</th>
                                        <th style="text-align: center">Pendidikan Orang tua</th>
                                        <th style="text-align: center">Pekerjaan Orang Tua</th>
                                        <th style="text-align: center">No Telp Orang tua</th>
                                        <th style="text-align: center">Alamat Orang Tua</th>
                                        <th style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
                                    $qdatagrid =" SELECT * FROM tb_pendaftaran ";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
                                        echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
                                             <td style= text-align:left  >$ddatagrid[no_pendaftaran]</td>
                                                 <td style= text-align:left  >$ddatagrid[nama_siswa]</td>
                                                  <td style= text-align:left  >$ddatagrid[nama_ortu]</td>
                                             <td style= text-align:left  >$ddatagrid[pendidikan_ortu]</td>
                                             <td style= text-align:left  >$ddatagrid[pekerjaan_ortu]</td>
                                            <td style= text-align:left  >$ddatagrid[no_telp_ortu]</td>
                                             <td style= text-align:left  >$ddatagrid[alamat_ortu]</td>
                                                    
                                             <td style=text-align:center>
                                                 <a href=?unit=d_ortu&act=update&kd_pendaftaran=$ddatagrid[kd_pendaftaran] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                                 <a href=?unit=d_ortu&act=delete&kd_pendaftaran=$ddatagrid[kd_pendaftaran] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data ortu?\")'></a>    
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
    
       
    
        case "update":
        $kd_pendaftaran = $_GET['kd_pendaftaran'];
        $qupdate = "SELECT * FROM tb_pendaftaran WHERE kd_pendaftaran = '$kd_pendaftaran'";
        $rupdate = mysqli_query($mysqli, $qupdate);
        $dupdate = mysqli_fetch_assoc($rupdate);
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
								<a href="#">beranda</a>
							</li>
              <li>Data Ortu Calon Siswa</li>
							<li>Edit Data Ortu Calon Siswa </li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Edit Data Ortu Calon Siswa </h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
                 
                                      
                  <div class="form-group">
                      <form method="post" action="adminmainapp.php?unit=d_ortu&act=updateact" enctype="multipart/form-data" >    
                        
                      <label for="no_pendaftaran">No Pendaftaran</label><br>
                        <input type="text" name="no_pendaftaran" id="kd_pendaftaran" value="<?php echo $dupdate['no_pendaftaran'] ?>" readonly="readonly" >
                      <br><br>
                      <label for="nama_siswa">Nama Siswa</label><br>
                        <input type="text" name="nama_siswa" id="nama_siswa" value="<?php echo $dupdate['nama_siswa'] ?>" readonly="readonly" >
                      <br><br>
                     
                      <label for="nama_ortu">Nama Orang Tua</label><br>
                       <input type="text" name="nama_ortu" id="nama_ortu" required value="<?php echo $dupdate['nama_ortu'] ?>"/><br><br>
                   <label for="pendidikan_ortu">Pendidikan Orang Tua</label><br>
                       <input type="text" name="pendidikan_ortu" id="pendidikan_ortu" required value="<?php echo $dupdate['pendidikan_ortu'] ?>"/><br><br>
                   <label for="pekerjaan_ortu">Pekerjaan Orang Tua</label><br>
                       <input type="text" name="pekerjaan_ortu" id="pekerjaan_ortu" required value="<?php echo $dupdate['pekerjaan_ortu'] ?>"/><br><br>
                   <label for="no_telp_ortu">No Telpon Orang Tua</label><br>
                       <input type="text" name="no_telp_ortu" id="no_telp_ortu" required value="<?php echo $dupdate['no_telp_ortu'] ?>"/><br><br>
                   <label for="alamat_ortu">Alamat Orang Tua</label><br>
                   <textarea type="textarea" name="alamat_ortu" id="alamat_ortu"><?php echo $dupdate['alamat_ortu'] ?></textarea><br><br>
                   
                  
                      
           
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                       </form>
                  </div>
             

                   
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
                
			</div><!-- /.main-content -->
		<?php
            include("../admin/footer.php");
            ?>
	</body>
</html>
 <?php
        break;
    
            case "updateact":
              $no_pendaftaran = $_POST['no_pendaftaran'];
            $nama_ortu = $_POST['nama_ortu'];
            $pendidikan_ortu = $_POST['pendidikan_ortu'];
            $pekerjaan_ortu = $_POST['pekerjaan_ortu'];
            $no_telp_ortu = $_POST['no_telp_ortu'];
            $alamat_ortu = $_POST['alamat_ortu'];
          
        $qupdate = "
          UPDATE tb_pendaftaran SET
            nama_ortu = '$nama_ortu',
            pendidikan_ortu = '$pendidikan_ortu',
            pekerjaan_ortu = '$pekerjaan_ortu',
            no_telp_ortu = '$no_telp_ortu',
            alamat_ortu = '$alamat_ortu'
            
          WHERE
            no_pendaftaran = '$no_pendaftaran'
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
       
        if ($rinput) {
          echo "gagal";
          exit();
         } 
         else{
          echo "<script> alert('Data Telah di Edit');
              document.location='?unit=d_ortu&act=datagrid';
              </script>";
         }
            
                 break;
    
        case "delete":
              $kd_pendaftaran = $_GET['kd_pendaftaran'];
        $qdelete = "
           UPDATE tb_pendaftaran SET
           nama_ortu = '',
           pendidikan_ortu = '',
           pekerjaan_ortu = '',
           no_telp_ortu = '',
           alamat_ortu = ''
          WHERE
            kd_pendaftaran = '$kd_pendaftaran'
        ";
        
             $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=d_ortu&act=datagrid");
        break;
}