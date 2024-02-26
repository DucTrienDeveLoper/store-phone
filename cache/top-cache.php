<?php

$cachefile = 'cached-index.html';
// echo $cachefile;
$cachetime = 60;

// Serve from the cache if it is younger than $cachetime
$cache_array = array();
if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    
    $cache_array[] = file_get_contents($cachefile);
}
var_dump($cache_array);
?>