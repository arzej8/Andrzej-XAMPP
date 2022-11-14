<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">

    </style>
</head>
<body>
    <h1>Dodaj zawody wędkarskie</h1>
    <form method="POST">
    Łowisko: <input type="number" name='id'> <br> <br>
    Data: <input type="date" name='date'> <br> <br>
    Sędzia: <input type="text" name="sedzia"> <br> <br>
    <input type="reset" value="CZYŚĆ">
    <input type="submit" name='submit' value='DODAJ'>
    </form>


    <?php
    $conn = new mysqli('localhost','root','','wedkowanie');
    $id = $_POST['id'];
    $date = $_POST['date'];
    $sedzia = $_POST['sedzia'];
    $sql = "INSERT INTO zawody_wedkarskie
    (lowisko_id, data_zawodow, sedzia)
    VALUES
    ($id, '$date','$sedzia')";
    if ($conn -> query($sql)){
        echo "Pomyślnie dodano zawody do bazy";
    }
    else {
        echo "niepoprawne dane";
    }

    $conn -> close();
    ?>
</body>
</html>