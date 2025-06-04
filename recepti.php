<?php
$xml = simplexml_load_file("recepti.xml");
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Recepti</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    
    
</head>
<body>


   
<div class="container mt-4">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Recepti</a>
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



<div class="container mt-5">
    <h1 class="text-center mb-4">Recepti by <?= $xml['autor']; ?> </h1>

    <?php foreach ($xml->recept as $recept): ?>
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h3><?= $recept->naziv; ?></h3>
            </div>

            

                <div class="card-body">
    <?php if (isset($recept->slika)): ?>
        <img src="<?= $recept->slika; ?>" alt="<?= $recept->naziv; ?>" class="img-fluid mb-3" style="max-height: 300px; object-fit: cover; width: 100%;">
    <?php endif; ?>

                <h5>Sastojci:</h5>
                <ul>
                    <?php foreach ($recept->sastojci->sastojak as $s): ?>
                        <li><?= $s; ?></li>
                    <?php endforeach; ?>
                </ul>
                <h5>Priprema:</h5>
                <p><?= $recept->priprema; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
<img src="slike/cover.png" alt="Pozadina" class="pozadina">
</html>
