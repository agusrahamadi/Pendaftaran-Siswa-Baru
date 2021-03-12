<?php
error_reporting(E_ALL^(E_NOTICE | E_WARNING));
$unit = $_GET['unit'];
if($unit == "beranda") {
    require_once 'unit/beranda.php';
}
else if($unit == "f_login") {   
    require_once 'unit/f_login.php';
}

else if($unit == "d_ortu") {
    require_once 'unit/d_ortu.php';
}
else if($unit == "pdf") {
    require_once 'unit/pdf.php';
}
else if($unit == "d_nilai") {
    require_once 'unit/d_nilai.php';
}
else if($unit == "m_prestasi") {
    require_once 'unit/m_prestasi.php';
}
else if($unit == "d_pendaftar") {
    require_once 'unit/d_pendaftar.php';
}
else if($unit == "d_penentuan") {
    require_once 'unit/d_penentuan.php';
}
else if($unit == "d_wawancara") {
    require_once 'unit/d_wawancara.php';
}
else if($unit == "d_prestasi") {
    require_once 'unit/d_prestasi.php';
}
else if($unit == "i_wawancara") {
    require_once 'unit/i_wawancara.php';
}
else if($unit == "i_artikel") {
    require_once 'unit/i_artikel.php';
}
else if($unit == "f_menu") {   
    require_once 'unit/f_menu.php';
}
