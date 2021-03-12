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
              <li>Panitia</li>
							<li>Data Pengguna</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"> 
              <h1>Data Pengguna
              </h1>
            </div>
                <h1>
                <a href="?unit=f_login&act=input">
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
                             <th style="text-align: center">UserID</th>
                            <th style="text-align: center">Username</th>
                            <th style="text-align: center">Password</th>
                            <th style="text-align: center">Is Level</th>
                            <th style="text-align: center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no=1; 
                          $qdatagrid =" SELECT * FROM tb_login ";
                            $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                            while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
                                echo "
                                <tr>
                                     <td style= text-align:center >$no</td>
                                     <td style= text-align:left  >$ddatagrid[userid]</td>
                                     <td style= text-align:left  >$ddatagrid[username]</td>
                                        <td style= text-align:center>$ddatagrid[password]</td>
                                      <td style= text-align:center>$ddatagrid[islevel]</td>
                                     <td style=text-align:center>
                                         <a href=?unit=f_login&act=update&userid=$ddatagrid[userid] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                         <a href=?unit=f_login&act=delete&userid=$ddatagrid[userid] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data?\")'></a>    
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
              <li>Panitia</li>
							<li>Tambah Pengguna</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Tambah Pengguna</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
<form method="post" action="?unit=f_login&act=inputact" enctype="multipart/form-data" >
                  
                  <div class="form-group">
                      <label for="username">Username</label><br>
                    <input type="text" name="username" id="nama" required />
                    <br><br>
                      
                                                            
                   <label for="password">Password</label><br>
                      <input  type="text" name="password" id="password" required />
                    <br><br>
                    
                    
               
                                                            
                  <label for="islevel">Level</label><br>
                    <select name="islevel" id="islevel" required>
                        <option value=""></option>
                        <option value="admin">Admin</option>
                        <option value="panita">Panitia</option>
                    </select><br><br>
                    
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
	</body>
</html>
<?php
        break;
    
        case "inputact":
          $username = $_POST['username'];
        $password = md5($_POST['password']);
        $islevel = $_POST['islevel'];
        $qinput = "
          INSERT INTO tb_login
          (
            username,
            password,
            islevel
          )
          VALUES
          (
            '$username',
            '$password',
            '$islevel'
          )
        ";
        $rinput = mysqli_query($mysqli,$qinput);
        header("location:?unit=f_login&act=datagrid");
        break;    
    
        case "update":
            $userid = $_GET['userid'];
        $qupdate = "SELECT * FROM  tb_login WHERE userid = '$userid'";
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
              <li>Panitia</li>
							<li>Edit Pengguna</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Edit Pengguna</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
<form method="post" action="?unit=f_login&act=updateact" enctype="multipart/form-data" >
                  
                  <div class="form-group">
                      <label for="userid">User ID</label><br>
                    <input type="text" name="userid" id="userid" required  value="<?php echo $dupdate['userid'] ?>" readonly="readonly"/>
                    <br><br>
                    
                      <label for="username">Username</label><br>
                    <input type="text" name="username" id="nama" required="required" autofocus="autofocus" value="<?php echo $dupdate['username']; ?>"  />
                    <br><br>
                      
                                                            
                   <label for="password">Password</label><br>
                      <input  type="text" name="password" id="password" required="required" value="<?php echo $dupdate['password']; ?>" />
                    <br><br>
                    
                    
               
                                                            
                  <label for="islevel">Level</label><br>
                    <select name="islevel" id="islevel" required>
                        <?php
                        if($dupdate['islevel'] == "admin") {
                            ?>
                            <option value="admin" selected="selected">Admin</option>
                            <option value="panita">Panitia</option>                            
                            <?php
                        }
                        else {
                            ?>
                            <option value="admin">Admin</option>
                            <option value="panita" selected="selected">Panitia</option>                            
                            <?php     
                            
                        }
                        ?>
                    </select><br><br>
                    
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
	</body>
</html>
    
       <?php
        break;
    
            case "updateact":
         $userid = $_POST['userid'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        //echo $password . '<br />';
      
        $islevel = $_POST['islevel'];
        
        $qupdate = "";
        if($password == "") {
            $qupdate = "
              UPDATE tb_login SET
                username = '$username',
                 
                islevel = '$islevel'        
              WHERE
                userid = '$userid'
            ";            
        }
        else {
            $password = md5($password);
            $qupdate = "
              UPDATE tb_login SET
                username = '$username',
                password = '$password',    
                
                islevel = '$islevel'        
              WHERE
                userid = '$userid'
            ";                        
        }

        $rupdate = mysqli_query($mysqli,$qupdate);
        if ($rinput) {
          echo "gagal";
          exit();
         } 
         else{
          echo "<script> alert('Data Telah di Edit');
              document.location='?unit=f_login&act=datagrid';
              </script>";
         }     
        break;  
    
        case "delete":
        $userid = $_GET['userid'];
        $qdelete = "
          DELETE  FROM tb_login 
       
          WHERE
            userid = '$userid'
        ";
        $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=f_login&act=datagrid");
            break;
}