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
                <li>Data Prestasi Calon Siswa</li>
		<li>Data Prestasi Calon Siswa</li>
            </ul><!-- /.breadcrumb -->
	</div>
        <div class="page-content">
            <div class="page-header">
                <h1>Data Prestasi Calon Siswa
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
                                        <th style="text-align: center">Nama Prestasi</th>
                                        <th style="text-align: center">Jenis Prestasi</th>
                                        <th style="text-align: center">Tingkat restasi</th>
                                        <th style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
                                    $qdatagrid =" SELECT 
                            tb_pendaftaran.kd_pendaftaran, tb_pendaftaran.no_pendaftaran, tb_pendaftaran.nama_siswa, tb_pendaftaran.prestasi,
                            tb_pendaftaran.tingkat_prestasi, tb_prestasi.kd_prestasi, tb_prestasi.jenis_prestasi
                            FROM 
                                tb_pendaftaran
                                    JOIN  tb_prestasi ON tb_pendaftaran.kd_prestasi =  tb_prestasi.kd_prestasi";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
                                        echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
                                             <td style= text-align:left  >$ddatagrid[no_pendaftaran]</td>
                                                 <td style= text-align:left  >$ddatagrid[nama_siswa]</td>
                                                  <td style= text-align:left  >$ddatagrid[prestasi]</td>
                                             <td style= text-align:left  >$ddatagrid[jenis_prestasi]</td>
                                             <td style= text-align:left  >$ddatagrid[tingkat_prestasi]</td>
                                                    
                                             <td style=text-align:center>
                                                 <a href=?unit=d_prestasi&act=update&kd_pendaftaran=$ddatagrid[kd_pendaftaran] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                                 <a href=?unit=d_prestasi&act=delete&kd_pendaftaran=$ddatagrid[kd_pendaftaran] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data ortu?\")'></a>    
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
              <li>Data Prestasi Calon Siswa</li>
							<li>Edit Data Prestasi Calon Siswa </li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Edit Data Prestasi Calon Siswa </h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
                 
                                      
                  <div class="form-group">
                      <form method="post" action="adminmainapp.php?unit=d_prestasi&act=updateact" enctype="multipart/form-data" >    
                         
                      <label for="no_pendaftaran">No Pendaftaran</label><br>
                        <input type="text" name="no_pendaftaran" id="kd_pendaftaran" value="<?php echo $dupdate['no_pendaftaran'] ?>" readonly="readonly" >
                      <br><br>
                      <label for="nama_siswa">Nama Siswa</label><br>
                        <input type="text" name="nama_siswa" id="nama_siswa" value="<?php echo $dupdate['nama_siswa'] ?>" readonly="readonly" >
                      <br><br>
                     
                      <label for="prestasi">Nama Prestasi</label><br>
                       <input type="text" name="prestasi" id="prestasi" required value="<?php echo $dupdate['prestasi'] ?>"/><br><br>
                  
                       <div class="form-group"><label>Jenis Prestasi</label><br>   
                    <select name="kd_prestasi" id="kd_prestasi" required>
                        <?php
                        $qcombo = 
                        "
                        SELECT * FROM tb_prestasi
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($dcombo = mysqli_fetch_assoc($rcombo)) {
                            if($dcombo['kd_prestasi'] == $dupdate['kd_prestasi']) {
                                echo "
                                <option value=$dcombo[kd_prestasi] selected=selected>$dcombo[jenis_prestasi]</option> 
                                ";                                
                            }
                            else {
                                echo "
                                <option value=$dcombo[kd_prestasi]>$dcombo[jenis_prestasi]</option> 
                                ";                                
                            }

                        }
                        ?>
                    </select><br><br>
                       <label for="tingkat_prestasi">Tingkat Prestasi</label><br>
                       <select name="tingkat_prestasi" id="tingkat_prestasi"  required>
                        <option value=""></option>
                        <option value="Juara 1 Tingkat Sekolah">Juara 1 Tingkat Sekolah</option>
                        <option value="Juara 2 Tingkat Sekolah">Juara 2 Tingkat Sekolah</option>
                        <option value="Juara 3 Tingkat Sekolah">Juara 3 Tingkat Sekolah</option>
                        
                         <option value="Juara 1 Tingkat Kabupaten">Juara 1 Tingkat Kabupaten</option>
                        <option value="Juara 2 Tingkat Kabupaten">Juara 2 Tingkat Kabupaten</option>
                        <option value="Juara 3 Tingkat Kabupaten">Juara 3 Tingkat Kabupaten</option>
                        
                         <option value="Juara 1 Tingkat Provinsi">Juara 1 Tingkat Provinsi</option>
                        <option value="Juara 2 Tingkat Provinsi">Juara 2 Tingkat Provinsi</option>
                        <option value="Juara 3 Tingkat Provinsi">Juara 3 Tingkat Provinsi</option>
                        
                         <option value="Juara 1 Tingkat Nasional">Juara 1 Tingkat Nasional</option>
                        <option value="Juara 2 Tingkat Nasional">Juara 2 Tingkat Nasional</option>
                        <option value="Juara 3 Tingkat Nasional">Juara 3 Tingkat Nasional</option>
                        
                    </select><br><br>
                  
                    
                      
           
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
            $prestasi = $_POST['prestasi'];
            $kd_prestasi = $_POST['kd_prestasi'];
            $tingkat_prestasi = $_POST['tingkat_prestasi'];
          
        $qupdate = "
          UPDATE tb_pendaftaran SET
            prestasi = '$prestasi',
            kd_prestasi = '$kd_prestasi',
            tingkat_prestasi = '$tingkat_prestasi'
            
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
              document.location='?unit=d_prestasi&act=datagrid';
              </script>";
         }
                 break;
    
        case "delete":
              $kd_pendaftaran = $_GET['kd_pendaftaran'];
        $qdelete = "
           UPDATE tb_pendaftaran SET
           prestasi = '',
           kd_prestasi = '',
           tingkat_prestasi = ''
          WHERE
            kd_pendaftaran = '$kd_pendaftaran'
        ";
        
             $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=d_prestasi&act=datagrid");
        break;
}