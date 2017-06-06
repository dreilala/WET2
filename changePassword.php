<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    include "config\settings.php";
    include "classes\User.Class.php";

    $id = $_SESSION['userid'];

    if (!empty($_POST)) {
        $passwordold = $_POST['Inputpassold'];
        $passwordnew = $_POST['Inputpassnew'];
        $passwordnew2 = $_POST['Inputpassnew2'];

        $User = new User($dbconn);

        $User->changePassword($id, $passwordold, $passwordnew, $passwordnew2);
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
        <h3>Update Password</h3>

        <form class="col-md-8" action="changePassword.php" method="POST">

            <div class='form-group'>
                Altes Passwort
                <input type='password' class='form-control' name='Inputpassold' placeholder='Actual Passwort' required="true" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$">
            </div>
            <div class='form-group'>
                Neues Passwort
                <input type='password' class='form-control' name='Inputpassnew' placeholder='Neues Passwort' required="true" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$">
            </div>
            <div class='form-group'>
                Neues Passwort bestätigen
                <input type='password' class='form-control' name='Inputpassnew2' placeholder='Neues Passwort bestätigen' required="true" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$">
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Update</button>
                <a class="btn" href="showOwnData.php">Back</a>
            </div>
        </form>
        </div>
    </body>
</html>
