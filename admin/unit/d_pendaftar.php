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
                <li>Data Calon Siswa</li>
		<li>Data Calon Siswa</li>
            </ul><!-- /.breadcrumb -->
	</div>
        <div class="page-content">
            <div class="page-header">
                <h1>Data Calon Siswa
                </h1>
            </div>
          <h1>
                    <a href="adminmainapp.php?unit=pdf">
                        <button class="btn btn-sm"><i class="fa fa-print"></i> Cetak</button>
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
                                        <th style="text-align: center">No Pendaftaran</th>
                                        <th style="text-align: center">NISN</th>
                                        <th style="text-align: center">Nama Siswa</th>
                                        <th style="text-align: center">Jenis Kelamin</th>
                                        <th style="text-align: center">Tempat Lahir</th>
                                        <th style="text-align: center">Tanggal Lahir</th>
                                        <th style="text-align: center">Anak Ke</th>
                                        <th style="text-align: center">Jumlah Saudara</th>
                                        <th style="text-align: center">Email</th>
                                        <th style="text-align: center">No Telpon</th>
                                        <th style="text-align: center">Alamat</th>
                                        <th style="text-align: center">tinggal Dengan</th>
                                        <th style="text-align: center">Jarak Tempat Tinggal</th>
                                        <th style="text-align: center">Asal Sekolah</th>
                                        <th style="text-align: center">Tahun Lulus</th>
                                        <th style="text-align: center">Status</th>
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
                                             <td style= text-align:center  >$ddatagrid[no_pendaftaran]</td>
                                             <td style= text-align:center  >$ddatagrid[nisn]</td>
                                            <td style= text-align:left  >$ddatagrid[nama_siswa]</td>
                                            <td style= text-align:left  >$ddatagrid[jenis_kelamin]</td>
                                             <td style= text-align:left  >$ddatagrid[tempat_lahir]</td>
                                             <td style= text-align:left  >$ddatagrid[tanggal_lahir]</td>
                                            <td style= text-align:center  >$ddatagrid[anak_ke]</td>
                                            <td style= text-align:center  >$ddatagrid[jumlah_saudara]</td>
                                            <td style= text-align:left  >$ddatagrid[email]</td>
                                            <td style= text-align:left  >$ddatagrid[no_telpon]</td>
                                            <td style= text-align:left  >$ddatagrid[alamat]</td>
                                            <td style= text-align:left  >$ddatagrid[tinggal_dengan]</td>
                                            <td style= text-align:left  >$ddatagrid[jarak_tmpt_tinggal]</td>
                                            <td style= text-align:left  >$ddatagrid[asal_sekolah]</td>
                                            <td style= text-align:left  >$ddatagrid[tahun_lulus]</td>
                                            <td style= text-align:left  >$st</td>
                                             <td style=text-align:center>
                                                 <a href=?unit=d_pendaftar&act=update&kd_pendaftaran=$ddatagrid[kd_pendaftaran] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                                 <a href=?unit=d_pendaftar&act=delete&kd_pendaftaran=$ddatagrid[kd_pendaftaran] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data Siswa?\")'></a>    
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
              <li>Data Calon Siswa</li>
							<li>Edit Data Calon Siswa </li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Edit Data Calon Siswa </h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
                 
                                      
                  <div class="form-group">
                      <form method="post" action="adminmainapp.php?unit=d_pendaftar&act=updateact" enctype="multipart/form-data" >    
                        
                      <label for="no_pendaftaran">No Pendaftaran</label><br>
                        <input type="text" name="no_pendaftaran" id="kd_pendaftaran" value="<?php echo $dupdate['no_pendaftaran'] ?>" readonly="readonly" >
                      <br><br>
                       <label for=nisn">NISN</label><br>
                        <input type="text" name="nisn" id="nisn" value="<?php echo $dupdate['nisn'] ?>" ">
                      <br><br>
                      <label for="nama_siswa">Nama Siswa</label><br>
                        <input type="text" name="nama_siswa" id="nama_siswa" value="<?php echo $dupdate['nama_siswa'] ?>"  >
                      <br><br>
                    
                   
                    <label for="jenis_kelamin">jenis kelamin</label><br>
                    <select name="jenis_kelamin" id="jenis_kelamin" required>
                        <?php
                        if($dupdate['jenis_kelamin'] == "perempuan") {
                            ?>
                            <option value="perempuan" selected="perempuan">perempuan</option>
                            <option value="laki-laki">laki-laki</option>                            
                            <?php
                        }
                        else {
                            ?>
                            <option value="perempuan">perempuan</option>
                            <option value="laki-laki" selected="laki-laki">laki-laki</option>                            
                            <?php                            
                        }
                        ?>
                    </select><br><br>
                    <label for="tempat_lahir">Tempat Lahir</label><br>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" value="<?php echo $dupdate['tempat_lahir'] ?>"  >
                      <br><br>
                      
                      <label for="tanggal_lahir">Tanggal Lahir</label><br>
                        <input type="text" name="tanggal_lahir" id="tempat_lahir" value="<?php echo $dupdate['tanggal_lahir'] ?>"  >
                      <br><br>
                      
                    <label for="anak_ke">Anak ke</label><br>
                        <input type="text" name="anak_ke" id="anak_ke" value="<?php echo $dupdate['anak_ke'] ?>"  >
                      <br><br>
                      <label for="jumlah_saudara">Jumlah Saudara</label><br>
                        <input type="text" name="jumlah_saudara" id="jumlah_saudara" value="<?php echo $dupdate['jumlah_saudara'] ?>"  >
                      <br><br>
                      <label for="email">Email</label><br>
                        <input type="text" name="email" id="email" value="<?php echo $dupdate['email'] ?>"  >
                      <br><br>
                      <label for="no_telpon">No Telepon</label><br>
                        <input type="text" name="no_telpon" id="no_telpon" value="<?php echo $dupdate['no_telpon'] ?>"  >
                      <br><br>
                       <label for="alamat">Alamat</label><br>
                       <textarea type="text" name="alamat" id="alamat"   ><?php echo $dupdate['alamat'] ?></textarea>
                      <br><br>
                       <label for="tinggal_dengan">Tinggal Dengan</label><br>
                        <input type="text" name="tinggal_dengan" id="tinggal_dengan" value="<?php echo $dupdate['tinggal_dengan'] ?>"  >
                      <br><br>
                      <label for="jarak_tmpt_tinggal">Jarak Tempat Tinggal</label><br>
                        <input type="text" name="jarak_tmpt_tinggal" id="jarak_tmpt_tinggal" value="<?php echo $dupdate['jarak_tmpt_tinggal'] ?>"  >
                      <br><br>
                      <label for="asal_sekolah">Asal Sekolah</label><br>
                        <input type="text" name="asal_sekolah" id="asal_sekolah" value="<?php echo $dupdate['asal_sekolah'] ?>"  >
                      <br><br>
                      <label for="tahun_lulus">Tahun Lulus</label><br>
                        <input type="text" name="tahun_lulus" id="tahun_lulus" value="<?php echo $dupdate['tahun_lulus'] ?>"  >
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
    
            case "updateact":
                $no_pendaftaran = $_POST['no_pendaftaran'];
                $nisn = $_POST['nisn'];
                $nama_siswa = $_POST['nama_siswa'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $tempat_lahir = $_POST['tempat_lahir'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $anak_ke = $_POST['anak_ke'];
            $jumlah_saudara = $_POST['jumlah_saudara'];
            $email = $_POST['email'];
            $no_telpon = $_POST['no_telpon'];
            $alamat = $_POST['alamat'];
            $tinggal_dengan = $_POST['tinggal_dengan'];
            $jarak_tmpt_tinggal = $_POST['jarak_tmpt_tinggal'];
            $asal_sekolah = $_POST['asal_sekolah'];
            $tahun_lulus = $_POST['tahun_lulus'];
          
        $qupdate = "
          UPDATE tb_pendaftaran SET
             nisn = '$nisn',
                nama_siswa = '$nama_siswa',
            jenis_kelamin = '$jenis_kelamin',
            tempat_lahir = '$tempat_lahir',
            tanggal_lahir = '$tanggal_lahir',
            anak_ke = '$anak_ke',
            jumlah_saudara = '$jumlah_saudara',
            email = '$email',
            no_telpon = '$no_telpon',
            alamat = '$alamat',
            tinggal_dengan = '$tinggal_dengan',
            jarak_tmpt_tinggal = '$jarak_tmpt_tinggal',
            asal_sekolah = '$asal_sekolah',
            tahun_lulus = '$tahun_lulus'
           
            
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
              document.location='?unit=d_pendaftar&act=datagrid';
              </script>";
         }
                 break;
    
        case "delete":
              $kd_pendaftaran = $_GET['kd_pendaftaran'];
        
        $qdelete = "
          DELETE  FROM tb_pendaftaran
       
          WHERE
            kd_pendaftaran = '$kd_pendaftaran'
        ";
        
             $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=d_pendaftar&act=datagrid");
        break;
}