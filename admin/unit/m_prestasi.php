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
                <li>Jenis Prestasi</li>
		<li>Data Jenis Prestasi</li>
            </ul><!-- /.breadcrumb -->
	</div>
        <div class="page-content">
            <div class="page-header">
                <h1>Data Jenis Prestasi
                </h1>
            </div>
            <h1>
                    <a href="?unit=m_prestasi&act=input">
                        <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</button>
                    </a>
                </h1>
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
                                        <th style="text-align: center">nama Jenis Prestasi</th>
                                        <th style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
                                    $qdatagrid =" SELECT * FROM tb_prestasi ";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
                                        echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
                                                  <td style= text-align:left  >$ddatagrid[jenis_prestasi]</td>
                                            
                                                    
                                             <td style=text-align:center>
                                                 <a href=?unit=m_prestasi&act=update&kd_prestasi=$ddatagrid[kd_prestasi] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                                 <a href=?unit=m_prestasi&act=delete&kd_prestasi=$ddatagrid[kd_prestasi] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data?\")'></a>    
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
    
        case "input":
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
              <li>Jenis Prestasi</li>
							<li>Tambah Jenis Prestasi Baru</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Tambah Jenis Prestasi Baru</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
                 
                                      
                  <div class="form-group">
                      <form method="post" action="?unit=m_prestasi&act=inputact" enctype="multipart/form-data" >    
                        
                        <label for="jenis_prestasi">Jenis Prestasi</label><br>
                    <input type="text" name="jenis_prestasi" id="jenis_prestasi" required />
                    <br><br>
                        
                
                       
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
    
        case "inputact":
            
            $jenis_prestasi = $_POST['jenis_prestasi'];
           
             $qinput = "
          INSERT INTO tb_prestasi
          (jenis_prestasi)
          VALUES
          ('$jenis_prestasi')
        ";
        $rinput = mysqli_query($mysqli,$qinput);
        if ($rinput) {
          echo "<script> alert('Data Tersimpan');
              document.location='?unit=m_prestasi&act=datagrid';
              </script>";
          exit();
         } 
         else{
          echo "gagal";
         }
        break;
    
        case "update":
        $kd_prestasi = $_GET['kd_prestasi'];
        $qupdate = "SELECT * FROM tb_prestasi WHERE kd_prestasi = '$kd_prestasi'";
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
              <li>Jenis Prestasi</li>
							<li>Edit Jenis Prestasi Baru</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Edit Jenis Prestasi Baru</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
                 
                                      
                  <div class="form-group">
                      <form method="post" action="adminmainapp.php?unit=m_prestasi&act=updateact" enctype="multipart/form-data" >    
                        <label for="kd_prestasi">Id Jenis Prestasi</label><br>
                        <input type="text" name="kd_prestasi" id="kd_prestasi" value="<?php echo $dupdate['kd_prestasi'] ?>" readonly="readonly" >
                      <br><br>
                      <label for="jenis_prestasi">Jenis Prestasi</label><br>
                       <input type="text" name="jenis_prestasi" id="jenis_prestasi" required value="<?php echo $dupdate['jenis_prestasi'] ?>"/><br><br>
                     
                    
           
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
                $kd_prestasi = $_POST['kd_prestasi'];
               
            $jenis_prestasi = $_POST['jenis_prestasi'];
            
        $qupdate = "
          UPDATE tb_prestasi SET
        
            jenis_prestasi = '$jenis_prestasi'
           
            
          WHERE
            kd_prestasi = '$kd_prestasi'
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        if ($rinput) {
          echo "gagal";
          exit();
         } 
         else{
          echo "<script> alert('Data Telah di Edit');
              document.location='?unit=m_prestasi&act=datagrid';
              </script>";
         }
                 break;
    
        case "delete":
              $kd_prestasi = $_GET['kd_prestasi'];
        $qdelete = "
          DELETE  FROM tb_prestasi
       
          WHERE
            kd_prestasi = '$kd_prestasi'
        ";

        $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=m_prestasi&act=datagrid");
        break;
}