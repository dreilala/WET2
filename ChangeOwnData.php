<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    include "navigation.php";
    include "dbconn.php";

    $id = $_SESSION['userid'];

    if (!empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $emailError = null;
        $mobileError = null;

        // keep track post values
        /* $name = $_POST['name'];
          $email = $_POST['email'];
          $mobile = $_POST['mobile']; */

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

        // validate input
        /* $valid = true;
          if (empty($name)) {
          $nameError = 'Please enter Name';
          $valid = false;
          }

          if (empty($email)) {
          $emailError = 'Please enter Email Address';
          $valid = false;
          } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailError = 'Please enter a valid Email Address';
          $valid = false;
          }

          if (empty($mobile)) {
          $mobileError = 'Please enter Mobile Number';
          $valid = false;
          } */

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
        
        $password = md5($password);

        // update data
        /* if ($valid) {
          $pdo = Database::connect();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "UPDATE customers  set name = ?, email = ?, mobile =? WHERE id = ?";
          $q = $pdo->prepare($sql);
          $q->execute(array($name, $email, $mobile, $id));
          Database::disconnect();
          header("Location: index.php");
          } */

        $eintragUser = "update users set anrede = '$anrede', vorname = '$vname', nachname = '$nname', strasse = '$strasse', plz = '$plz', ort = '$ort', mail = '$mail', username = '$username', passwd = '$password' where id='$id'";
        //$eintragPayment = "update paymentinfo set id = '$id', username = '$username', paymentmethod = '$paymentmethod', number = '$number'";

        $eintragenUser = $dbconn->query($eintragUser);
        //$eintragenPayment = $dbconn->query($eintragPayment);
        //print_r($eintragenPayment);
        //print_r($eintragenUser);
        if ($eintragenUser == true) {
            header("Location: showOwnData.php");
            exit;
        } else {
            $userError = "Fehler beim speichern der Daten in der DB. Bitte später nochmal versuchen";
            $errorOccurred = 2;
            header("Location: ChangeOwnData.php");
            exit;
        }
    } else {
        
        $sql = "select * from users where id = '$id'";
        $result = $dbconn->query($sql);
        $row = $result->fetch_object();

        $username = $row->username;
        $anrede = $row->anrede;
        $vname = $row->vorname;
        $nname = $row->nachname;
        $strasse = $row->strasse;
        $plz = $row->plz;
        $ort = $row->ort;
        $mail = $row->mail;

        $sql2 = "select * from paymentinfo where username = '$username'";
        $result2 = $dbconn->query($sql2);
    }
    ?>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">

            <div class="span10 offset1">
                <div class="row">
                    <h3>Update a Customer</h3>
                </div>

                <form class="form-horizontal" action="ChangeOwnData.php" method="POST">
                    <div class='form-group'>
                        Anrede
                        <select class="form-control" name='InputAnrede' required="true">
                            <option>Frau</option>
                            <option>Herr</option>
                        </select>
                    </div>
                    <div class='form-group'>
                        Vorname
                        <input type='text' class='form-control' name='Inputvname' value="<?php echo!empty($vname) ? $vname : ''; ?>" placeholder='Vorname' required="true" pattern="[a-züäöA-ZÖÜÄ -]*$">
                    </div>
                    <div class='form-group'>
                        Nachname
                        <input type='text' class='form-control' name='Inputnname' value="<?php echo!empty($nname) ? $nname : ''; ?>" placeholder='Nachname' required="true" pattern="[a-züäöA-ZÖÜÄ -]*$">
                    </div>
                    <div class='form-group'>
                        Strasse
                        <input type='text' class='form-control' name='Inputstrasse' value="<?php echo!empty($strasse) ? $strasse : ''; ?>" placeholder='Straße' required="true" pattern="[a-züäöA-ZÖÜÄ -]*$">
                    </div>
                    <div class='form-group'>
                        PLZ
                        <input type='text' class='form-control' name='Inputplz' value="<?php echo!empty($plz) ? $plz : ''; ?>" placeholder='PLZ' required="true" pattern="[0-9]{4}">
                    </div>
                    <div class='form-group'>
                        Ort
                        <input type='text' class='form-control' name='Inputort' value="<?php echo!empty($ort) ? $ort : ''; ?>" placeholder='Ort' required="true" pattern="[a-züäöA-ZÖÜÄ -]*$">
                    </div>
                    <div class='form-group'>
                        Email Adresse
                        <input type='email' class='form-control' name='Inputmail' value="<?php echo!empty($mail) ? $mail : ''; ?>" placeholder='Mail' required="true">
                    </div>
                    <div class='form-group'>
                        Benutzername
                        <input type='text' class='form-control' name='Inputbenutzer' value="<?php echo!empty($username) ? $username : ''; ?>" placeholder='Benutzer' required="true" pattern="[a-zA-Z0-9]*$" readonly="true">
                    </div>
                    <div class='form-group'>
                        Passwort
                        <input type='password' class='form-control' name='Inputpass' placeholder='new Passwort' required="true" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$">
                    </div>
                    <div class='form-group'>
                        Passwort wiederholen
                        <input type='password' class='form-control' name='Inputpass2' placeholder='new Passwort' required="true">
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Update</button>
                        <a class="btn" href="showOwnData.php">Back</a>
                    </div>
                </form>
            </div>

        </div> <!-- /container -->
    </body>
</html>
