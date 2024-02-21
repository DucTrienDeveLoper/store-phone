<?php
include("connect/index.php");


function sqlQueryCondition($tableName, $condition){
    global $conn;
    $data = array();
    $sql = "SELECT * FROM $tableName WHERE  $condition";
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

 


?>