<?php

// $jml = $_GET['jml'];
// echo "<table border=1>\n";
// for ($a = $jml; $a > 0; $a--)
// {
//   echo "<tr>\n";
//   for ($b = $a; $b > 0; $b--)
//   {
//     echo "<td>$b</td>";
//   }
//   echo "</tr>\n";
// }
// echo "</table>";

$jml = (int) $_GET['jml'];

echo "<table border='1' cellpadding='5' cellspacing='0'>";

for ($a = $jml; $a > 0; $a--) {

    // menghitung jumlah total
    $total = 0;
    for ($b = $a; $b > 0; $b--) {
        $total += $b;
    }

    // baris total
    echo "<tr>";
    echo "<td colspan='$a'><b>TOTAL: $total</b></td>";
    echo "</tr>";

    // baris angka
    echo "<tr>";
    for ($b = $a; $b > 0; $b--) {
        echo "<td>$b</td>";
    }
    echo "</tr>";
}

echo "</table>";

?>
