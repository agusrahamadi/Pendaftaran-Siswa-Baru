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
							<li>Menu</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"> 
              <h1>Menu
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

                            <th style="text-align: center">No</th>
                            <th style="text-align: center">Menu</th>

                            <th style="text-align: center">Status</th>
                            <th style="text-align: center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no=1; 
                          $qdatagrid =" SELECT * FROM menu ";
                            $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                            while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
                              $st="";
                            if($ddatagrid['status']=='y')
                            {
                                    $st='<span class="label label-info">Aktif</span>';   
                            }
                            else if ($ddatagrid['status']=='n')
                            {
                                    $st= '<span class="label label-danger">Tidak Aktif</span>';
                            }
                            else if($ddatagrid['status']=='')
                            {
                                    $st='<span class="label label-warning">Cadangan</span>';
                            }
                            
                                echo "
                                <tr>
                                     <td style= text-align:center >$no</td>
                                     <td style= text-align:left  >Pendftaran</td>
                                     <td style= text-align:center  >$st</td>
                                     <td style=text-align:center>
                                         <a href=?unit=f_menu&act=aktif class='btn btn-sm btn-info glyphicon glyphicon-ok' onclick='return confirm(\"Menu DiTampilkan?\")'></a> 
                                         <a href=?unit=f_menu&act=tidak_aktif class='btn btn-sm btn-danger glyphicon glyphicon-off' onclick='return confirm(\"Menu Dihilangkan?\")'></a>    
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
    case "aktif":
               
        $qupdate = "
          UPDATE menu SET
            status = 'y' 
     
         
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        header("location:?unit=f_menu&act=datagrid");


        break;    
    case "tidak_aktif":
     
        $qupdate = "
          UPDATE menu SET
            status = 'n' 
     
         
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        header("location:?unit=f_menu&act=datagrid");


        break;  
       
    
            
    
       
}