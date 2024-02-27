<?php
fclose($cachefile);// đóng file lại khi file($cachefile) đã được cache data;
ob_end_flush(); // Send the output to the browser
