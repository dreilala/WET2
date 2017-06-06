<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include "config/settings.php";
include("classes\User.Class.php");
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
        <div class="container">
            <h1>Registrierung</h1>
            <?php
            $User = new User($dbconn);
            if (empty($userError)) {
                $userError = null;
            }

            if (!empty($_POST)) {
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

                $User->addUser($anrede, $vname, $nname, $strasse, $plz, $ort, $mail, $username, $password, $passwordwdh);
                $User->addPayment($username, $paymentmethod, $number);
            }
            ?>

            <form class='col-md-8' action='register.php' method='Post'>
                <div id="errors" >
                    <?php
                    echo "$userError <br />";
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
        </div>
    </body>
</html>
