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
        
        $Name = $_GET['name'];
        
        if (!empty($_POST)) {
            $name = $_POST["InputName"];
            $description = $_POST["InputDescription"];
            $price = $_POST["InputPrice"];


            $dateiname = $_FILES['mypicture']['name'];
            if (!$_FILES['mypicture']['error']) {
                move_uploaded_file($_FILES['mypicture']['tmp_name'], "images/$dateiname");
            }

            $sql = "update products set Description='$description', pathtopicture='$dateiname', price='$price' where Name='$name'";
            $result = $dbconn->query($sql);
            if ($result == true) {
                header("Location: index.php?page=ListProducts");
                exit;
            }
        }
        else {

        $sql = "select * from products where Name = '$Name'";
        $result = $dbconn->query($sql);
        $row = $result->fetch_object();

        $Name = $row->Name;
        $Description = $row->Description;
        $price = $row->price;
    }
        ?>
        <div class="container">
            <h1>Produkt hinzufügen</h1>
            <form class='col-md-8' action='index.php?page=ChangeProducts' method='Post' enctype="multipart/form-data">
                <div class='form-group'>
                    Name
                    <input type='text' class='form-control' name='InputName' placeholder='Name' value="<?php echo $Name; ?>" readonly="true">
                </div>
                <div class='form-group'>
                    Beschreibung
                    <input type='text' class='form-control' name='InputDescription' placeholder='Beschreibung' value="<?php echo $Description; ?>" required="true">
                </div>
                <div class='form-group'>
                    Preis
                    <input type='text' class='form-control' name='InputPrice' placeholder='Preis' value="<?php echo $price; ?>" required="true">
                </div>
                <div class='form-group'>
                    Bild
                    <input type="file" name="mypicture" accept="image/*" required="true">
                </div>
                <button type='submit' class='btn btn-default'>Ändern</button>
            </form>
        </div>
    </body>
</html>
