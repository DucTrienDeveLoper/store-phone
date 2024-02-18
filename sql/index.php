<?php
include("../connect/index.php")

function sqlQuery($tableName){
   global $conn;
   $data = array();
   $sql = "SELECT * FROM $tableName";
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

function sqlQueryConditio($tableName, $condition){
    global $conn;
    $data = array();
    $sql = "SELECT * FROM $tableName WHERE  $condition";
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