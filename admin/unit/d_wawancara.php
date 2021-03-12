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
                <li>Data Nilai Wawancara</li>
		<li>Data Nilai Wawancara</li>
            </ul><!-- /.breadcrumb -->
	</div>
        <div class="page-content">
            <div class="page-header">
                <h1>Data Nilai Wawancara
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
                                        <th style="text-align: center">Penilaian 1</th>
                                        <th style="text-align: center">Penilaian 2</th>
                                        <th style="text-align: center">Penilaian 3</th>
                                        <th style="text-align: center">Penilaian 4</th>
                                        <th style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
                                    $qdatagrid =" SELECT 
                            tb_wawancara.kd_wawancara, tb_wawancara.penilaian_1, tb_wawancara.penilaian_2, tb_wawancara.penilaian_3,
                            tb_wawancara.penilaian_4, tb_wawancara.no_pendaftaran, tb_pendaftaran.kd_pendaftaran,  tb_pendaftaran.nama_siswa, tb_pendaftaran.no_pendaftaran
                            FROM 
                                tb_wawancara
                                    JOIN  tb_pendaftaran ON tb_wawancara.no_pendaftaran =  tb_pendaftaran.no_pendaftaran";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
                                        echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
                                             <td style= text-align:left  >$ddatagrid[no_pendaftaran]</td>
                                                 <td style= text-align:left  >$ddatagrid[nama_siswa]</td>
                                                  <td style= text-align:left  >$ddatagrid[penilaian_1]</td>
                                             <td style= text-align:left  >$ddatagrid[penilaian_2]</td>
                                             <td style= text-align:left  >$ddatagrid[penilaian_3]</td>
                                            <td style= text-align:left  >$ddatagrid[penilaian_4]</td>
                                                    
                                             <td style=text-align:center>
                                                 <a href=?unit=d_wawancara&act=update&kd_wawancara=$ddatagrid[kd_wawancara] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                                 <a href=?unit=d_wawancara&act=delete&kd_wawancara=$ddatagrid[kd_wawancara]&no_pendaftaran=$ddatagrid[no_pendaftaran] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data ortu?\")'></a>    
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
        $kd_wawancara = $_GET['kd_wawancara'];
        $qupdate = "SELECT * FROM tb_wawancara
                                    WHERE tb_wawancara.kd_wawancara = '$kd_wawancara'";
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
              <li>Data Nilai Wawancara</li>
							<li>Edit Data Nilai Wawancara </li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Edit Data Nilai Wawancara </h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
                 
                                      
                  <div class="form-group">
                      <form method="post" action="adminmainapp.php?unit=d_wawancara&act=updateact" enctype="multipart/form-data" >    
                        
                      <label for="no_pendaftaran">No Pendaftaran</label><br>
                        <input type="text" name="no_pendaftaran" id="kd_pendaftaran" value="<?php echo $dupdate['no_pendaftaran'] ?>" readonly="readonly" >
                      <br><br>
                      
                      <label for="penilaian_1">Penilaian 1</label><br>
                       <input type="text" name="penilaian_1" id="penilaian_1" required value="<?php echo $dupdate['penilaian_1'] ?>"/><br><br>
                   <label for="penilaian_2">Penilaian 2</label><br>
                       <input type="text" name="penilaian_2" id="penilaian_2" required value="<?php echo $dupdate['penilaian_2'] ?>"/><br><br>
                   <label for="penilaian_3">Penilaian 3</label><br>
                       <input type="text" name="penilaian_3" id="penilaian_3" required value="<?php echo $dupdate['penilaian_3'] ?>"/><br><br>
                   <label for="penilaian_4">Penilaian 4</label><br>
                       <input type="text" name="penilaian_4" id="penilaian_4" required value="<?php echo $dupdate['penilaian_4'] ?>"/><br><br>
                   
                  
                      
           
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
            $penilaian_1 = $_POST['penilaian_1'];
            $penilaian_2 = $_POST['penilaian_2'];
            $penilaian_3 = $_POST['penilaian_3'];
            $penilaian_4 = $_POST['penilaian_4'];
           
          
        $qupdate = "
          UPDATE tb_wawancara SET
            penilaian_1 = '$penilaian_1',
            penilaian_2 = '$penilaian_2',
            penilaian_3 = '$penilaian_3',
            penilaian_4 = '$penilaian_4'
            
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
              document.location='?unit=d_wawancara&act=datagrid';
              </script>";
         }
                 break;
    
        case "delete":
             $kd_wawancara = $_GET['kd_wawancara'];
             $no_pendaftaran = $_GET['no_pendaftaran'];
        $qdelete = "
          DELETE  FROM tb_wawancara
       
          WHERE
            kd_wawancara= '$kd_wawancara'
        ";
        
             $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=d_wawancara&act=ni&no_pendaftaran=$no_pendaftaran");
        break;
        case "ni":
      $no_pendaftaran = $_GET['no_pendaftaran'];
        $qupdate = "
          UPDATE tb_pendaftaran SET
            ni = 'n' 
     
          WHERE
            no_pendaftaran = '$no_pendaftaran' 
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        header("location:?unit=d_wawancara&act=datagrid");


        break;
}