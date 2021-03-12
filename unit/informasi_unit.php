<nav class="aboutnav navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <ul class="nav navbar-nav"href="index.html" >
                
                <a class="navbar-brand" href="index.html" />MADRASAH ALIYAH NEGERI 2 HULU SUNGAI TENGAH</a>
            </ul>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
          <li><a href="mainapp.php?unit=home_unit">Beranda</a></li>
            <li><a href="mainapp.php?unit=artikel_unit">Artikel</a></li>
             <?php
$mysqli= mysqli_connect("localhost","u8110790_db_pendaftaran","metalbest149","u8110790_db_pendaftaran");
    $qberita ="SELECT * FROM menu WHERE status = 'y'";
$rberita = mysqli_query($mysqli, $qberita);
while($dberita = mysqli_fetch_assoc($rberita)){
    ?>
          <?php echo $dberita['link'] ?>
      <?php
}
?>    
            <li><a href="mainapp.php?unit=informasi_unit">Informasi</a></li>
            <li><a href="admin/index.php">Login</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-->
    </nav>
<div class="aboutus container-fluid">
        <div class="row">
            <div class="container">
                <div class="col-xs-12 col-sm-12 col-md-12">
                <h2>
                     <span style="color: #228b22;">Informasi Kelulusan Siswa Baru</span>
                </h2>
                <br>
                <div class="box box-primary">

                            <div class="box-body table-responsive padding">
                           
                 
                            <table id="datatable" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No.</th>
                                        <th style="text-align: center">No Pendaftaran</th>
                                        <th style="text-align: center">Nama Siswa</th>
                                        <th style="text-align: center">Asal Sekolah</th>
                                        <th style="text-align: center">Satatus Seleksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
                                    $qdatagrid =" SELECT * FROM tb_pendaftaran ORDER BY no_pendaftaran ASC ";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
                                        $st="";
                            if($ddatagrid['status_seleksi']=='z')
                            {
                                    $st='Lulus';       
                            }
                            else if ($ddatagrid['status_seleksi']=='w')
                            {
                                    $st= 'Tidak Lulus';
                            }
                            else if($ddatagrid['status_seleksi']=='t')
                            {
                                    $st='Cadangan';
                            }
                            else if($ddatagrid['status_seleksi']=='a')
                            {
                                    $st='Menunggu';
                            }
                                        echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
                                             <td style= text-align:left  >$ddatagrid[no_pendaftaran]</td>
                                                 <td style= text-align:left  >$ddatagrid[nama_siswa]</td>
                                                 <td style= text-align:left  >$ddatagrid[asal_sekolah]</td>
                                                  <td style= text-align:center >$st</td>
                                                    
                                             
                                        </tr>
                                        ";
                                        $no++;
                                     }
                                     ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                
               
                </div><!-- col -->
            </div><!-- container -->
        </div><!-- row -->
    </div><!-- sitemap -->
