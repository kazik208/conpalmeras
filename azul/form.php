<?php
if (count($_POST))
{
	////////// USTAWIENIA //////////
	$email = 'jurek.ryll@gmail.com';	// Adres e-mail adresata
	$subject = 'temat';	// Temat listu
	$message = 'Dziękujemy za wysłanie formularza';	// Komunikat
	$error = 'Wystąpił błąd podczas wysyłania formularza';	// Komunikat błędu
	$charset = 'utf-8';	// Strona kodowa
	//////////////////////////////
	
	$head =
		"MIME-Version: 1.0\r\n" .
		"Content-Type: text/plain; charset=$charset\r\n" .
		"Content-Transfer-Encoding: 8bit";
	$body = '';
	foreach ($_POST as $name => $value)
	{
		if (is_array($value))
		{
			for ($i = 0; $i < count($value); $i++)
			{
				$body .= "$name=" . (get_magic_quotes_gpc() ? stripslashes($value[$i]) : $value[$i]) . "\r\n";
			}
		}
		else $body .= "$name=" . (get_magic_quotes_gpc() ? stripslashes($value) : $value) . "\r\n";
	}
	echo mail($email, "=?$charset?B?" . base64_encode($subject) . "?=", $body, $head) ? $message : $error;
}
else
{
?><!-- Podstawowe pole tekstowe -->
<input name="Imię">Podaj swoje imię<br>
<input name="Nazwisko">Podaj swoje nazwisko
<!-- Pole typu RADIO -->
<p>Podaj swoją płeć:</p>
<input type="radio" name="Płeć" value="Kobieta">Kobieta
<input type="radio" name="Płeć" value="Mężczyzna">Mężczyzna
<!-- Pole typu RADIO -->
<p>Ile masz lat?</p>
<input type="radio" name="Wiek" value="mniej niż 15">mniej niż 15<br>
<input type="radio" name="Wiek" value="15-19">15-19<br>
<input type="radio" name="Wiek" value="20-29">20-29<br>
<input type="radio" name="Wiek" value="30-39">30-39<br>
<input type="radio" name="Wiek" value="40-60">40-60<br>
<input type="radio" name="Wiek" value="więcej niż 60">więcej niż 60 
<!-- Pole typu CHECKBOX -->
<p>Jaką lubisz muzykę (możesz zaznaczyć więcej możliwości)?</p>
<input type="checkbox" name="Muzyka" value="Rock">Rock<br>
<input type="checkbox" name="Muzyka" value="Heavy Metal">Heavy Metal<br>
<input type="checkbox" name="Muzyka" value="Pop">Pop<br>
<input type="checkbox" name="Muzyka" value="Techno">Techno<br>
<input type="checkbox" name="Muzyka" value="Muzyka poważna">Muzyka poważna<br>
<input type="checkbox" name="Muzyka" value="Inna">Inna (podaj jaka):
<input name="Muzyka">
<!-- Lista rozwijalna (typ podstawowy) z zaznaczoną opcją domyślną -->
<p>Jakiej przeglądarki internetowej używasz?</p>
<select name="Przeglądarka">
	<option selected>Internet Explorer</option>
	<option>Netscape</option>
	<option>Opera</option>
	<option>Mozilla</option>
	<option>Inna</option>
</select>
<!-- Lista rozwijalna (typ rozszerzony) z zaznaczoną opcją domyślną i zmniejszoną wysokością -->
<p>Jakie znasz systemy operacyjne (możesz wybrać kilka opcji trzymając klawisz Ctrl)?</p>
<select name="System operacyjny" multiple size="3">
	<option selected>Dos</option>
	<option>Windows</option>
	<option>Linux</option>
	<option>Inny</option>
</select>
<!-- Pole komentarza (o powiększonych rozmiarach oraz z tekstem domyślnym) -->
<p>Podaj swój komentarz:</p>
<textarea name="Komentarz" cols="50" rows="10">Proszę, wpisz tutaj jakiś komentarz...</textarea>
<br><br><br>
<!-- Przycisk WYŚLIJ -->
<input type="submit" value="Wyślij formularz">
<!-- Przycisk WYCZYŚĆ DANE -->
<input type="reset" value="Wyczyść dane">
</div>
</form>
<?php
}
?>