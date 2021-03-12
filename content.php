<?php
$unit = $_GET['unit'];
if($unit == "artikel_unit") {
    require_once 'unit/artikel_unit.php';
}
else if($unit == "pendaftaran_unit") {
    require_once 'unit/pendaftaran_unit.php';
}
else if($unit == "informasi_unit") {
    require_once 'unit/informasi_unit.php';
}
else if($unit == "detail_unit") {
    require_once 'unit/detail_unit.php';
}
else if($unit == "pdf") {
    require_once 'unit/pdf.php';
}
else if($unit == "home_unit") {
    require_once 'unit/home_unit.php';
}
