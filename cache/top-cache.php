<?php

$cachefile = 'cached-index.html';
// echo $cachefile;
$cachetime = 60;

// Serve from the cache if it is younger than $cachetime
$cache_array = array();
if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    // echo "<!-- Cached copy, generated ".date('H:i', filemtime($cachefile))." -->\n";
    // readfile($cachefile);
    $cache_array[] = file_get_contents($cachefile);
    // exit;
}
var_dump($cache_array);
// $size = count($cache_array);
// echo $size;

// ob_start();
 // Start the output buffer
?>