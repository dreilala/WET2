<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include("navigation.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registrierung</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </head>
    <body>
        <?php
        include "dbconn.php";
        $errorOccurred = 0;
        $vnameError = "";
        $nnameError = "";
        $strasseError = "";
        $plzError = "";
        $ortError = "";
        $mailError = "";
        $usernameError = "";
        $passwordError = "";
        $passWdhError = "";
        $numberError = "";
        $userError = "";

        if (isset($_POST['Inputvname'])) {
            $anrede = $_POST['InputAnrede'];
            $vname = $_POST['Inputvname'];
            $nname = $_POST['Inputnname'];
            $strasse = $_POST['Inputstrasse'];
            $plz = $_POST['Inputplz'];
            $ort = $_POST['Inputort'];
            $mail = $_POST['Inputmail'];
            $username = $_POST['Inputbenutzer'];
            $password = $_POST['Inputpass'];
            $passwordwdh = $_POST['Inputpass2'];
            $paymentmethod = $_POST['Inputpaymentmethod'];
            $number = $_POST['Inputnumber'];

            if (!preg_match("/^[a-züäöA-ZÖÜÄ -]*$/", $vname)) {
                $vnameError = "Bitte gültigen Vornamen eintragen.";
                $errorOccurred = 2;
            }
            if (!preg_match("/^[a-züäöA-ZÖÜÄ -]*$/", $nname)) {
                $nnameError = "Bitte gültigen Nachnamen eintragen.";
                $errorOccurred = 2;
            }
            if (!preg_match("/^[a-züäöA-ZÖÜÄ -]*$/", $strasse)) {
                $strasseError = "Bitte gültige Strasse eintragen.";
                $errorOccurred = 2;
            }
            if (!preg_match("/[0-9]{4}/", $plz)) {
                $plzError = "Bitte gültige Postleitzahl eintragen.";
                $errorOccurred = 2;
            }
            if (!preg_match("/^[a-züäöA-ZÖÜÄ -]*$/", $ort)) {
                $ortError = "Bitte gültigen Ort eintragen.";
                $errorOccurred = 2;
            }
            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $mailError = "Bitte gültige Mailadresse eintragen.";
                $errorOccurred = 2;
            }
            if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                $usernameError = "Bitte gültigen Usernamen eintragen.";
                $errorOccurred = 2;
            }
            if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/", $password)) {
                $passwordError = "Bitte gültiges Password eintragen.";
                $errorOccurred = 2;
            }
            if ($passwordwdh != $password) {
                $passWdhError = "Bitte das gleiche Passwort eintragen.";
                $errorOccurred = 2;
            }
            if (($paymentmethod == "Kreditkarte" || $paymentmethod == "Bankomatkarte") && !preg_match("/[0-9]{13,16}/", $number)) {
                $numberError = "Bitte gültige Kartennummer eingeben.";
                $errorOccurred = 2;
            }
            /* if ($paymentmethod == "Gutschein" && !preg_match("/[0-9]{13,16}/", $password)) {
              $numberError = "Bitte gültige Kartennummer eingeben.";
              $errorOccurred = 1;
              } */


            $password = md5($password);

            $sql = "SELECT id FROM users WHERE username = '$username'";

            $result = $dbconn->query($sql);
            $menge = $result->num_rows;


            if ($menge == 0 && $errorOccurred == 0) {
                $eintragUser = "INSERT INTO users (anrede, vorname, nachname, strasse, plz, ort, mail, username, passwd) VALUES ('$anrede', '$vname', '$nname', '$strasse', '$plz', '$ort', '$mail', '$username', '$password')";
                $eintragPayment = "INSERT INTO paymentinfo(username, paymentmethod, number) VALUES ('$username','$paymentmethod','$number')";

                $eintragenUser = $dbconn->query($eintragUser);
                $eintragenPayment = $dbconn->query($eintragPayment);
                print_r($eintragenPayment);
                print_r($eintragenUser);
                if ($eintragenUser == true && $eintragenPayment == true) {
                    header("Location: login.php");
                    exit;
                } else {
                    $userError = "Fehler beim speichern der Daten in der DB. Bitte später nochmal versuchen";
                    $errorOccurred = 2;
                    header("Location: register.php");
                    exit;
                }
            } else {
                $userError = "Benutzername bereits vergeben";
                $errorOccurred = 2;
                header("Location: register.php");
                exit;
            }
        }
        ?>
        <form class='col-md-8' action='register.php' method='Post'>
            <div id="errors" >
                <?php
                    /*echo
                    $vnameError . "<br />
                  " . $nnameError . "<br />
                  " . $strasseError . "<br />
                  " . $plzError . "<br />
                  " . $ortError . "<br />
                  " . $mailError . "<br />
                  " . $usernameError . "<br />
                  " . $passwordError . "<br />
                  " . $passWdhError . "<br />
                  " . $numberError . "<br />
                  " . $userError . "<br />";*/
                ?>
            </div>
            <div class='form-group'>
                Anrede
                <select class="form-control" name='InputAnrede' required="true">
                    <option></option>
                    <option>Frau</option>
                    <option>Herr</option>
                </select>
            </div>
            <div class='form-group'>
                Vorname
                <input type='text' class='form-control' name='Inputvname' placeholder='Vorname' required="true" pattern="[a-züäöA-ZÖÜÄ -]*$">
            </div>
            <div class='form-group'>
                Nachname
                <input type='text' class='form-control' name='Inputnname' placeholder='Nachname' required="true" pattern="[a-züäöA-ZÖÜÄ -]*$">
            </div>
            <div class='form-group'>
                Strasse
                <input type='text' class='form-control' name='Inputstrasse' placeholder='Straße' required="true" pattern="[a-züäöA-ZÖÜÄ -]*$">
            </div>
            <div class='form-group'>
                PLZ
                <input type='text' class='form-control' name='Inputplz' placeholder='PLZ' required="true" pattern="[0-9]{4}">
            </div>
            <div class='form-group'>
                Ort
                <input type='text' class='form-control' name='Inputort' placeholder='Ort' required="true" pattern="[a-züäöA-ZÖÜÄ -]*$">
            </div>
            <div class='form-group'>
                Email Adresse
                <input type='email' class='form-control' name='Inputmail' placeholder='Mail' required="true">
            </div>
            <div class='form-group'>
                Benutzername
                <input type='text' class='form-control' name='Inputbenutzer' placeholder='Benutzer' required="true" pattern="[a-zA-Z0-9]*$">
            </div>
            <div class='form-group'>
                Passwort
                <input type='password' class='form-control' name='Inputpass' placeholder='Passwort' required="true" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$">
            </div>
            <div class='form-group'>
                Passwort wiederholen
                <input type='password' class='form-control' name='Inputpass2' placeholder='Passwort' required="true">
            </div>
            <div class='form-group'>
                Zahlungsinformation
                <select class="form-control" name='Inputpaymentmethod' required="true">
                    <option></option>
                    <option>Gutschein</option>
                    <option>Kreditkarte</option>
                    <option>Bankomatkarte</option>
                </select>
            </div>
            <div class='form-group'>
                Nummer
                <input type='text' class='form-control' name='Inputnumber' placeholder='Nummer' required="true" pattern="[0-9]{13,16}">
            </div>
            <button type='submit' class='btn btn-default'>Registrieren</button>
        </form>


    </body>
</html>
