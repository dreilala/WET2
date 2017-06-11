<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author local
 */
class User {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    private function validateUserdata($vname, $nname, $strasse, $plz, $ort, $mail, $username) {
        $errorOccurred = 0;

        if (!preg_match("/^[a-züäöA-ZÖÜÄ -]*$/", $vname)) {
            $errorOccurred = 2;
        }
        if (!preg_match("/^[a-züäöA-ZÖÜÄ -]*$/", $nname)) {
            $errorOccurred = 2;
        }
        if (!preg_match("/^[a-züäöA-ZÖÜÄ -]*$/", $strasse)) {
            $errorOccurred = 2;
        }
        if (!preg_match("/[0-9]{4}/", $plz)) {
            $errorOccurred = 2;
        }
        if (!preg_match("/^[a-züäöA-ZÖÜÄ -]*$/", $ort)) {
            $errorOccurred = 2;
        }
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $errorOccurred = 2;
        }
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            $errorOccurred = 2;
        }
    }

    private function validatePassword($password, $passwordwdh) {
        $errorOccurred = 0;
        if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/", $password)) {
            $errorOccurred = 2;
        }
        if ($passwordwdh != $password) {
            $errorOccurred = 2;
        }
    }

    public function addUser($anrede, $vname, $nname, $strasse, $plz, $ort, $mail, $username, $password, $passwordwdh, $paymentmethod, $number) {
        $this->validateUserdata($vname, $nname, $strasse, $plz, $ort, $mail, $username);
        $this->validatePassword($password, $passwordwdh);
        $this->addPayment($username, $paymentmethod, $number);
        $password = md5($password);

        $sql = "SELECT id FROM users WHERE username = '$username'";
        $result = $this->conn->query($sql);
        $menge = $result->num_rows;

        if ($menge == 0 && $errorOccurred == 0) {
            $eintragUser = "INSERT INTO users (anrede, vorname, nachname, strasse, plz, ort, mail, username, passwd, state) VALUES ('$anrede', '$vname', '$nname', '$strasse', '$plz', '$ort', '$mail', '$username', '$password', 'active')";
            $eintragenUser = $this->conn->query($eintragUser);

            if ($eintragenUser == true) {
                header("Location: index.php?page=login");
                exit;
            } else {
                $userError = "Fehler beim speichern der Daten in der DB. Bitte später nochmal versuchen";
                $$errorOccurred = 2;
                header("Location: index.php");
                exit;
            }
        } else {
            $userError = "Benutzername bereits vergeben";
            $$errorOccurred = 2;
            header("Location: index.php?page=register");
            exit;
        }
    }

    private function validatePaymentdata($paymentmethod, $number) {
        $errorOccurred = 0;

        if (($paymentmethod == "Kreditkarte" || $paymentmethod == "Bankomatkarte") && !preg_match("/^[0-9]{13,16}/", $number)) {
            $numberError = "Bitte gültige Kartennummer eingeben.";
            $errorOccurred = 2;
        }
    }

    public function addPayment($username, $paymentmethod, $number) {
        $this->validatePaymentdata($paymentmethod, $number);
        if ($errorOccurred == 0) {
            $eintragPayment = "INSERT INTO paymentinfo(username, paymentmethod, number) VALUES ('$username','$paymentmethod','$number')";
            $eintragenPayment = $this->conn->query($eintragPayment);

            if ($eintragenPayment == false) {

                $userError = "Fehler beim speichern der Daten in der DB. Bitte später nochmal versuchen";
                $errorOccurred = 2;
                header("Location: index.php");
                exit;
            }
        }
    }

    public function changeUser($id, $anrede, $vname, $nname, $strasse, $plz, $ort, $mail, $username, $password) {
        $this->validateUserdata($vname, $nname, $strasse, $plz, $ort, $mail, $username);

        $password = md5($password);

        $ergebnis = $this->conn->query("SELECT passwd FROM users WHERE id = '$id' LIMIT 1");
        $row = $ergebnis->fetch_object();
        if ($row->passwd == $password && $$errorOccurred == 0) {
            $eintragUser = "update users set anrede = '$anrede', vorname = '$vname', nachname = '$nname', strasse = '$strasse', plz = '$plz', ort = '$ort', mail = '$mail', username = '$username' where id='$id'";

            $eintragenUser = $this->conn->query($eintragUser);
            if ($eintragenUser == true) {
                header("Location: index.php?page=showOwnData");
                exit;
            } else {
                $userError = "Fehler beim speichern der Daten in der DB. Bitte später nochmal versuchen";
                $$errorOccurred = 2;
                header("Location: index.php?page=ChangeOwnData");
                exit;
            }
        }
    }

    public function changePassword($id, $passwordold, $passwordnew, $passwordnew2) {
        $this->validatePassword($passwordnew, $passwordnew2);

        $passwordnew = md5($passwordnew);
        $passwordold = md5($passwordold);

        $ergebnis = $this->conn->query("SELECT passwd FROM users WHERE id = '$id' LIMIT 1");
        $row = $ergebnis->fetch_object();

        if ($row->passwd == $passwordold && $$errorOccurred == 0) {
            $eintrag = "update users set passwd = '$passwordnew' where id='$id'";

            $eintragen = $this->conn->query($eintrag);
            if ($eintragen == true) {
                header("Location: index.php?page=showOwnData");
                exit;
            } else {
                $userError = "Fehler beim speichern der Daten in der DB. Bitte später nochmal versuchen";
                $$errorOccurred = 2;
                header("Location: index.php?page=changePassword");
                exit;
            }
        }
    }

}
