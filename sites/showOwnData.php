<?php
/*session_start();
include "config/settings.php";*/
//include "classes/User.Class.php";
?>
        <div class="container">
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
                echo "<table class='table table-bordered'>";
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
                echo "<p><a href='index.php?page=changeOwnData' class='btn btn-default'>Bearbeiten</a></p>";
                echo "<p><a href='index.php?page=changePassword' class='btn btn-danger'>Passwort ändern</a></p>";
                echo "<p><a href='index.php?page=addPaymentData' class='btn btn-success'>Zahlungsdaten hinzufügen</a></p>";
                //echo "</div>";
            }
            $dbconn->close();
            ?>
        </div>
