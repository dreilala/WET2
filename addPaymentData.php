<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include "navigation.php";
include "dbconn.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (!empty($_POST)) {
            $paymentmethod = $_POST['Inputpaymentmethod'];
            $number = $_POST['Inputnumber'];
            
            print_r($number);
            
            $id = $_SESSION["userid"];
            $sql = "select * from users where id = '$id'";
            $result = $dbconn->query($sql);
            $row = $result->fetch_object();

            $username = $row->username;
            
            $eintragPayment = "INSERT INTO paymentinfo(username, paymentmethod, number) VALUES ('$username','$paymentmethod','$number')";

            $eintragenPayment = $dbconn->query($eintragPayment);

            if ($eintragenPayment == true) {
                //header("Location: showOwnData.php");
                //exit;
            } else {
                //$userError = "Fehler beim Speichern der Daten in der DB. Bitte später nochmal versuchen";
                //$errorOccurred = 2;
                //header("Location: addPaymentData.php");
                //exit;
            }
        }
        ?>
        <form class="form-horizontal" action="addPaymentData.php" method="POST">
            <div class='form-group'>
                Zahlungsinformation
                <select class="form-control" name='Inputpaymentmethod' required="true">
                    <option></option>
                    <option>Kreditkarte</option>
                    <option>Bankomatkarte</option>
                </select>
            </div>
            <div class='form-group'>
                Nummer
                <input type='text' class='form-control' name='Inputnumber' placeholder='Nummer' required="true" pattern="[0-9]{13,16}">
            </div>
            <button type='submit' class='btn btn-default'>Hinzufügen</button>
        </form>
    </body>
</html>
