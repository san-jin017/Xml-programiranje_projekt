<?php
$xml = simplexml_load_file("korisnici.xml");
$poruka = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kor_ime = $_POST["username"];
    $lozinka = $_POST["password"];

    foreach ($xml->korisnik as $korisnik) {
        if ($korisnik->username == $kor_ime && $korisnik->password == $lozinka) {
            
            session_start();
            $_SESSION["ime"] = (string)$korisnik->ime;
            $_SESSION["prezime"] = (string)$korisnik->prezime;
            $_SESSION["stol"] = (string)$korisnik->stol;
            $_SESSION["rezervacija"] = (string)$korisnik->stol;

            header("Location: index1.php");
            exit();
        }
    }

    $poruka = "Pogrešno korisničko ime ili lozinka.";
}
?>


<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="UTF-8">
  <title>Prijava</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container mt-4">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Rezervacija stola u restoranu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Početna</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="recepti.php">Recepti</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="prijava.php">Rezervacija</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

  <div class="login-box">
    <h2>Prijava korisnika</h2>
    <form method="POST" action="prijava.php">
      <label>Korisničko ime:</label>
      <input type="text" name="username" required>
      <label>Lozinka:</label>
      <input type="password" name="password" required>
      <input type="submit" value="Prijavi se">
    </form>
    <p><?= $poruka ?></p>
  </div>
</body>
<img src="slike/cover.png" alt="Pozadina" class="pozadina">
</html>
