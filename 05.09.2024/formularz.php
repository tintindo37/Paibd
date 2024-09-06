<!DOCTYPE html>
<html>
<head>
  <title>Formularz rejestracyjny</title>
</head>
<body>
 
<h1>Formularz rejestracyjny</h1>
 
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 
  <label for="nazwisko">Podaj swoje nazwisko:</label><br>
  <input type="text" id="nazwisko" name="nazwisko" value="<?php if (isset($_POST['nazwisko'])) echo $_POST['nazwisko']; ?>">
  <br><br>
 
  <label for="imie">Podaj swoje imię:</label><br>
  <input type="text" id="imie" name="imie" value="<?php if (isset($_POST['imie'])) echo $_POST['imie']; ?>">
  <br><br>
 
  <label for="plec">Wybierz płeć:</label><br>
  <input type="radio" id="plec" name="plec" value="Kobieta" <?php if (isset($_POST['plec']) && $_POST['plec'] == 'Kobieta') echo 'checked'; ?>>
  <label for="plec">Kobieta</label><br>
  <input type="radio" id="plec" name="plec" value="Mężczyzna" <?php if (isset($_POST['plec']) && $_POST['plec'] == 'Mężczyzna') echo 'checked'; ?>>
  <label for="plec">Mężczyzna</label><br><br>
 
  <label for="wiek">Podaj wiek:</label><br>
  <input type="number" id="wiek" name="wiek" value="<?php if (isset($_POST['wiek'])) echo $_POST['wiek']; ?>">
  <br><br>
 
  <label for="email">Podaj adres e-mail:</label><br>
  <input type="email" id="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
  <br><br>
 
  <label for="wyksztalcenie">Wybierz wykształcenie:</label><br>
  <input type="radio" id="wyksztalcenie" name="wyksztalcenie" value="Podstawowe" <?php if (isset($_POST['wyksztalcenie']) && $_POST['wyksztalcenie'] == 'Podstawowe') echo 'checked'; ?>>
  <label for="wyksztalcenie">Podstawowe</label><br>
  <input type="radio" id="wyksztalcenie" name="wyksztalcenie" value="Średnie" <?php if (isset($_POST['wyksztalcenie']) && $_POST['wyksztalcenie'] == 'Średnie') echo 'checked'; ?>>
  <label for="wyksztalcenie">Średnie</label><br>
  <input type="radio" id="wyksztalcenie" name="wyksztalcenie" value="Wyższe" <?php if (isset($_POST['wyksztalcenie']) && $_POST['wyksztalcenie'] == 'Wyższe') echo 'checked'; ?>>
  <label for="wyksztalcenie">Wyższe</label><br><br>
 
  <label for="jezyki">Wybierz języki:</label><br>
  <select id="jezyki" name="jezyki[]" multiple>
    <option value="Angielski" <?php if (isset($_POST['jezyki']) && in_array('Angielski', $_POST['jezyki'])) echo 'selected'; ?>>Angielski</option>
    <option value="Niemiecki" <?php if (isset($_POST['jezyki']) && in_array('Niemiecki', $_POST['jezyki'])) echo 'selected'; ?>>Niemiecki</option>
    <option value="Francuski" <?php if (isset($_POST['jezyki']) && in_array('Francuski', $_POST['jezyki'])) echo 'selected'; ?>>Francuski</option>
    <option value="Włoski" <?php if (isset($_POST['jezyki']) && in_array('Włoski', $_POST['jezyki'])) echo 'selected'; ?>>Włoski</option>
    <option value="Rosyjski" <?php if (isset($_POST['jezyki']) && in_array('Rosyjski', $_POST['jezyki'])) echo 'selected'; ?>>Rosyjski</option>
    <option value="Hiszpański" <?php if (isset($_POST['jezyki']) && in_array('Hiszpański', $_POST['jezyki'])) echo 'selected'; ?>>Hiszpański</option>
  </select>
  <br><br>
 
  <label for="zainteresowania">Wybierz zainteresowania:</label><br>
  <input type="checkbox" id="zainteresowania" name="zainteresowania[]" value="Motoryzacja" <?php if (isset($_POST['zainteresowania']) && in_array('Motoryzacja', $_POST['zainteresowania'])) echo 'checked'; ?>>
  <label for="zainteresowania">Motoryzacja</label><br>
  <input type="checkbox" id="zainteresowania" name="zainteresowania[]" value="Sport" <?php if (isset($_POST['zainteresowania']) && in_array('Sport', $_POST['zainteresowania'])) echo 'checked'; ?>>
  <label for="zainteresowania">Sport</label><br>
  <input type="checkbox" id="zainteresowania" name="zainteresowania[]" value="Muzyka" <?php if (isset($_POST['zainteresowania']) && in_array('Muzyka', $_POST['zainteresowania'])) echo 'checked'; ?>>
  <label for="zainteresowania">Muzyka</label><br>
  <input type="checkbox" id="zainteresowania" name="zainteresowania[]" value="Taniec" <?php if (isset($_POST['zainteresowania']) && in_array('Taniec', $_POST['zainteresowania'])) echo 'checked'; ?>>
  <label for="zainteresowania">Taniec</label><br>
  <input type="checkbox" id="zainteresowania" name="zainteresowania[]" value="Gry komputerowe" <?php if (isset($_POST['zainteresowania']) && in_array('Gry komputerowe', $_POST['zainteresowania'])) echo 'checked'; ?>>
  <label for="zainteresowania">Gry komputerowe</label><br>
  <input type="checkbox" id="zainteresowania" name="zainteresowania[]" value="Inne" <?php if (isset($_POST['zainteresowania']) && in_array('Inne', $_POST['zainteresowania'])) echo 'checked'; ?>>
  <label for="zainteresowania">Inne (podaj jakie):</label><br>
  <input type="text" id="inne" name="inne" value="<?php if (isset($_POST['inne'])) echo $_POST['inne']; ?>">
  <br><br>
 
  <label for="uwagi">Wpisz swoje uwagi:</label><br>
  <textarea id="uwagi" name="uwagi"><?php if (isset($_POST['uwagi'])) echo $_POST['uwagi']; ?></textarea>
  <br><br>
 
  <input type="checkbox" id="zgoda" name="zgoda" value="1" <?php if (isset($_POST['zgoda']) && $_POST['zgoda'] == '1') echo 'checked'; ?>>
  <label for="zgoda">Zgadzam się na przetwarzanie moich danych osobowych</label><br><br>
 
  <input type="submit" value="Wyślij">
  <input type="reset" value="Wyczyść">
 
</form>
 
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['zgoda']) && $_POST['zgoda'] == '1') {
    echo 'Dziękujemy za rejestrację!';    
  } else {
    echo 'Proszę zaakceptować regulamin!';
  }
}
?>
 
</body>
</html>