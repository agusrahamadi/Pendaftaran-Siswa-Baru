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
   
	
<div class="container-fluid">
    	<div class="row">
    		<div class="container">
            

    			<div class="header-title col-md-12">
<h2>
                     <span style="color: #228b22;">Artikel</span>
                </h2>
                <br>
                <?php
$mysqli= mysqli_connect("localhost","u8110790_db_pendaftaran","metalbest149","u8110790_db_pendaftaran");
    $qberita ="SELECT * FROM tb_artikel ORDER BY tanggal DESC";
$rberita = mysqli_query($mysqli, $qberita);
while($dberita = mysqli_fetch_assoc($rberita)){
    ?>
    				<h3><span style="color: #333;"><?php echo $dberita['judul'] ?></span></h3>
    				<h6>diposting pada:
		            <time datetime="<?php echo $dberita['tanggal'] ?>">
		                <?php echo $dberita['tanggal'] ?>
		            </time></h6>
    				<p>
			    		 <?php
			           
			           $kalimat = strtok($dberita['isi']," ");
			           for($i=1; $i<=70; $i++) {
			               echo $kalimat;
			               echo " ";
			               $kalimat = strtok(" ");
			           }

           ?>
    				<a href="?unit=detail_unit&kd_artikel=<?php echo $dberita['kd_artikel'] ?>" class="button">Selengkapnnya</a>
    				</p>
<?php
}
?>
    		</div><!-- container -->
             
    	</div><!-- row -->
    </div><!-- whatwedo -->
 
