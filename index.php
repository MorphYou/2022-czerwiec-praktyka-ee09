<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aktualizacja danych sql</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Sieci komputerowe</h1>
    </header>
    <main>
        <article>
            <h2>Aktualizacja i zamówienia materiałów</h2>
            <p>Do wenętrznego użytku firmy</p>
            <img src="obraz.png" alt="sieć komputerowa">
        </article>
        <aside>
            <table>
                    <tr>
                        <th>Produkt</th>
                        <th>Jednostka</th>
                        <th>Dostępna ilość</th>
                        <th>Aktualizacja</th>
                        <th>Zamówienie</th>
                    </tr>
            <?php
                $mysqli = new mysqli("localhost","root","","dzis");

                if ($mysqli -> connect_errno) {
                echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                exit();
                }

                $sql = "SELECT materialy.id, nazwa, ilosc, nazwaJedn FROM materialy INNER JOIN jednostki ON materialy.Jednostki_id = jednostki.id";
                $result = $mysqli -> query($sql);

                // Associative array
                while($row = mysqli_fetch_array($result)){
                    echo '<tr>';
                    echo '<td>'.$row['nazwa'].'</td>';
                    echo '<td>'.$row['nazwaJedn'].'</td>';
                    echo '<td>'.$row['ilosc'].'</td>';
                    echo '<td><button onclick="myFunction('.$row['id'].','.$row['ilosc'].')">Aktualizacja</button></td>';
                    echo '<td><button onclick="zamow('.$row['id'].','.$row['ilosc'].')">Zamów</button></td>';
                    echo '</tr>';
                }
                $mysqli -> close();
                ?>
            </table>
        </aside>
    </main>
    <footer>
        <a target="_blank" href="http://sieci.pl/">Nasza strona internetowa</a>
        <p>00000000000</p>
    </footer>
</body>
<script>
function myFunction(id, i) {
  let text;
  let count = prompt("Podaj ilość w magazynie:", i);
  if (count == null || count == "") {
    text = i;
  } else {
    text = `?id=${id}&i=${count}`;
  }
  location.href=`aktualizuj.php${text}`;
}


    function zamow(id1, i1) {
  let text1;
  let count1 = prompt("Podaj ilość zamowienia:", "0");
  if (count1 == null || count1 == "") {
    text1 = 0;
  } else if (count1 > i1){
    text1 = 0;
  } else{
    count1 = i1 - count1;
    text1 = `?id=${id1}&i=${count1}`;
  }
  location.href=`zamow.php${text1}`;
}
</script>
</html>
