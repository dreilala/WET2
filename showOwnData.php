<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include "navigation.php";
include "dbconn.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <title></title>
    </head>
    <body>
        <h1>Meine Daten</h1>
        <?php
        if ($dbconn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            $id = $_SESSION["userid"];
            $sql = "select * from users where id = '$id'";
            $result = $dbconn->query($sql);
            $row = $result->fetch_object();

            $username = $row->username;

            $sql2 = "select * from paymentinfo where username = '$username'";
            $result2 = $dbconn->query($sql2);

            //echo "<div class='row'>";
            echo "<table>";
            echo "<tr>";
            echo "<td>Vorname</td>";
            echo "<td>$row->vorname</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Nachname</td>";
            echo "<td>$row->nachname</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Strasse</td>";
            echo "<td>$row->strasse</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>PLZ</td>";
            echo "<td>$row->plz</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Ort</td>";
            echo "<td>$row->ort</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Mail Adresse</td>";
            echo "<td>$row->mail</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Benutzername</td>";
            echo "<td>$row->username</td>";
            echo "</tr>";
            echo "<tr>";

            while ($row2 = $result2->fetch_object()) {
                echo "<tr>";
                echo "<td>Zahlungsart</td>";
                echo "<td>$row2->paymentmethod</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Nummer</td>";
                echo "<td>$row2->number</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<a href='changeOwnData.php' class='btn btn-default'>Bearbeiten</a>";
            echo "<a href='addPaymentData.php' class='btn btn-default'>Zahlungsdaten hinzufügen</a>";
            //echo "</div>";
        }
        $dbconn->close();
        ?>
    </body>
</html>
