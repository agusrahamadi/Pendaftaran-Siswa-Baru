<?php
session_start();
require_once 'lib/koneksi.php';

$act = $_GET['act'];
switch($act){
    case "input":
        ?>
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
                     <span style="color: #228b22;">Pendaftaran Siswa Baru</span>
                </h2>
                <br>
				<?php
$mysqli= mysqli_connect("localhost","root","","ppbd_online");
    $qberita ="SELECT * FROM menu WHERE status = 'y'";
$rberita = mysqli_query($mysqli, $qberita);
while($dberita = mysqli_fetch_assoc($rberita)){
    ?>
          <?php echo $dberita['link'] ?>
      <?php
}
?>    
                 <?php
                $qupdate = "SELECT max(no_pendaftaran) as maxKode FROM tb_pendaftaran";
                $rupdate = mysqli_query($mysqli, $qupdate);
                $dupdate = mysqli_fetch_assoc($rupdate);
                $no_pendaftaran = $dupdate['maxKode'];
                $no_urut = (int) substr($no_pendaftaran, 3, 3);
                $no_urut++;
                $char = "PD";
                $newID = $char.sprintf("%03s",$no_urut);

                    ?>
                
                <form id="tambah_kat" name="tambah_kat" method="post" action="mainapp.php?unit=pendaftaran_unit&act=inputact" enctype="multipart/form-data">
                 <h4> Masukan Data Anda</h4>
                  <div class="form-group">
                    <label for="no_pendaftaran">No Pendaftaran</label>
                    <input type="text" class="form-control" id="no_pendaftaran" value="<?php echo "$newID"; ?>" name="no_pendaftaran" readonly="">
                  </div>
                  <div class="form-group">
                    <label for="nama_siswa">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_siswa" maxlength="100"name="nama_siswa" placeholder="Nama Lengkap">
                  </div>
                  <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control" maxlength="20" id="nisn" name="nisn"placeholder="NISN">
                  </div>
                  <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                        <option value=""></option>
                        <option value="perempuan">perempuan</option>
                        <option value="laki-laki">laki-laki</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" maxlength="500" name="tempat_lahir"placeholder="Tempat Lahir">
                  </div>
                  <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" maxlength="10" name="tanggal_lahir" placeholder="yyyy-mm-dd">
                  </div>
                  <div class="form-group">
                    <label for="anak_ke">Anak Ke</label>
                    <input type="text" class="form-control" id="anak_ke" name="anak_ke" maxlength="10"placeholder="Anak Ke">
                  </div>
                  <div class="form-group">
                    <label for="jumlah_saudara">Jumlah Saudara</label>
                    <input type="text" class="form-control" id="jumlah_saudara" maxlength="10" name="jumlah_saudara" placeholder="Nama Lengkap">
                  </div>
                   <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" maxlength="50" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label for="no_tlepon">No Telpon</label>
                    <input type="text" class="form-control" id="no_telpon" name="no_telpon" maxlength="13" placeholder="No Telpon">
                  </div>
                  <div class="form-g roup">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" class="form-control" name="alamat" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="tinggal_dengan">Tinggal Dengan</label>
                    <input type="text" class="form-control" id="tinggal_dengan" maxlength="50"name="tinggal_dengan" placeholder="Tinggal Dengan">
                  </div>
                  <div class="form-group">
                    <label for="jarak_tmpt_tinggal">Jarak Tempat Tinggal</label>
                    <input type="text" class="form-control" id="jarak_tmpt_tinggal" maxlength="10"name="jarak_tmpt_tinggal" placeholder="Jarak Tempat Tinggal">
                  </div>
                  <div class="form-group">
                    <label for="asal_sekolah">Asal Sekolah</label>
                    <input type="text" class="form-control" id="asal_sekolah" maxlength="50" name="asal_sekolah" placeholder="Asal sekolah">
                  </div>
                  <div class="form-group">
                    <label for="tahun_lulus">Tahun Lulus</label>
                    <input type="text" class="form-control" id="tahun_lulus"  maxlength="4" name="tahun_lulus" placeholder="Tahun Lulus">
                  </div>
                   <hr><h4> Masukan Data Orang Tua/Wali </h4>
                  <div class="form-group">
                    <label for="nama_ortu">Nama Orang Tua</label>
                    <input type="text" class="form-control" id="nama_ortu"  maxlength="100"name="nama_ortu" placeholder="Nama Orang Tua">
                  </div>
                  <div class="form-group">
                    <label for="pendidikan_ortu">Pendidikan Orang Tua</label>
                    <input type="text" class="form-control" id="pendidikan_ortu" maxlength="50" name="pendidikan_ortu" placeholder="Pendidikan Orang Tua">
                  </div>
                  <div class="form-group">
                    <label for="pekerjaan_ortu">Pekerjaan Orang Tua</label>
                    <input type="text" class="form-control" id="pekerjaan_ortu" maxlength="50" name="pekerjaan_ortu" placeholder="Pekerjaan Orang Tua">
                  </div>
                  <div class="form-group">
                    <label for="no_telp_ortu">No Telp. Orang Tua</label>
                    <input type="text" class="form-control" id="no_telp_ortu" maxlength="13"  name="no_telp_ortu" placeholder="No Telp. Orang Tua">
                  </div>
                  <div class="form-group">
                    <label for="alamat_ortu">Alamat Orang Tua</label>
                    <textarea id="alamat_ortu" class="form-control"  name="alamat_ortu" rows="3"></textarea>
                  </div>
                  <hr> <h4> Masukan Data Prestasi </h4>
                  <div class="form-group">
                    <label for="prestasi">Nama Prestasi</label>
                    <input type="text" class="form-control" id="prestasi" maxlength="30" name="prestasi" placeholder="Nama Prestasi">
                  </div>
                  <div class="form-group">
                    <label for="kd_prestasi">Jenis Prestasi</label>
                     <select name="kd_prestasi" id="kd_prestasi"  name="kd_prestasi" class="form-control" required>
                        <option value=""></option>
                        <?php
                        $qcombo = 
                        "
                        SELECT * FROM tb_prestasi
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($dcombo = mysqli_fetch_assoc($rcombo)) {
                            echo "
                            <option value=$dcombo[kd_prestasi]>$dcombo[jenis_prestasi]</option> 
                            ";
                        }
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="tingkat_prestasi">Tingkat Prestasi</label>
                       <select name="tingkat_prestasi" id="tingkat_prestasi"  name="tingkat_prstasi" class="form-control" required>
                        <option value=""></option>
                        <option value="Juara 1 Tingkat Sekolah">Juara 1 Tingkat Sekolah</option>
                        <option value="Juara 2 Tingkat Sekolah">Juara 2 Tingkat Sekolah</option>
                        <option value="Juara 3 Tingkat Sekolah">Juara 3 Tingkat Sekolah</option>
                        
                         <option value="Juara 1 Tingkat Kabupaten">Juara 1 Tingkat Kabupaten</option>
                        <option value="Juara 2 Tingkat Kabupaten">Juara 2 Tingkat Kabupaten</option>
                        <option value="Juara 3 Tingkat Kabupaten">Juara 3 Tingkat Kabupaten</option>
                        
                         <option value="Juara 1 Tingkat Provinsi">Juara 1 Tingkat Provinsi</option>
                        <option value="Juara 2 Tingkat Provinsi">Juara 2 Tingkat Provinsi</option>
                        <option value="Juara 3 Tingkat Provinsi">Juara 3 Tingkat Provinsi</option>
                        
                         <option value="Juara 1 Tingkat Nasional">Juara 1 Tingkat Nasional</option>
                        <option value="Juara 2 Tingkat Nasional">Juara 2 Tingkat Nasional</option>
                        <option value="Juara 3 Tingkat Nasional">Juara 3 Tingkat Nasional</option>
                        
                    </select>
                  </div>
                  <hr>
                  <h4>Masukan Data Nilai Ujian </h4>
                  <div class="form-group">
                    <label for="no_ujian">No Ujian</label>
                    <input type="text" class="form-control" id="no_ujian" maxlength="20" name="no_ujian" placeholder="Nilai Bahasa Indonesia">
                  </div>
                  <div class="form-group">
                    <label for="nilai_indo">Nilai Bahasa Indonesia</label>
                    <input type="text" class="form-control" id="nilai_indo" maxlength="3" name="nilai_indo" placeholder="Nilai Bahasa Indonesia">
                  </div>
                  <div class="form-group">
                    <label for="nilai_mtk">Nilai Matematika</label>
                    <input type="text" class="form-control" id="nilai_mtk" maxlength="3" name="nilai_mtk" placeholder="Nilai Matematika">
                  </div>
                  <div class="form-group">
                    <label for="nilai_inggris">Nilai Bahasa Inggris</label>
                    <input type="text" class="form-control" id="nilai_inggris"  maxlength="3" name="nilai_inggris" placeholder="Nilai Bahasa Inggris">
                  </div><div class="form-group">
                    <label for="nilai_ipa">Nilai Ipa</label>
                    <input type="text" class="form-control" id="nilai_ipa" maxlength="3" name="nilai_ipa"  placeholder="Nilai Ipa">
                  </div>
                  <button type="submit" class="btn btn-default">Kirim</button>
                </form>
                </div><!-- col -->
            </div><!-- container -->
        </div><!-- row -->
    </div><!-- sitemap -->

<script src="css/backend/js/gen_validatorv4.js" type="text/javascript"></script>
  <script  type="text/javascript">
 var frmvalidator = new Validator("tambah_kat");
frmvalidator.addValidation("nama_siswa","req","Masukan Nama Anda");
 frmvalidator.addValidation("nama_siswa","alpha_s","Masukan Nama Anda Bukan Angka");
 frmvalidator.addValidation("nama_siswa","simbol","Masukan Nama Anda Bukan Simbol"); 
 frmvalidator.addValidation("nama_siswa","maxlen=100","Maksimal nilai 100 digit");

 frmvalidator.addValidation("nisn","req","Masukan NISN Anda");
 frmvalidator.addValidation("nisn","numeric","Masukan NISN Anda Bukan Huruf");
 
 frmvalidator.addValidation("tempat_lahir","req","Masukan Tempat Lahir Anda");
 frmvalidator.addValidation("tempat_lahir","simbol","Masukan tempat_lahir Bukan Simbol");

 frmvalidator.addValidation("tanggal_lahir","req","Masukan Tanggal Lahir Anda");
 
 frmvalidator.addValidation("anak_ke","req","Masukan Anak ke berapa Anda");
 frmvalidator.addValidation("anak_ke","numeric","Masukan Anak Ke Anda Bukan Huruf");

 
 frmvalidator.addValidation("jumlah_saudara","req","Masukan Jumlah Saudara Anda");
 frmvalidator.addValidation("jumlah_saudara","numeric","Masukan Jumlah Saudara Anda Bukan Huruf");
 
 frmvalidator.addValidation("email","req","Masukan Email Anda");
 
 frmvalidator.addValidation("no_telpon","req","Masukan No Telpon Anda");
 frmvalidator.addValidation("no_telpon","numeric","Masukan No Telpon Anda Bukan Huruf");
 frmvalidator.addValidation("no_telpon","simbol","Masukan No Telpon Anda Bukan Simbol");

 frmvalidator.addValidation("alamat","req","Masukan Alamat Anda");
 
 frmvalidator.addValidation("tinggal_dengan","req","Masukan Tinggal Dengan Siapa Anda");
 
 frmvalidator.addValidation("jarak_tmpt_tinggal","req","Masukan Jarak tempat Tinggal Dengan Sekolah Anda");
 
 frmvalidator.addValidation("asal_sekolah","req","Masukan Asal Sekolah Anda");
 
 frmvalidator.addValidation("tahun_lulus","req","Masukan Tahun Lulus  Anda");
 frmvalidator.addValidation("tahun_lulus","numeric","Masukan Tahun Lulus Anda Bukan Huruf");

 
 frmvalidator.addValidation("nama_ortu","req","Masukan Nama Orang Tua Anda");
 frmvalidator.addValidation("nama_ortu","alpha_s","Masukan Nama Anda Bukan Angka");
 frmvalidator.addValidation("nama_ortu","simbol","Masukan Nama Anda Bukan Simbol"); 
 frmvalidator.addValidation("nama_ortu","maxlen=100","Maksimal nilai 100 digit");
 
 frmvalidator.addValidation("pendidikan_ortu","req","Masukan Pendidikan terakhir Orang Tua Anda");
 
 frmvalidator.addValidation("pekerjaan_ortu","req","Masukan Pekerjaan Orang Tua Anda");
 
 frmvalidator.addValidation("no_telp_ortu","req","Masukan No Telpon Anda");
 frmvalidator.addValidation("no_telp_ortu","numeric","Masukan No Telpon Orang Tua Anda Bukan Huruf");
 frmvalidator.addValidation("no_telp_ortu","simbol","Masukan No Telpon Orang Tua Anda  Bukan Simbol");
 
 frmvalidator.addValidation("alamat_ortu","req","Masukan Alamat Orang Tua Anda");
 
 frmvalidator.addValidation("prestasi","req","Masukan Prestasi Anda");
 
 frmvalidator.addValidation("no_ujian","req","Masukan No Ujian Anda");
 frmvalidator.addValidation("no_ujian","simbol","Masukan  No Ujian Anda  Bukan Simbol");
 frmvalidator.addValidation("no_ujian","numeric","Masukan Nilai No Ujian Anda Bukan Huruf");
 
 frmvalidator.addValidation("nilai_indo","req","Masukan Nilai Indonesia Anda");
 frmvalidator.addValidation("nilai_indo","numeric","Masukan Nilai Bahasa Indonesia Anda Bukan Huruf");
 frmvalidator.addValidation("nilai_indo","simbol","Masukan Nilai Bahasa Indonesia Anda  Bukan Simbol");
 
 frmvalidator.addValidation("nilai_inggris","req","Masukan Nilai Inggris Anda");
 frmvalidator.addValidation("nilai_inggris","numeric","Masukan  Nilai Inggris Anda Bukan Huruf");
 frmvalidator.addValidation("nilai_inggris","simbol","Masukan  Nilai Inggris Anda  Bukan Simbol");
 
 frmvalidator.addValidation("nilai_mtk","req","Masukan Nilai Matematika Anda");
 frmvalidator.addValidation("nilai_mtk","numeric","Masukan  Nilai Matematika Anda Bukan Huruf");
 frmvalidator.addValidation("nilai_mtk","simbol","Masukan  Nilai Matematika Anda  Bukan Simbol");
 
 frmvalidator.addValidation("nilai_ipa","req","Masukan Nilai Ipa Anda");
 frmvalidator.addValidation("nilai_ipa","numeric","Masukan  Nilai Ipa Anda Bukan Huruf");
 frmvalidator.addValidation("nilai_ipa","simbol","Masukan  Nilai Ipa Anda  Bukan Simbol");

</script>
     <?php
        
        break;
        case "inputact":
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
            $nama_ortu = $_POST['nama_ortu'];
            $pendidikan_ortu = $_POST['pendidikan_ortu'];
            $pekerjaan_ortu = $_POST['pekerjaan_ortu'];
            $no_telp_ortu = $_POST['no_telp_ortu'];
            $alamat_ortu = $_POST['alamat_ortu'];
            $prestasi = $_POST['prestasi'];
            $kd_prestasi = $_POST['kd_prestasi'];
            $tingkat_prestasi = $_POST['tingkat_prestasi'];
             $no_ujian = $_POST['no_ujian'];
             $nilai_indo = $_POST['nilai_indo'];
            $nilai_mtk = $_POST['nilai_mtk'];
            $nilai_inggris = $_POST['nilai_inggris'];
            $nilai_ipa = $_POST['nilai_ipa'];
             
         date_default_timezone_set("Asia/Brunei");
            $date1 = new DateTime(date('Y-m-d', strtotime($tanggal_lahir)));
$date2 = new DateTime(date('Y-m-d'));
$interval = $date1->diff($date2);

       

          if ($interval->y > 18 ) {
              echo "<script> alert('Usia Anda Melebihi Batas');
              document.location='?unit=pendaftaran_unit&act=input';
              </script>";
            }else{
              mysqli_query($mysqli, $qinput = "
                      INSERT INTO tb_pendaftaran
          (no_pendaftaran, nisn ,nama_siswa,jenis_kelamin, tempat_lahir, tanggal_lahir, anak_ke, jumlah_saudara, email,
            no_telpon, alamat, tinggal_dengan, jarak_tmpt_tinggal, asal_sekolah, tahun_lulus,
            nama_ortu , pendidikan_ortu, pekerjaan_ortu, no_telp_ortu, alamat_ortu,
            no_ujian, prestasi,kd_prestasi,tingkat_prestasi,
            nilai_indo,nilai_mtk, nilai_inggris,nilai_ipa)
          VALUES
          ('$no_pendaftaran', '$nisn' ,'$nama_siswa','$jenis_kelamin', '$tempat_lahir' , '$tanggal_lahir', '$anak_ke' ,'$jumlah_saudara', '$email',
            '$no_telpon', '$alamat', '$tinggal_dengan', '$jarak_tmpt_tinggal', '$asal_sekolah', '$tahun_lulus',
            '$nama_ortu' , '$pendidikan_ortu', '$pekerjaan_ortu', '$no_telp_ortu', '$alamat_ortu',
            '$no_ujian','$prestasi','$kd_prestasi','$tingkat_prestasi',
            '$nilai_indo','$nilai_mtk', '$nilai_inggris','$nilai_ipa')");
              echo "<script> alert('Data Tersimpan  Dan Download Kartu Pendftaran');
               document.location='mainapp.php?unit=pdf&no_pendaftaran=$no_pendaftaran';
              </script>";
            } 
        break;
    
    }