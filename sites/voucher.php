<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
/* session_start();
  include "dbconn.php";
  include "navigation.php"; */
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Gutscheine</title>
    </head>
    <body>
        <div class="container">
            <h1>Gutschein hinzufügen</h1>
            <form action='addVoucher.php' method='Post'>
                <div class='form-group'>
                    Gutscheinwert
                    <input type='number' class='form-control' name='Inputvalue' placeholder='Wert' required="true">
                </div>
                <button type='submit' class='btn btn-success'>Gutschein hinzufügen</button>
            </form>
            <br>
            <h1>Liste aller Gutscheine</h1>
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
                    $year = date("Y-m-d");
                    if ($row->valid == $year) {
                        $id = $row->id;
                        $sql = "update voucher set state = 'abgelaufen' where id='$id'";
                        $result = $dbconn->query($sql);
                    } else {
                        echo "<tr>";
                        echo "<td>$row->code</td>";
                        echo "<td>$row->valid</td>";
                        echo "<td>$row->value €</td>";
                        echo "<td>$row->state</td>";
                        echo "</td>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
