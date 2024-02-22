<?php
include("connect/index.php");


function sqlQueryCondition($query){
    global $conn;
    $data = array();
    $sql = $query;
    $result = $conn->query($sql);
    if($result ->num_rows > 0){
     while($row = $result->fetch_assoc()){
         $data[] = $row;
        //  var_dump($data);
     }
    }else {
     die("0 results");
    }
    // var_dump($data);
    return $data;
 }

 function sqlQueryInsert($query){
    global $conn;
    $sql = $query;
    $conn->query($sql);
 }

 function sqlQueryUpdate($query){
    global $conn;
    $sql = $query;
    $conn->query($sql);
 }


 


?>