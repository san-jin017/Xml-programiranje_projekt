<?php
$xml = simplexml_load_file("ponuda.xml");
?>
<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="UTF-8">
  <title>Restoran Sanjin - Ponuda dana</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>



  <header>
    <h1>Dobrodošli u restoran Sanjin</h1>
    <nav>
      <a href="index.php">Početna</a>
      <a href="recepti.php">Recepti</a>
      <a href="prijava.php">Rezervacija</a>
      
    </nav>
  </header>
  <main>
    <h2>Ponuda dana</h2>
    <table>
      <thead>
        <tr><th>Jelo</th><th>Opis</th><th>Cijena</th></tr>
      </thead>
      <tbody>
        <?php foreach ($xml->jelo as $jelo): ?>
          <tr>
            <td><?= $jelo->naziv ?></td>
            <td><?= $jelo->opis ?></td>
            <td><?= $jelo->cijena ?> EUR</td>
          </tr>
          
          
        <?php endforeach; ?>
      </tbody>
    </table>
  </main>
</body>
<img src="slike/cover1.png" alt="Pozadina" class="pozadina">
</html>