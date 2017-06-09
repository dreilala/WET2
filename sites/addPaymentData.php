        <div class="container">
            <h1>Zahlungsdaten hinzufügen</h1>
            <?php
            if (!empty($_POST)) {
                $paymentmethod = $_POST['Inputpaymentmethod'];
                $number = $_POST['Inputnumber'];

                $id = $_SESSION["userid"];
                $sql = "select * from users where id = '$id'";
                $result = $dbconn->query($sql);
                $row = $result->fetch_object();

                $username = $row->username;

                $eintragPayment = "INSERT INTO paymentinfo(username, paymentmethod, number) VALUES ('$username','$paymentmethod','$number')";
                $eintragenPayment = $dbconn->query($eintragPayment);

                if ($eintragenPayment == true) {
                    header("Location: index.php?page=showOwnData");
                    exit;
                } else {
                    $userError = "Fehler beim Speichern der Daten in der DB. Bitte später nochmal versuchen";
                    $errorOccurred = 2;
                    header("Location: index.php?page=addPaymentData");
                    exit;
                }
            }
            ?>
            <form class="col-md-8" action="index.php?page=addPaymentData" method="POST">
                <div class='form-group'>
                    Zahlungsinformation
                    <select class="form-control" name='Inputpaymentmethod' required="true">
                        <option></option>
                        <option>Kreditkarte</option>
                        <option>Bankomatkarte</option>
                    </select>
                </div>
                <div class='form-group'>
                    Nummer
                    <input type='text' class='form-control' name='Inputnumber' placeholder='Nummer' required="true" pattern="[0-9]{13,16}">
                </div>
                <button type='submit' class='btn btn-default'>Hinzufügen</button>
            </form>
        </div>