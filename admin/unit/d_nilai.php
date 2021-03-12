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
                <li>Data Nilai Siswa</li>
		<li>Data Nilai Siswa</li>
            </ul><!-- /.breadcrumb -->
	</div>
        <div class="page-content">
            <div class="page-header">
                <h1>Data Nilai Siswa
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
                                        <th style="text-align: center">Nilai Indonesia</th>
                                        <th style="text-align: center">Nilai Inggris</th>
                                        <th style="text-align: center">Nilai Matematika</th>
                                        <th style="text-align: center">Nilai Ipa</th>
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
                                                  <td style= text-align:left  >$ddatagrid[nilai_indo]</td>
                                             <td style= text-align:left  >$ddatagrid[nilai_inggris]</td>
                                             <td style= text-align:left  >$ddatagrid[nilai_mtk]</td>
                                            <td style= text-align:left  >$ddatagrid[nilai_ipa]</td>
                                                    
                                             <td style=text-align:center>
                                                 <a href=?unit=d_nilai&act=update&kd_pendaftaran=$ddatagrid[kd_pendaftaran] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                                 <a href=?unit=d_nilai&act=delete&kd_pendaftaran=$ddatagrid[kd_pendaftaran] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data ortu?\")'></a>    
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
              <li>Data Nilai Siswa</li>
							<li>Edit Data Nilai Siswa </li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Edit Data Nilai Siswa </h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
                 
                                      
                  <div class="form-group">
                      <form method="post" action="adminmainapp.php?unit=d_nilai&act=updateact" enctype="multipart/form-data" >    
                        
                      <label for="no_pendaftaran">No Pendaftaran</label><br>
                        <input type="text" name="no_pendaftaran" id="kd_pendaftaran" value="<?php echo $dupdate['no_pendaftaran'] ?>" readonly="readonly" >
                      <br><br>
                      <label for="nama_siswa">Nama Siswa</label><br>
                        <input type="text" name="nama_siswa" id="nama_siswa" value="<?php echo $dupdate['nama_siswa'] ?>" readonly="readonly" >
                      <br><br>
                     
                      <label for="nilai_indo">Nilai Bahasa Indonesia</label><br>
                       <input type="text" name="nilai_indo" id="nilai_indo" required value="<?php echo $dupdate['nilai_indo'] ?>"/><br><br>
                   <label for="nilai_mtk">Nilai Matematika</label><br>
                       <input type="text" name="nilai_mtk" id="nilai_mtk" required value="<?php echo $dupdate['nilai_mtk'] ?>"/><br><br>
                   <label for="nilai_inggris">Nilai Bahasa Inggris</label><br>
                       <input type="text" name="nilai_inggris" id="nilai_inggris" required value="<?php echo $dupdate['nilai_inggris'] ?>"/><br><br>
                   <label for="nilai_ipa">Nilai IPA</label><br>
                       <input type="text" name="nilai_ipa" id="nilai_ipa" required value="<?php echo $dupdate['nilai_ipa'] ?>"/><br><br>
                   
                  
                      
           
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
            $nilai_indo = $_POST['nilai_indo'];
            $nilai_mtk = $_POST['nilai_mtk'];
            $nilai_inggris = $_POST['nilai_inggris'];
            $nilai_ipa = $_POST['nilai_ipa'];
          
        $qupdate = "
          UPDATE tb_pendaftaran SET
            nilai_indo = '$nilai_indo',
            nilai_mtk = '$nilai_mtk',
            nilai_inggris = '$nilai_inggris',
            nilai_ipa = '$nilai_ipa'
            
          WHERE
            no_pendaftaran = '$no_pendaftaran'
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);

        if ($rinput) {
          echo "gagal";
          exit();
         } 
         else{
          echo "<script> alert('Data Telah Di edit');
              document.location='?unit=d_nilai&act=datagrid';
              </script>";
         }
            
                 break;
    
        case "delete":
              $kd_pendaftaran = $_GET['kd_pendaftaran'];
        $qdelete = "
           UPDATE tb_pendaftaran SET
           nilai_indo = '',
           nilai_mtk = '',
           nilai_inggris = '',
           nilai_ipa = ''
          WHERE
            kd_pendaftaran = '$kd_pendaftaran'
        ";
        
             $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=d_nilai&act=datagrid");
        break;
}