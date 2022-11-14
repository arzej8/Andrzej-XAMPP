<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmy</title>
</head>
<body>
    <?php
        $conn = new mysqli ('localhost','root','','filmy');

            $sql = "SELECT DISTINCT * FROM movie_table";
            $result = $conn -> query($sql);
            echo "Ilość wierszy: ".$result -> num_rows."<br>";
            echo "<table>";
            while($row = $result -> fetch_row()){
                echo "<tr>";
                foreach ($row as $field){
                    echo "<td> $field </td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            $sql = "SELECT DISTINCT * FROM movie_table";
            $result = $conn -> query($sql);
            echo "<ul>";
            while ($row = $result -> fetch_assoc()){
                $title = $row['title'];
                $category = $row['category'];
                echo "<li> $title $category </li>";
            }
            echo "</ul>";
        $conn -> close();
    ?>
    
</body>
</html>