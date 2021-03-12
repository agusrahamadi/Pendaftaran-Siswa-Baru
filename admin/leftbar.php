
      <?php
                                if ($_SESSION['islevel'] == "admin"){
                                    ?>
      <body class="no-skin">
        <?php
        require_once '../lib/koneksi.php';
        ?>
        <div id="navbar" class="navbar navbar-default ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container">
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>
                </button>

            <div class="navbar-header pull-left">
                <a href="adminmainapp.php?unit=beranda" class="navbar-brand"><small><i ></i>Halaman Admin</small></a>
            </div>

        </div><!-- /.navbar-container -->
    </div>
          <div id="sidebar" class="sidebar responsive ace-save-state">
  <ul class="nav nav-list">
    <li <?php if ($page=='beranda') {echo $active;}?>>
        <a href="adminmainapp.php?unit=beranda">
        <i class="menu-icon fa fa-home"></i>
        <span class="menu-text"> beranda </span>
      </a>

      <b class="arrow"></b>
    </li>

    
        
   

    <!-- kategori -->
    <li  <?php if ($page=='m_pesertamagang' or $page=='d_nilai' or $page=='d_ortu' or $page=='m_prestasi' or $page=='d_prestasi' or $page=='d_wawancara' or $page=='d_pendaftar' or $page=='d_penentuan') {echo $open;}?>>
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-tags"></i>
        <span class="menu-text"> PENDAFTARAN </span>
        <b class="arrow fa fa-angle-down"></b>
      </a>
      <b class="arrow"></b>
      <ul class="submenu">
          <li <?php if ($page=='m_prestasi' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=m_prestasi&act=datagrid"><i class="menu-icon fa fa-caret-right"></i>Input Jenis Prestasi</a>
          <b class="arrow"></b>
        </li>
            <li <?php if ($page=='d_ortu' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=d_ortu&act=datagrid"><i class="menu-icon fa fa-caret-right"></i>Data Orang Tua</a>
          <b class="arrow"></b>
        </li>
        <li <?php if ($page=='d_prestasi' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=d_prestasi&act=datagrid"><i class="menu-icon fa fa-caret-right"></i>Data Prestasi</a>
          <b class="arrow"></b>
        </li>
                
        
        <li <?php if ($page=='d_nilai' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=d_nilai&act=datagrid"><i class="menu-icon fa fa-caret-right"></i>Data Nilai Ujian</a>
          <b class="arrow"></b>
        </li>
        <li <?php if ($page=='d_pendaftar' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=d_pendaftar&act=datagrid"><i class="menu-icon fa fa-caret-right"></i>Data Pendaftar</a>
          <b class="arrow"></b>
        </li>
         <li <?php if ($page=='d_wawancara' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=d_wawancara&act=datagrid"><i class="menu-icon fa fa-caret-right"></i>Data Wawancara</a>
          <b class="arrow"></b>
        </li>
         <li <?php if ($page=='d_penentuan' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=d_penentuan&act=datagrid"><i class="menu-icon fa fa-caret-right"></i>Penentuan</a>
          <b class="arrow"></b>
        </li>
        
      </ul>
    </li>

    <!-- subkategori -->
    <li  <?php if ($page=='i_artikel') {echo $open;}?>>
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-tags"></i>
        <span class="menu-text"> INFOMASI </span>
        <b class="arrow fa fa-angle-down"></b>
      </a>
      <b class="arrow"></b>
      <ul class="submenu">
        <li <?php if ($page=='i_artikel' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=i_artikel&act=datagrid"><i class="menu-icon fa fa-caret-right"></i>Artikel</a>
          <b class="arrow"></b>
        </li> 

      </ul>
    </li>

   

    
    <!-- Use -->
    <li <?php if ($page=='f_login' & $page=='f_menu') {echo $open;}?>>
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-user"></i>
        <span class="menu-text"> FASILITAS </span>
        <b class="arrow fa fa-angle-down"></b>
      </a>
      <b class="arrow"></b>
      <ul class="submenu">
        <li <?php if ($page=='f_login' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=f_login&act=datagrid"><i class="menu-icon fa fa-caret-right"></i>Pengguna</a>
          <b class="arrow"></b>
        </li>
         <li <?php if ($page=='f_menu' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=f_menu&act=datagrid"><i class="menu-icon fa fa-caret-right"></i>Menu</a>
          <b class="arrow"></b>
        </li>
       
      </ul>
    </li>

    <?php
                                }
                                else {
                                     ?>
    <body class="no-skin">
        <?php
        require_once '../lib/koneksi.php';
        ?>
        <div id="navbar" class="navbar navbar-default ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container">
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>
                </button>

            <div class="navbar-header pull-left">
                <a href="adminmainapp.php?unit=beranda" class="navbar-brand"><small><i ></i>Halaman Panitia</small></a>
            </div>

        </div><!-- /.navbar-container -->
    </div>
          <div id="sidebar" class="sidebar responsive ace-save-state">
  <ul class="nav nav-list">
<li <?php if ($page=='beranda') {echo $active;}?>>
        <a href="adminmainapp.php?unit=beranda">
        <i class="menu-icon fa fa-home"></i>
        <span class="menu-text"> Beranda </span>
      </a>

      <b class="arrow"></b>
    </li>

        
    
    <!-- kategori -->
    <li  <li <?php if ($page=='i_wawancara' && $act1=='input') {echo $active;}?>>
          <a href="adminmainapp.php?unit=i_wawancara&act=input"><i class="menu-icon fa fa-caret-right"></i>WAWANCARA</a>
          <b class="arrow"></b>
        </li>
     
      
    </li>

   
 

     <?php
                                }
                                ?>
        <!-- logout -->
    <li>
        <a href="logout.php">
        <i class="menu-icon fa fa-power-off"></i>
        <span class="menu-text"> KELUAR </span>
      </a>

      <b class="arrow"></b>
    </li>
  </ul><!-- /.nav-list -->

  <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
  </div>
</div>
