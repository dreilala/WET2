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
        <title></title>
    </head>
    <body>
        <h1>Liste aller Kunden</h1>
        <?php
        if ($dbconn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            $sql = "select * from users order by nachname";
            $result = $dbconn->query($sql);


            echo "<table class='table table-striped'>";
            echo "<tr>";
            echo "<td>Vorname</td>";
            echo "<td>Nachname</td>";
            echo "</td>";
            while ($row = $result->fetch_object()) {
                echo "<tr>";
                echo "<td>$row->vorname</td>";
                echo "<td>$row->nachname</td>";
                echo "</td>";
            }
            echo "</table>";
        }
        $dbconn->close();
        ?>
    </body>
</html>
