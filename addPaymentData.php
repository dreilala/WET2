<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include "config/settings.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title></title>
    </head>
    <body>
        <div class="container">
            <h1>Zahlungsdaten hinzufügen</h1>
            <?php
            if (!empty($_POST)) {
                $paymentmethod = $_POST['Inputpaymentmethod'];
                $number = $_POST['Inputnumber'];

                $id = $_SESSION["userid"];
                $sql = "select * from users where id = '$id'";
                $result = $dbconn->query($sql);
                $row = $result->fetch_object();

                $username = $row->username;

                $eintragPayment = "INSERT INTO paymentinfo(username, paymentmethod, number) VALUES ('$username','$paymentmethod','$number')";
                $eintragenPayment = $dbconn->query($eintragPayment);

                if ($eintragenPayment == true) {
                    header("Location: showOwnData.php");
                    exit;
                } else {
                    $userError = "Fehler beim Speichern der Daten in der DB. Bitte später nochmal versuchen";
                    $errorOccurred = 2;
                    header("Location: addPaymentData.php");
                    exit;
                }
            }
            ?>
            <form class="col-md-8" action="addPaymentData.php" method="POST">
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
        </div>
    </body>
</html>
