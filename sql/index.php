<?php
include("../connect/index.php");
function sqlQueryCondition($sql){
    global $conn;
    $data = array();
    $result = $conn->query($sql);
    if($result ->num_row > 0){
     while($row = $result->fetch_assoc(){
         $data = $row;
     })
    }else {
     die("0 results");
    }
    return $data
 }
 

 


?>