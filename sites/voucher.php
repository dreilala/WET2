<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
/*session_start();
include "dbconn.php";
include "navigation.php";*/
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <title></title>
    </head>
    <body>
        <div class="container">
            <h1>Liste aller Gutscheine</h1>
            <p>
                <a href="addVoucher.php" class="btn btn-success">Gutschein hinzufügen</a>
            </p>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Gültigkeit</th>
                        <th>Wert</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "select * from voucher";
                    $result = $dbconn->query($sql);
                    while ($row = $result->fetch_object()) {
                        echo "<tr>";
                        echo "<td>$row->code</td>";
                        echo "<td>$row->valid</td>";
                        echo "<td>$row->value €</td>";
                        echo "<td>$row->state</td>";
                        echo "</td>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </body>
</html>
