<?php
session_start();

//do wyswietlenia w formularzu mozliwosci wyboru piorytetu
function displayPrioryty () {
    echo 'Ustaw Priorytet:'.'<br>';
    echo '<select name="prioryty" class="form-control">
            <option value="low">Niski</option>
            <option value="high">Wysoki</option>
            <option value="critical">Krytyczny</option>
          </select>';
    echo '<br>';
}

//do wyswietlenia w formularzu mozliwosci ustawienia terminu
function displayDate () {
    echo 'Podaj termin:'.'<br>';
    echo '<input type="datetime-local" name="deadline">';
    echo '<br><br><br>';
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Warsztaty nr 2 - Aplikacja Todois</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container" style="margin-top: 25px">
    <form action="index.php" method="POST">
        Nazwa zadania:
        <input class="form-control" type="text" name="taskName" title="Uzupelnij nazwe zadania">
        Treść zadania:
        <textarea class="form-control" rows="3" name="content" title="Uzupelnij tresc zadania"></textarea><br>
        <?php
        if (isset($_POST['addPriorytyTask'])) {
            displayPrioryty();
        }
        if (isset($_POST['addDatePriorytyTask'])) {
            displayPrioryty();
            displayDate();
        }
        ?>

        <input type="submit" class="btn btn-success" name="save" value="Dodaj">
    </form>
</div>
</body>
</html>
