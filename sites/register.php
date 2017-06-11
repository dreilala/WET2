<?php
/*session_start();
include "config/settings.php";*/ 

?>
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
                $paymentmethod = $_POST['Inputpaymentmethod'];
                $number = $_POST['Inputnumber'];

                $User->addUser($anrede, $vname, $nname, $strasse, $plz, $ort, $mail, $username, $password, $passwordwdh, $paymentmethod, $number);
            }
            ?>

            <form class='col-md-8' action='index.php?page=register' method='Post'>
                <div id="errors" >
                    <?php
                    echo "$userError <br />";
                    ?>
                </div>
                <div class='form-group'>
                    <label>Anrede</label>
                    <select class="form-control" name='InputAnrede' required="true">
                        <option></option>
                        <option>Frau</option>
                        <option>Herr</option>
                    </select>
                </div>
                <div class='form-group'>
                    <label>Vorname</label>
                    <input type='text' class='form-control' name='Inputvname' placeholder='Vorname' required="true" pattern="[a-züäöA-ZÖÜÄ -]*$">
                </div>
                <div class='form-group'>
                    <label>Nachname</label>
                    <input type='text' class='form-control' name='Inputnname' placeholder='Nachname' required="true" pattern="[a-züäöA-ZÖÜÄ -]*$">
                </div>
                <div class='form-group'>
                    <label>Strasse</label>
                    <input type='text' class='form-control' name='Inputstrasse' placeholder='Straße' required="true" pattern="[a-züäöA-ZÖÜÄ -]*$">
                </div>
                <div class='form-group'>
                    <label>PLZ</label>
                    <input type='text' class='form-control' name='Inputplz' placeholder='PLZ' required="true" pattern="[0-9]{4}">
                </div>
                <div class='form-group'>
                    <label>Ort</label>
                    <input type='text' class='form-control' name='Inputort' placeholder='Ort' required="true" pattern="[a-züäöA-ZÖÜÄ -]*$">
                </div>
                <div class='form-group'>
                    <label>Email Adresse</label>
                    <input type='email' class='form-control' name='Inputmail' placeholder='Mail' required="true">
                </div>
                <div class='form-group'>
                    <label>Benutzername</label>
                    <input type='text' class='form-control' name='Inputbenutzer' placeholder='Benutzer' required="true" pattern="[a-zA-Z0-9]*$">
                </div>
                <div class='form-group'>
                    <label>Passwort</label>
                    <input type='password' class='form-control' name='Inputpass' placeholder='Passwort' required="true" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$">
                </div>
                <div class='form-group'>
                    <label>Passwort wiederholen</label>
                    <input type='password' class='form-control' name='Inputpass2' placeholder='Passwort' required="true">
                </div>
                <div class='form-group'>
                    <label>Zahlungsinformation</label>
                    <select class="form-control" name='Inputpaymentmethod' required="true">
                        <option></option>
                        <option>Kreditkarte</option>
                        <option>Bankomatkarte</option>
                    </select>
                </div>
                <div class='form-group'>
                    <label>Nummer</label>
                    <input type='text' class='form-control' name='Inputnumber' placeholder='Nummer' required="true" pattern="[0-9]{13,16}">
                </div>
                <button type='submit' class='btn btn-primary'>Registrieren</button>
            </form>
        </div>
