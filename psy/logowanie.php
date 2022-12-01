<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel='stylesheet' type='text/css' href='styl4.css'>
</head>
<body>
    <header>
        <h1>Forum wielbicieli psów</h1>
    </header>
    <section id='left'>
        <img src="obraz.jpg" alt="foksterier">
    </section>
    <section id='rightUp'>
        <h2>Zapisz się</h2>
        <form method='POST'>
        Login: <input type="text" name='login'><br>
        Hasło: <input type="password" name='pass'><br>
        Powtórz hasło: <input type="password" name='passR'><br>
        <input type="submit" name='submit' value='Zapisz'>
        </form><p>
        <?php
            $conn = new mysqli('localhost','root','','baza1');
            

            if(empty($_POST['login']) || empty($_POST['pass']) || empty($_POST['passR'])){
                echo " Uzupełnij wszystkie pola.";
            }
            else if($_POST['pass'] != $_POST['passR']){
                echo "Hasła nie zgadzają się";
            }
            else{
                $login = $_POST['login'];
                $pass = sha1($_POST['pass']);
                $passR = sha1($_POST['passR']);
                $sql = "SELECT login FROM uzytkownicy WHERE login like '$login'";
                $result = $conn -> query($sql);
                if($result -> num_rows > 0){
                    echo "Login już występuje w bazie. nie dodano konta";
                }
                else{
                    $password = sha1($pass);
                    $sql2 = "INSERT INTO uzytkownicy (login, haslo) VALUES ('$login',$password');";
                    if ($conn -> query($sql2)){
                        echo "Konto zostało dodane.";
                    }
                }
            }

            
           

            $conn -> close();
        ?>
        </p>
    </section>
    <section id='rightDown'>
        <h2>Zapraszamy wszytkich</h2>    
        <ol>
            <li>Właścicieli psów</li>
            <li>Weterynarzy</li>
            <li>Tych, co chcą kupić psa</li>
            <li>Tych, co lubią psy</li>
        </ol>
        <a href="regulamin.html">Przeczytaj regulamin forum</a>
    </section>
     <footer>Stronę wykonał: 0000000000</footer>
</body>
</html>