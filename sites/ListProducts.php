<div class="container">
    <h1>Produkt hinzufügen</h1>
    <a class="btn btn-default" href="index.php?page=AddProducts">Hinzufügen</a>
    <br>

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
            echo "<td>$row->price</td>";
            echo "<td>$row->pathtopicture</td>";
            echo '<td><a class="btn btn-default" href="index.php?page=ChangeProducts&name=' . $row->Name . '">Bearbeiten</a><a class="btn btn-default" href="DeleteProduct.php?name=' . $row->Name . '">Löschen</a></td>';
            echo "</td>";
        }
        echo "</table>";
    }
    $dbconn->close();
    ?>
</div>
