<?php

session_start();
include "inc/dbconn.php";
//include "navigation.php";


$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < 5; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
}
$oneYearOn = date('Y-m-d', strtotime(date("Y-m-d", mktime()) . " + 365 day"));
$value = $_POST['Inputvalue'];

$sql = "select code from voucher";
$result = $dbconn->query($sql);

while ($row = $result->fetch_object())
{
    if($randomString == $row->code)
    {
        header("Location: addVoucher.php");
    }
}

$sql = "INSERT INTO voucher (code, valid, value, state) VALUES ('$randomString', '$oneYearOn', '$value', 'offen')";
$result = $dbconn->query($sql);

if ($result == true) {
    header("Location: index.php?page=voucher");
    exit;
}


