<?php
session_start();
require_once '../lib/koneksi.php';

$act = $_GET['act'];
switch($act){

    
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
              <li>Penilaian Wawancara</li>
							<li>Masukan Penilaian Wawancara</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Masukan Penilaian Wawancara</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
                 
                                      
                  
                      <form id="tambah_kat" name="tambah_kat" class="form-horizontal" method="post" action="?unit=i_wawancara&act=inputact" enctype="multipart/form-data" >    
                        <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="kd_pendaftaran">Pilih No Pendaftaran</label>
                      <div class="col-sm-9"> 
                      <input class="col-xs-10 col-sm-5" type="button" value="Pilih No Pendaftran" name="kd_pendaftaran" id="kd_pendaftaran" style="width: 310px; margin-left: 0px; margin-top: 0px; height: 32px; padding-top: 0px;" onclick="window.open('unit/w_no_pendaftaran.php', 'winpopup', 'toolbar=no,statusbar=no,menubar=no,left=500,top=70,resizable=no,scrollbars=yes,width=410,height=610');" />
                    </div>
                           </div>
                          <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="no_pendaftaran">No Pendaftaran</label>
                      <div class="col-sm-9">
                          <input class="col-xs-10 col-sm-5"type="text" name="no_pendaftaran" id="no_pendaftaran" required readonly="" />
                       </div></div>
                           
                      <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="nama_siswa">Nama Siswa</label>
                      <div class="col-sm-9">
                          <input class="col-xs-10 col-sm-5"type="text" name="nama_siswa" id="nama_siswa" required  readonly=""/>
                       </div></div>
                           
                     
                          <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="penilaian_1">Penilaian Pertama</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5"type="text"  maxlength="4"name="penilaian_1" id="penilaian_1" required />
                       </div>
                           </div>
                     <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="penilaian_2">Penilaian Kedua</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5"type="text"  maxlength="4" name="penilaian_2" id="penilaian_2" required />
                       </div>
                           </div>
                          
                        <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="penilaian_3">Penilaian Ketiga</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5"type="text"  maxlength="4" name="penilaian_3" id="penilaian_3" required />
                       </div>
                           </div>
                        
                          <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="penilaian_4">Penilaian Keempat</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5"type="text"  maxlength="4" name="penilaian_4" id="penilaian_4" required />
                       </div>
                           </div>
                      
                  
                   <div class="">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                         </div>
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

            <script  type="text/javascript">
 var frmvalidator = new Validator("tambah_kat");
 frmvalidator.addValidation("penilaian_1","numeric","Hanya Angka");
 frmvalidator.addValidation("penilaian_1","simbol","Hanya Angka"); 
 frmvalidator.addValidation("penilaian_1","maxlen=3","Maksimal nilai 3 digit");
 frmvalidator.addValidation("penilaian_2","numeric","Hanya Angka");
 frmvalidator.addValidation("penilaian_2","simbol","Hanya Angka");
 frmvalidator.addValidation("penilaian_2","maxlen=3","Maksimal nilai 3 digit"); 
 frmvalidator.addValidation("penilaian_3","numeric","Hanya Angka");
 frmvalidator.addValidation("penilaian_3","simbol","Hanya Angka"); 
 frmvalidator.addValidation("penilaian_3","maxlen=3","Maksimal nilai 3 digit");
 frmvalidator.addValidation("penilaian_4","numeric","Hanya Angka");
 frmvalidator.addValidation("penilaian_4","simbol","Hanya Angka"); 
 frmvalidator.addValidation("penilaian_4","maxlen=3","Maksimal nilai 3 digit");
</script>
	</body>
</html>
<?php
        break;
    
        case "inputact": 
            $no_pendaftaran = $_POST['no_pendaftaran'];
            $penilaian_1 = $_POST['penilaian_1'];
            $penilaian_2 = $_POST['penilaian_2'];
            $penilaian_3 = $_POST['penilaian_3'];
            $penilaian_4 = $_POST['penilaian_4'];
             $cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM tb_wawancara WHERE no_pendaftaran='$no_pendaftaran'"));
            if ($cek > 0 ) {
              echo "<script> alert('No Pendaftaran Tersebut Sudah Ada');
              document.location='?unit=i_wawancara&act=input';
              </script>";
            }else{
              mysqli_query($mysqli, $qinput = "
                      INSERT INTO tb_wawancara
          (no_pendaftaran,penilaian_1,penilaian_2,penilaian_3,penilaian_4)
          VALUES
          ('$no_pendaftaran','$penilaian_1','$penilaian_2','$penilaian_3','$penilaian_4')");
              echo "<script> alert('Data Tersimpan');
              document.location='?unit=i_wawancara&act=ni&no_pendaftaran=$no_pendaftaran';
              </script>";
            } 
             
        break;
         case "ni":
      $no_pendaftaran = $_GET['no_pendaftaran'];
        $qupdate = "
          UPDATE tb_pendaftaran SET
            ni = 'y' 
     
          WHERE
            no_pendaftaran = '$no_pendaftaran' 
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        header("location:?unit=i_wawancara&act=input");


        break;
 
}