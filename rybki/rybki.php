<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border: 1px solid black;
        }
        td, th{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h3> Ryby zamieszkujące rzeki </h3>
    <?php
    $conn = new mysqli('localhost','root','','wedkowanie');
    echo "<ol>";
    $sql = "SELECT nazwa, akwen, wojewodztwo FROM ryby
    RIGHT JOIN lowisko ON ryby.id = lowisko.ryby_id
    WHERE rodzaj = 3";
    if ($result = $conn -> query($sql)){
        while ($row = $result -> fetch_array()){
            $nazwa = $row['nazwa'];
            $akwen = $row['akwen'];
            $wojewodztwo = $row['wojewodztwo'];
            echo "<li>".$nazwa." pływa w rzece ".$akwen.", ".$wojewodztwo."</li>";
        }
    }

    echo "</ol>";

    $conn -> close();

    ?>
    <h3>Ryby drapieżne naszych wód</h3>
    <?php
    $conn = new mysqli('localhost','root','','wedkowanie');
    $sql = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1;";
     if ($result = $conn -> query($sql)){
        echo "<table>
                <tr> <th> L.p. </th>
                <th> Gatunek </th>
                <th> Występowanie </th>";
        while ($row = $result -> fetch_array()){
            $id = $row['id'];
            $nazwa = $row['nazwa'];
            $wystepowanie = $row['wystepowanie'];
            echo "<tr> 
            <td> $id </td>
            <td> $nazwa </td>
            <td> $wystepowanie </td>";
        }
        echo "</table>";
    }      
    $conn -> close();
    

    ?>
</body>


</html>