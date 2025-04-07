<html>

<head>
  <title>Cricket</title>
  <link rel="stylesheet" href="./css/style.css" />
</head>

<body>
  <div class="table">
    <!-- <h1>Cricket Players</h1> -->
    <div class="players">
      <div class="bowlers">
        <table>
          <!-- <caption>
        Cricket Players
      </caption> -->
          <thead style="background-color: black; font-size: 1em">
            <tr>
              <th>Bowlers</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $students = array("Pat Cummins", "Shane Warne", "Muttiah Muralitharan", "Dale Steyn");

            foreach ($students as $row) {
              echo "<tr>";
              echo "<td>" . $row . "</td>"; // Original list
              echo "</tr>";
            }
            ?>
          </tbody>
          </tbody>
        </table>
      </div>
      <div class="batters">
        <table>
          <!-- <caption>
        Cricket Players
      </caption> -->
          <thead style="background-color: black; font-size: 1em">
            <tr>
              <th>Batters</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $students = array("Sachin Tendulkar", "Rahul Dravid", "Sanju Samson", "Ricky Ponting");

            foreach ($students as $row) {
              echo "<tr>";
              echo "<td>" . $row . "</td>"; // Original list
              echo "</tr>";
            }
            ?>
          </tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>
