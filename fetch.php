<?php

// Step 1: Connect to the database
$conn = mysqli_connect("localhost", "root", "", "mobile", "3307") or die();

// Function to execute query and fetch data
function fetchData($conn, $query,$type = 'default')
{
    $result = mysqli_query($conn, $query);
    error_reporting(0); // Suppress errors for this query

    $dataArray = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            // logic add type phone
            if($type === "loai"){
                $dataObject = new stdClass();
                $dataObject->img = $row['img'];
                $dataObject->tieude = $row['tieude'];
                $dataObject->value = $row['value'];
                array_push($dataArray,$dataObject);
            }
            else{
            $dataObject = new stdClass();
            $dataObject->tieude = $row['tieude'];
            $dataObject->value = $row['value'];
            array_push($dataArray, $dataObject);
            }
        }
    }
    return $dataArray;
}

// Function to create and set price objects
function createPrice($tieude, $value)
{
    $price = new stdClass();
    $price->tieude = $tieude;
    $price->value = $value;
    return $price;
}

// Query to get brand information
$arrayType = fetchData($conn, "SELECT hangsp AS tieude, hangsp AS value FROM hang");

// Query to get disk storage information
$arrayDisk = fetchData($conn, "SELECT CONCAT(dungluong, donvi) AS tieude, dungluong AS value FROM luuluong WHERE loai = 'DISK'");

// Query to get RAM information
$arrayRam = fetchData($conn, "SELECT CONCAT(dungluong, donvi) AS tieude, dungluong AS value FROM luuluong WHERE loai = 'RAM'");

// Query to get recommended content
$arrayContent = fetchData($conn, "SELECT noidung AS tieude, noidung AS value FROM nhucau");

// Query to get image and type information
$arrayPhone = fetchData($conn, "SELECT nameimg AS img, loai AS tieude, loai AS value FROM img","loai");

// Create price objects
$price = createPrice('nhỏ hơn 5 triệu', 'duoi5trieu');
$priceFirst = createPrice('từ 5 tới 10 triệu', 'tu5toi10trieu');
$priceSecond = createPrice('trên 10 triệu', 'tren10trieu');

// Combine all data into a single object
$object = new stdClass();
$object->hang = $arrayType;
$object->dllt = $arrayDisk;
$object->dungluong = $arrayRam;
$object->dexuat = $arrayContent;
$object->ldt = $arrayPhone;
$object->price = array($price, $priceFirst, $priceSecond);

// Output JSON data
echo json_encode($object);

?>