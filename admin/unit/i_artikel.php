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
								<a href="adminmainapp.php?unit=dashboard">Dashboard</a>
							</li>
              <li>Artikel</li>
							<li>Data Artikel</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"> 
              <h1>Data Artikel </h1>
            </div>
                 <h1>
                <a href="?unit=i_artikel&act=input">
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
                            <th style="text-align: center">No</th>
                            <th style="text-align: center">Judul</th>
                            <th style="text-align: center">Tanggal</th>
                            <th style="text-align: center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no=1; 
                          $qdatagrid =" SELECT * FROM tb_artikel ";
                            $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                            while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
                                echo "
                                <tr>
                                     <td style= text-align:center >$no</td>
                                     <td style= text-align:left  >$ddatagrid[judul]</td>
                                     <td style= text-align:left  >$ddatagrid[tanggal]</td>
                                     <td style=text-align:center>
                                         <a href=?unit=i_artikel&act=update&kd_artikel=$ddatagrid[kd_artikel] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                         <a href=?unit=i_artikel&act=delete&kd_artikel=$ddatagrid[kd_artikel] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data?\")'></a>    
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
								<a href="#">Dashboard</a>
							</li>
              <li>Slider</li>
							<li>Tambah Slider Baru</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Tambah Slider Baru</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
<form method="post" action="?unit=i_artikel&act=inputact" enctype="multipart/form-data" >
                  
                  <div class="form-group">
                      <label for="judul">Judul</label><br>
                    <input type="text" name="judul" id="judul" required />
                    <br><br>
                      
             
                      
                   <label for="isi">Diskipsi</label><br>						
                    <textarea name="isi" id="isi" cols="50" rows="5"> </textarea>	<br><br>
                                                            
               
               
                                                        
                    
                    
                  <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                  <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                   </div>                                                        
                 </form>

             

                   
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
                
			</div><!-- /.main-content -->
		<?php
            include("../admin/footer.php");
            ?>
  <script type="text/javascript">
  tinymce.init({
        selector: "textarea",

        // ===========================================
        // INCLUDE THE PLUGIN
        // ===========================================

        plugins: [
          "advlist autolink lists link image charmap print preview anchor",
          "searchreplace visualblocks code fullscreen",
          "insertdatetime media table contextmenu paste jbimages"
        ],

        // ===========================================
        // PUT PLUGIN'S BUTTON on the toolbar
        // ===========================================

        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",

        // ===========================================
        // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
        // ===========================================

        relative_urls: false,
        remove_script_host : false,
        convert_urls : true,

      });
</script>
	</body>
</html>
<?php
        break;
    
        case "inputact":
          $judul = $_POST['judul'];							
            $isi = $_POST['isi'];
          	
         $seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
            $hari = date("w"); // 6
            $hariini = $seminggu[$hari];
            
            $tanggalsekarang = date("Y-m-d");		
            $jamsekarang = date("H:i:s");
            
            $qinput = 
        "
        INSERT INTO tb_artikel
        (
        judul,
         tanggal,
        isi
        )
        VALUES
        (        
        '$judul',
            '$tanggalsekarang',
        '$isi'
        )
        ";
        $rinput = mysqli_query($mysqli,$qinput);
        
        if ($rinput) {
          echo "<script> alert('Data Tersimpan');
              document.location='?unit=i_artikel&act=datagrid';
              </script>";
          exit();
         } 
         else{
          echo "gagal";
         }
            
            break;
    
        case "update":
            $kd_artikel = $_GET['kd_artikel'];
        $qupdate = "SELECT * FROM  tb_artikel WHERE kd_artikel = '$kd_artikel'";
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
								<a href="#">Dashboard</a>
							</li>
              <li>Slider</li>
							<li>Edit Slider Baru</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Edit Slider Baru</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
<form method="post" action="?unit=i_artikel&act=updateact" enctype="multipart/form-data" >
                  
                  <div class="form-group">
                      <label for = "kd_artikel">Kode Artikel</label><br>
                    <input type="text" name="kd_artikel" id="kd_artikel" value="<?php echo $dupdate['kd_artikel'] ?>" readonly="readonly" /> 
                    <br><br>
                    
                      <label for="judul">Judul</label><br>
                    <input type="text" name="judul" id="nama" required value="<?php echo $dupdate['judul'] ?>"/>
                    <br><br>
                      
             
                      
                   <label for="isi">Diskipsi</label><br>						
                    <textarea name="isi" id="isi" cols="50" rows="5"><?php echo $dupdate['isi'] ?> </textarea>	<br><br>
                  
                    
                  <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                  <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                   </div>                                                        
                 </form>

             

                   
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
                
			</div><!-- /.main-content -->
		<?php
            include("../admin/footer.php");
            ?>
<script type="text/javascript">
  tinymce.init({
        selector: "textarea",

        // ===========================================
        // INCLUDE THE PLUGIN
        // ===========================================

        plugins: [
          "advlist autolink lists link image charmap print preview anchor",
          "searchreplace visualblocks code fullscreen",
          "insertdatetime media table contextmenu paste jbimages"
        ],

        // ===========================================
        // PUT PLUGIN'S BUTTON on the toolbar
        // ===========================================

        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",

        // ===========================================
        // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
        // ===========================================

        relative_urls: false,
        remove_script_host : false,
        convert_urls : true,

      });
</script>
	</body>
</html>
    
       <?php
        break;
    
            case "updateact":
            $kd_artikel = $_POST['kd_artikel'];						
        $judul = $_POST['judul'];	
        $isi = $_POST['isi'];
                $qupdate = 
                "
                UPDATE tb_artikel SET
                judul = '$judul',
                isi = '$isi'
                 WHERE
                kd_artikel = '$kd_artikel'
                ";			
       		
        
       
        $rupdate = mysqli_query($mysqli,$qupdate);
       if ($rinput) {
          echo "gagal";
          exit();
         } 
         else{
          echo "<script> alert('Data Telah di Edit');
              document.location='?unit=i_artikel&act=datagrid';
              </script>";
         }

                 break;
    
        case "delete":
        $kd_artikel = $_GET['kd_artikel'];
        $qdelete = "
          DELETE  FROM tb_artikel 
       
          WHERE
            kd_artikel = '$kd_artikel'
        ";
        $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=i_artikel&act=datagrid");
            break;
}