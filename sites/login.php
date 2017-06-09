<?php
/* session_start(); */
//include "config/settings.php";
?>
<?php
if (isset($_POST['InputUser']) && isset($_POST['InputPassword']) && isset($_POST['check']) && $_POST['check'] == true) {
    $user = $_POST["InputUser"];
    $password = md5($_POST["InputPassword"]);

    $ergebnis = $dbconn->query("SELECT passwd, state FROM users WHERE username LIKE '" . $user . "' LIMIT 1");
    $row = $ergebnis->fetch_object();
    if ($row->passwd == $password && $row->state == "active") {

        $erg = $dbconn->query("SELECT id FROM users WHERE username ='" . $user . "' LIMIT 1");
        $getid = $erg->fetch_object();
        $id = $getid->id;
        setcookie("userid", $id, time() + 99999);
        //print_r($_SESSION["userid"]);
        header("Location: index.php");
        exit;
    }
} else {
    if (isset($_POST['InputUser']) && isset($_POST['InputPassword'])) {
        $user = $_POST["InputUser"];
        $password = md5($_POST["InputPassword"]);

        $ergebnis = $dbconn->query("SELECT passwd, state FROM users WHERE username LIKE '" . $user . "' LIMIT 1");
        $row = $ergebnis->fetch_object();
        if ($row->passwd == $password && $row->state == "active") {
            $erg = $dbconn->query("SELECT id FROM users WHERE username ='" . $user . "' LIMIT 1");
            $getid = $erg->fetch_object();
            $id = $getid->id;
            $_SESSION["userid"] = $id;
            header("Location: index.php");
            exit;
        } else {
            header("Location: index.php?page=login");
            exit;
        }
    }
}
?>
<div class="container">
    <h1>Login</h1>
    <form class='col-md-8' action='index.php?page=login' method='Post'>
        <div class='form-group'>
            User
            <input type='text' class='form-control' name='InputUser' placeholder='User'>
        </div>
        <div class='form-group'>
            Password
            <input type='password' class='form-control' name='InputPassword' placeholder='Password'>
        </div>
        <div class='checkbox'>
            <label><input type='checkbox' name='check'>Login merken</label>
        </div>
        <button type='submit' class='btn btn-default'>Submit</button>
    </form>
</div>
