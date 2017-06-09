        <div class="container">
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
                echo "<td>Status</td>";
                echo "<td>Aktion</td>";
                echo "</td>";
                while ($row = $result->fetch_object()) {
                    if ($row->id > 1) {
                        echo "<tr>";
                        echo "<td>$row->vorname</td>";
                        echo "<td>$row->nachname</td>";
                        echo "<td>$row->state</td>";
                        echo '<td><a class="btn btn-default" href="ChangeStateCustomer.php?action=deactivate&id=' . $row->id . '">Deaktivieren</a><a class="btn btn-default" href="ChangeStateCustomer.php?action=activate&id=' . $row->id . '">Aktivieren</a></td>';
                        echo "</td>";
                    }
                }
                echo "</table>";
            }
            $dbconn->close();
            ?>
        </div>
