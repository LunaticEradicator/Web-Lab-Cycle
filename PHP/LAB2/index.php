<html>

<head>
  <title>Order List</title>
  <link rel="stylesheet" href="./css/style.css" />
</head>

<body>
  <div class="table">
    <table>
      <caption>
        Students Order
      </caption>
      <thead style="background-color: black; font-size: 1em">
        <tr>
          <th>Original List <span>&#8621</span></th>
          <th>Ascending List <span>&uarr;</span></th>
          <th>Descending List <span>&darr;</span></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $students = array("Messi", "Cristiano Ronaldo", "Goku", "Sukuna", "Griffith", "Vegeta");

        $ascending = $students;
        $descending = $students;

        // Sort ascending and descending arrays
        asort($ascending);
        arsort($descending);

        $rows = array_map(function ($original, $asc, $desc) {
          return [$original, $asc, $desc];  // [org[0],asc[0],desc[0]]
        }, $students, $ascending, $descending);


        // rows format
        //   $rows = [
        //     ["Messi", "Cristiano Ronaldo", "Sukuna"],
        //     ["Cristiano Ronaldo", "Goku", "Sasaki"],
        //     ["Goku", "Messi", "Goku"],
        //     ["Sukuna", "Sasaki", "Messi"],
        //     ["Sasaki", "Sukuna", "Cristiano Ronaldo"]
        // ];

        foreach ($rows as $row) {
          echo "<tr>";
          echo "<td>" . $row[0] . "</td>"; // Original list
          echo "<td>" . $row[1] . "</td>"; // Ascending list
          echo "<td>" . $row[2] . "</td>"; // Descending list
          echo "</tr>";
        }
        ?>
      </tbody>
      </tbody>
    </table>
  </div>
</body>

</html>
