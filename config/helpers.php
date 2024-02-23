<?php
function loadview(string $views,array $data=[],$layout="base"){
    ob_start();
    extract($data);
    require_once("../views/".$views);
    // dd(ob_get_clean());
    $cFV=ob_get_clean();
    // dd($cFV);
    require_once("../views/layout/".$layout.".layout.php");
}