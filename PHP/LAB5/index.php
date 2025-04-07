<?php
session_start();
// Database connection (Assuming this is inside a PHP file)
$dsn = "mysql:host=localhost;dbname=dbLab5";
$dbusername = "root";
$dbpassword = "";

try {
  $pdo = new PDO($dsn, $dbusername, $dbpassword);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Handle form submission (INSERT new book)
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title'], $_POST['author'], $_POST['edition'], $_POST['publisher'], $_POST['releaseDate'])) {
    $title = trim($_POST['title']);
    $author = trim($_POST['author']);
    $edition = trim($_POST['edition']);
    $publisher = trim($_POST['publisher']);
    $releaseDate = $_POST['releaseDate'];

    if (!empty($title) && !empty($author) && !empty($edition) && !empty($publisher) && !empty($releaseDate)) {
      $sql = "INSERT INTO books (title, author, edition, publisher, releaseDate) 
                VALUES (:title, :author, :edition, :publisher, :releaseDate)";
      $stmt = $pdo->prepare($sql);

      $stmt->bindParam(':title', $title);
      $stmt->bindParam(':author', $author);
      $stmt->bindParam(':edition', $edition);
      $stmt->bindParam(':publisher', $publisher);
      $stmt->bindParam(':releaseDate', $releaseDate);

      $result =  $stmt->execute();
      if ($result) {
        $_SESSION["success"] = "Book added successfully!";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;  // Stop further script execution after redirection [BUG FIX]
      }
    } else {
      echo "<script>alert('All fields are required.');</script>";
    }
  }
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['searchTitle'])) {
    $searchTitle = trim($_POST['searchTitle']);

    if ($searchTitle) {
      // $query = "SELECT title, author, edition, publisher, releaseDate FROM books WHERE title = :searchTitle;";
      // $stmt = $pdo->prepare($query);
      // $stmt->bindParam(":searchTitle", $searchTitle);
      // $stmt->execute();
      // $stmt->fetchAll(PDO::FETCH_ASSOC);

      // Better Search
      $query = "SELECT title, author, edition, publisher, releaseDate FROM books WHERE title LIKE :searchTitle";
      $stmt = $pdo->prepare($query);
      $searchTerm = "%" . $searchTitle . "%";
      $stmt->bindParam(":searchTitle", $searchTerm);
      $stmt->execute();
    } else {
      $query = "SELECT title, author, edition, publisher, releaseDate FROM books";
      $stmt = $pdo->query($query);
    }
  } else {
    $query = "SELECT title, author, edition, publisher, releaseDate FROM books";
    $stmt = $pdo->query($query);
  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Books</title>
  <link rel="stylesheet" href="./css/style.css">
  <!-- <link rel="stylesheet" type="text/css" href="./css/style.css?php echo time(); ?>" /> -->
  <script src="./script.js" defer>
    if (searchTitle !== '') {
      const searchForm = document.querySelector('.searchForm');
      searchForm.reset(); // This resets the form
    }
  </script>
</head>

<body>


  <?php
  if (isset($_SESSION['success'])) {
    // Display the title with the background image and gradient if 'success' is set
    echo '
    <h1 style="background-image: linear-gradient(
      to right,
      rgba(0, 0, 0, 0.192),
      rgba(0, 0, 0, 0.315)
    ), url(./css/6.png);">Library</h1>';
  } else {
    echo '<h1>Library</h1>';
  }
  ?>


  <div class="main">

    <div class="header">
      <form action="index.php" method="POST" class="searchForm">
        <div class="searchDiv">
          <input autocomplete="off" class="searchInput" type="text" name="searchTitle" placeholder="Search ">
          <button type="submit" class="searchBtn">
            <img src="./css/icon.png" alt="icon">
          </button>
        </div>
      </form>
      <div id="addBtn">Add Book</div>
    </div>
    <div class="addTodoConfirmation">
      <form class="addItem" action="./index.php" method="POST">
        <div class="nameDiv">
          <input
            type="text"
            name="title"
            class="nameBtn"
            placeholder="Title"
            autocomplete="off"
            autofocus
            required />
        </div>
        <div class="descriptionDiv">
          <input
            type="text"
            name="author"
            class="descriptionBtn"
            placeholder="Author"
            autocomplete="off"
            required />
        </div>
        <div class="descriptionDiv">
          <input
            type="number"
            name="edition"
            class="descriptionBtn"
            placeholder="Edition"
            autocomplete="off"
            required />
        </div>
        <div class="descriptionDiv">
          <input
            type="text"
            name="publisher"
            class="descriptionBtn"
            placeholder="Publisher"
            autocomplete="off"
            required />
        </div>
        <div class="dateDiv">
          <input
            type="date"
            name="releaseDate"
            class="dateBtn"
            placeholder="Release Date"
            required />
        </div>
        <div class="saveBtnDiv">
          <input type="submit" name="saveBtn" class="saveBtn" />
          <input
            type="button"
            name="cancelBtn"
            class="cancelBtn"
            value="Cancel" />
        </div>
      </form>
    </div>
    <div class="dataContainer">
      <div class="cardDiv">
        <div class='cardHeader'> <span>Title</span><span>Author</span><span>Editions</span><span>Publisher</span><span>Release Date</span></div>
        <?php
        if ($stmt->rowCount() > 0) {
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='card'>
                    <div class='cardPanels'>" . htmlspecialchars($row['title']) . "</span></div>
                    <div class='cardPanels'>" . htmlspecialchars($row['author']) . "</span></div>
                    <div class='cardPanels'>" . htmlspecialchars($row['edition']) . "</span></div>
                    <div class='cardPanels'>" . htmlspecialchars($row['publisher']) . "</span></div>
                    <div class='cardPanels'>" . htmlspecialchars($row['releaseDate']) . "</span></div>

                </div>";
          }
        } else {
          echo "<tr><td colspan='5'>No Book found</td></tr>";
        }
        ?>
      </div>
    </div>
  </div>
  <?php
  if (isset($_SESSION['success'])) {
    echo "<div class='successDiv' style='display: block;'>
            <p class='success'>" . $_SESSION['success'] . "</p>
          </div>";
    unset($_SESSION['success']);
  }
  ?>

</body>

</html>
