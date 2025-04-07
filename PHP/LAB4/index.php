<?php
require_once "./dbh.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manga</title>
  <!-- <link rel="stylesheet" href="./css/style.css"> -->
  <link rel="stylesheet" type="text/css" href="./css/style.css?php echo time(); ?>" />

  <script src="./script.js" defer></script>
</head>

<body>
  <!-- Button to Fetch Data -->
  <div class="full"></div>
  <div id="fetchDataBtn">Fetch Data</div>

  <!-- Loading Screen -->
  <div class="loadingScreen">
    <div class="spinner"></div>
    <h2 class="spinnerText">Loading...</h2>
  </div>

  <!-- Data Container -->
  <div class="dataContainer">
    <h1>Anime</h1>
    <div class="cardDiv">
      <?php
      if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo "<div class='card'>
                    <div class='cardPanels'>" . 'Anime: ' . htmlspecialchars($row['anime']) . "</div>
                    <div class='cardPanels'>" . 'Studio: ' . htmlspecialchars($row['studio']) . "</div>
                    <div class='cardPanels'>" . 'Author: ' . htmlspecialchars($row['author']) . "</div>
                    <div class='cardPanels'>" . 'Release Date: ' . htmlspecialchars($row['releaseDate']) . "</div>
                    <div class='cardPanels'>" . 'Rating: ' . htmlspecialchars($row['rating']) . "</div>
                </div>";
        }
      } else {
        echo "<tr><td colspan='5'>No data found</td></tr>";
      }
      ?>
    </div>
  </div>
</body>

</html>
