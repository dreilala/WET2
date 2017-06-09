<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (!empty($_POST)) {
            $name = $_POST["InputName"];
            $description = $_POST["InputDescription"];
            $price = $_POST["InputPrice"];


            $dateiname = $_FILES['mypicture']['name'];
            if (!$_FILES['mypicture']['error']) {
                move_uploaded_file($_FILES['mypicture']['tmp_name'], "images/$dateiname");
            }

            $sql = "INSERT INTO products (Name, Description, pathtopicture, price) VALUES ('$name','$description','$dateiname','$price')";
            $result = $dbconn->query($sql);
            if ($result == true) {
                header("Location: index.php?page=ListProducts");
                exit;
            }
        }
        ?>
        <div class="container">
            <h1>Produkt hinzufügen</h1>
            <form class='col-md-8' action='index.php?page=AddProducts' method='Post' enctype="multipart/form-data">
                <div class='form-group'>
                    Name
                    <input type='text' class='form-control' name='InputName' placeholder='Name' required="true">
                </div>
                <div class='form-group'>
                    Beschreibung
                    <input type='text' class='form-control' name='InputDescription' placeholder='Beschreibung' required="true">
                </div>
                <div class='form-group'>
                    Preis
                    <input type='text' class='form-control' name='InputPrice' placeholder='Preis' required="true">
                </div>
                <div class='form-group'>
                    Bild
                    <input type="file" name="mypicture" accept="image/*" required="true">
                </div>
                <button type='submit' class='btn btn-success'>Hinzufügen</button>
            </form>
            <div class="col-md-8">
            <a class="btn btn-default" href="index.php?page=ListProducts">Zurück</a>
            </div>
        </div>
    </body>
</html>
