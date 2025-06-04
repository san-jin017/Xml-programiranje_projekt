<?php
$xml = simplexml_load_file("korisnici.xml");

session_start();
?>

<h2>Vaša rezervacija</h2>
<table>
  <thead>
    <tr><th>Ime</th><th>Prezime</th><th>Broj stola</th></tr>
  </thead>
  <tbody>
    <tr>
      <td><?= $_SESSION["ime"] ?? "?" ?></td>
      <td><?= $_SESSION["prezime"] ?? "?" ?></td>
      <td><?= $_SESSION["rezervacija"] ?? "?" ?></td>
    </tr>
  </tbody>
</table>

?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restoran - Recepti by Sanjin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Dobrodošli u restoran "Recepti by Sanjin"</h1>
        <nav>
            <a href="index.php">Početna</a>
            <a href="recepti.php">Recepti</a>
            <a href="prijava.php">Prijava korisnika</a>
        </nav>
    </header>

    <main>
        <section>
            <h2>Registrirani korisnici</h2>
            <table>
                <thead>
                    <tr><th>Ime</th><th>Prezime</th><th>Rezervacija</th></tr>
                </thead>
                <tbody>
                    <?php foreach($xml->korisnik as $korisnik): ?>
                        <tr>
                            <td><?= $korisnik->ime ?></td>
                            <td><?= $korisnik->prezime ?></td>
                            <td><?= $korisnik->rezervacija ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
<img src="slike/cover.png" alt="Pozadina" class="pozadina">
</html>
