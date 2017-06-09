<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Produkte bearbeiten</title>
    </head>
    <body>
        <div class="container">
            <h1>Liste aller Produkte</h1>

            <?php
            if ($dbconn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } else {
                $sql = "select * from products";
                $result = $dbconn->query($sql);

                echo "<table class='table table-striped'>";
                echo "<tr>";
                echo "<td>Name</td>";
                echo "<td>Beschreibung</td>";
                echo "<td>Preis</td>";
                echo "<td>Bild</td>";
                echo "<td>Aktion</td>";
                echo "</td>";
                while ($row = $result->fetch_object()) {
                    echo "<tr>";
                    echo "<td>$row->Name</td>";
                    echo "<td>$row->Description</td>";
                    echo "<td>$row->pathtopicture</td>";
                    echo "<td>$row->price</td>";
                    //echo '<td><a class="btn btn-default" href="ChangeStateCustomer.php?action=deactivate&id=' . $row->id . '">Deaktivieren</a><a class="btn btn-default" href="ChangeStateCustomer.php?action=activate&id=' . $row->id . '">Aktivieren</a></td>';
                    echo '<td><a class="btn btn-default" href="ChangeStateCustomer.php?action=change">Bearbeiten</a><a class="btn btn-default" href="ChangeStateCustomer.php?action=delete">Löschen</a></td>';
                    echo "</td>";
                }
                echo "</table>";
            }
            $dbconn->close();
            ?>
        </div>
    </body>
</html>
