<?php
$url = $_SERVER["SCRIPT_NAME"];
$break = Explode('/', $url);
$file = $break[count($break) - 1];
$cachefile = 'cached-'.substr_replace($file ,"",-4).'.html';
// echo $cachefile;


$name = substr_replace($file ,"",-4);
global $name;

echo "<br/>";
$cachetime = 60;
$arr = array();
// Serve from the cache if it is younger than $cachetime
$cache_array = array();
if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    // readfile($cachefile);
    $arr = file_get_contents($cachefile);
    $array = json_decode($arr);
    error_reporting(0);
    $length = count($array);
    echo "sử dụng data từ cache";
    for($index = 0 ; $index < $length ; $index ++){
        if($array[$index]->gia > 10000000){
            echo "<br/>";
            echo $array[$index]->tensp;
        }
    }
    

    exit();
}


?>