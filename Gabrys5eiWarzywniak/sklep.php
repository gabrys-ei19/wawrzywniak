<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Warzywniak</title>
    <link rel='stylesheet' type='text/css' media='screen' href='styl2.css'>
</head>
<body>
    <header>
        <aside>
            <h1>Internetowy sklep z eko-warzywami</h1>
        </aside>
        <nav>
            <ol>
                <li>owoce</li>
                <li>warzywa</li>
                <li><a href="https://terapiasokami.pl/" target="blank">soki</a></li>
            </ol>
        </nav>
    </header>
    <main>
        <?php
            @$nazwa = $_POST['nazwa'];
            @$cena = $_POST['cena'];

            if (isset($nazwa) && isset($cena) && $nazwa != NULL && $cena != NULL){
                $link = mysqli_connect("localhost", "root", "", "dane2");

                $zap = 'INSERT INTO `produkty`(`Rodzaje_id`, `Producenci_id`, `nazwa`, `ilosc`, `opis`, `cena`, `zdjecie`) VALUES (1,4,"'.$nazwa.'",10,"","'.$cena.'","owoce.jpg");';

                $wyn = mysqli_query($link, $zap);
                mysqli_close($link);
                $nazwa = NULL;
                $cena = NULL;
                $_POST = NULL;
            };
        ?>
        <?php
            $link = mysqli_connect("localhost", "root", "", "dane2");

            $zap = 'SELECT nazwa, ilosc, opis, cena, zdjecie FROM produkty WHERE Rodzaje_id BETWEEN 1 AND 2;';

            $wyn = mysqli_query($link, $zap);
            mysqli_close($link);


            foreach($wyn as $wyn){
                echo ("<article>");
                echo ('<img src="materialy/'.$wyn['zdjecie'].'" alt="warzywniak">');
                echo ('<h5>'.$wyn['nazwa'].'</h5>');
                echo ('<php>opis: '.$wyn['opis'].'</php>');
                echo ('<p>na stanie: '.$wyn['ilosc'].'</p>');
                echo ('<h2>'.$wyn['cena'].'zł</h2>');
                echo ("</article>");
            };
        ?>
    </main>
    <footer>
        <form action="sklep.php" method="post">
            <label for="nazwa">Nazwa: <input type="text" name="nazwa" id="nazwa"></label>
            <label for="cena">Cena: <input type="text" name="cena" id="cena"></label>
            <input type="submit" value="Dodaj produkt">
        </form>
        <p>Stronę wykonał: 12345678910</p>
    </footer>
</body>
</html>
