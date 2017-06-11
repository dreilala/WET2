    <?php
    /*session_start();
    include "config/settings.php";*/
    //include "classes/User.Class.php";

    $id = $_SESSION['userid'];

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

        $User = new User($dbconn);

        $User->changeUser($id, $anrede, $vname, $nname, $strasse, $plz, $ort, $mail, $username, $password);
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
        <div class="container">
            <h3>Daten bearbeiten</h3>

            <form class="col-md-8" action="index.php?page=ChangeOwnData" method="POST">
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
                    <input type='password' class='form-control' name='Inputpass' placeholder='Actual Passwort' required="true" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$">
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a class="btn" href="index.php?page=showOwnData">Back</a>
                </div>
            </form>
        </div>
