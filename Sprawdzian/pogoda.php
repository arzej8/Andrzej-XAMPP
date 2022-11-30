<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table style='text-align: center'>
        <tr>
            <th>DATA</th>
            <th>TEMPERATURA W NOCY</th>
            <th>TEMPERATURA W DZIEŃ</th>
            <th>OPADY</th>
            <th>CIŚNIENIE</th>
        </tr>
        <?php
            $conn = new mysqli('localhost','root','','prognoza');
            $sql = "SELECT * from pogoda WHERE miasta_id = 1 ORDER BY data_prognozy asc;";
            $res = $conn -> query($sql);
            
            while($row = $res -> fetch_assoc()){
                $data = $row['data_prognozy'];
                $temperatura_noc = $row['temperatura_noc'];
                $temperatura_dzien = $row['temperatura_dzien'];
                $opady= $row['opady'];
                $cisnienie = $row['cisnienie'];
                echo "<tr>";
                echo "<td> $data </td>";
                echo "<td> $temperatura_noc </td>";
                echo "<td> $temperatura_dzien </td>";
                echo "<td> $opady </td>";
                echo "<td> $cisnienie </td>";
                echo "</td>";   
            }


            $conn -> close();
        ?>
        <form method='POST'>
            <p>podaj id miasta:</p>
            <input type='number' name='miasta_id'><br>
            <p>podaj datę ('YYYY-MM-DD'):</p>
            <input type="text" name='data_prognozy'><br>
            <p>podaj temperaturę w dzień:</p>
            <input type="number" name='temperatura_dzien'><br>
            <input type="submit" name='submit' value="Dodaj">
            <?php
            $conn = new mysqli ('localhost','root','','prognoza');
            $miasta_id = $_POST['miasta_id'];
            $data_prognozy = $_POST['data_prognozy'];
            $temperatura_dzien = $_POST['temperatura_dzien'];
            $sql = "INSERT INTO pogoda (miasta_id, data_prognozy, temperatura_dzien)
            VALUES ($miasta_id,'$data_prognozy',$temperatura_dzien);";
            if ($conn -> query($sql)){
                echo "Dodano pogodę do bazy";
            };


            $conn -> close();
            ?>

        </form>
    </table>
</body>
</html>


