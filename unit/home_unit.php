    <nav class="homenav navbar navbar-default">
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
    <div id="owl-demo" class="owl-carousel owl-theme">
     	<div class="item">
     		<div class="content">
     			<h1 class="text-center">MADRASAH ALIYAH NEGERI 2 HULU SUNGAI TENGAH</h1>
     			<p class="text-center">
     				
     			</p>
     			
     		</div><!-- content -->
			<img src="img/3.jpg">
		</div><!-- item -->
		<div class="item">
     		<div class="content">
     			<h1 class="text-center">MADRASAH ALIYAH NEGERI 2 HULU SUNGAI TENGAH</h1>
     			<p class="text-center">
     				
     			</p>
     			
     		</div><!-- content -->
			<img src="img/2.jpg">
		</div><!-- item -->
		<div class="item">
     		<div class="content">
     			<h1 class="text-center">MADRASAH ALIYAH NEGERI 2 HULU SUNGAI TENGAH</h1>
     			<p class="text-center">
     				 
     			</p>
     			
     		</div><!-- content -->
			<img src="img/1.jpg">
		</div><!-- item -->
    </div>

