<?php
$students = array("Messi", "Cristiano Ronaldo", "Goku", "Sukuna", "Sasaki");

echo "Original Array (Unsorted):\n";
foreach ($students as $name) {
    echo $name . "\n";
}

asort($students);
echo "\nArray Sorted in Ascending Order (asort):\n";
foreach ($students as $name) {
    echo $name . "\n";
}

arsort($students);
echo "\nArray Sorted in Descending Order (arsort):\n";
foreach ($students as $name) {
    echo $name . "\n";
}
