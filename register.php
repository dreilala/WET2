<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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

        $password = md5($password);

        $sql = "SELECT id FROM users WHERE username = '$username'";

        $result = $dbconn->query($sql);
        $menge = $result->num_rows;

        if($menge == 0)
        {
            $eintrag = "INSERT INTO users (anrede, vorname, nachname, strasse, plz, ort, mail, username, passwd) VALUES ('$anrede', '$vname', '$nname', '$strasse', '$plz', '$ort', '$mail', '$username', '$password')";

            $eintragen = $dbconn->query($eintrag);

            if($eintragen == true)
            {
            header("Location: login.php");
            exit;
            }
            else{
            header("Location: register.php");
            exit;
            }
        }
        else
        {
        header("Location: register.php");
        exit;
        }

        }
        ?>
        <form class='col-md-8' action='register.php' method='Post'>
            <div class='form-group'>
                Anrede
                <select class="form-control" name='InputAnrede'>
                    <option>Frau</option>
                    <option>Herr</option>
                </select>
            </div>
            <div class='form-group'>
                Vorname
                <input type='text' class='form-control' name='Inputvname' placeholder='Vorname'>
            </div>
            <div class='form-group'>
                Nachname
                <input type='text' class='form-control' name='Inputnname' placeholder='Nachname'>
            </div>
            <div class='form-group'>
                Strasse
                <input type='text' class='form-control' name='Inputstrasse' placeholder='Straße'>
            </div>
            <div class='form-group'>
                PLZ
                <input type='text' class='form-control' name='Inputplz' placeholder='PLZ'>
            </div>
            <div class='form-group'>
                Ort
                <input type='text' class='form-control' name='Inputort' placeholder='Ort'>
            </div>
            <div class='form-group'>
                Email Adresse
                <input type='email' class='form-control' name='Inputmail' placeholder='Mail'>
            </div>
            <div class='form-group'>
                Benutzername
                <input type='text' class='form-control' name='Inputbenutzer' placeholder='Benutzer'>
            </div>
            <div class='form-group'>
                Passwort
                <input type='password' class='form-control' name='Inputpass' placeholder='Passwort'>
            </div>
            <div class='form-group'>
                Passwort wiederholen
                <input type='password' class='form-control' name='Inputpass2' placeholder='Passwort'>
            </div>
            <button type='submit' class='btn btn-default'>Registrieren</button>
        </form>


    </body>
</html>
