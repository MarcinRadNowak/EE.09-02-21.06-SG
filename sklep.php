<!DOCTYPE html>
<html lang="PL">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warzywniak</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <div id="lewy">
            <h1>Internetowy sklep z eko-warzywami</h1>
        </div>
        <div id="prawy">
            <ol>
                <li>warzywa</li>
                <li>owoce</li>
                <li><a href="https://terapiasokami.pl">soki</a></li>
            </ol>
        </div>
    </header>
    <main>
        <div>
        <?php
            define('HOST', 'localhost');
			define('USER', 'root');
			define('PASSWORD', '');
			define('DB', 'sklep');

			$conn = new mysqli(HOST, USER, PASSWORD, DB) or 
            die('Błąd połączenia z bazą '. mysqli_connect_error()); 
            $sql = 'select nazwa, ilosc, opis, cena, zdjecie from Produkty where Rodzaje_id BETWEEN 1 and 2';
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                echo '<div id="produkt">'.'<img src="'.$row['zdjecie'].'">'.
                '<h5>'.$row['nazwa'].'</h5>'.'<p>'."opis: ".$row['opis'].'</p>'.
                '<p>'."na stanie: ".$row['ilosc'].'</p>'.'<h2>'.$row['cena']." zł".'</h2>'.'</div>';
            }    
        ?>
        </div>
    </main>
    <footer>
        <form action="" method="post">
            Nazwa:<input type="text" name="nazwa">
            Cena:<input type="text" name="cena">
            <input type="submit" value="Dodaj produkt">
            <?php
                $nazwa = $_POST['nazwa'];
                $cena = $_POST['cena'];
                $sql2 = "insert into produkty (Rodzaje_id, Producenci_id, nazwa, ilosc, opis, cena, zdjecie) values('1', '4', '$nazwa', '10', '', '$cena', 'owoce.jpg')";
                $result2 = mysqli_query($conn, $sql2);
                if ($result){
                    echo 'Udało się!';
                }
                else {
                    echo 'Nie udało się!';
                }
                mysqli_close($conn)
            ?>
            <p>Stronę wykonał: MN PESEL0000000</p>
        </form>
    </footer>
</body>
</html>
