<?php
  $conn = new mysqli("localhost", "root", "", "testdb");

  $showTable = false;
  $nama   = '';
  $alamat = '';

  if (isset($_GET['search'])) {
    $showTable = true;
    $nama   = $_GET['nama'] ?? '';
    $alamat = $_GET['alamat'] ?? '';
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Search Person</title>
</head>
<body>

<!-- FORM SEARCH -->
<form method="get">
  Nama:
  <input type="text" name="nama"><br><br>

  Alamat:
  <input type="text" name="alamat"><br><br>

  <button type="submit" name="search">SEARCH</button>
</form>

<?php if ($showTable): ?>

<?php
  $query = "
  SELECT 
    p.nama,
    p.alamat,
    GROUP_CONCAT(h.hobi SEPARATOR ', ') AS hobi
  FROM person p
  LEFT JOIN hobi h ON h.person_id = p.id
  WHERE 1=1
  ";

  if ($nama != '') {
    $query .= " AND p.nama LIKE '%$nama%'";
  }
  if ($alamat != '') {
    $query .= " AND p.alamat LIKE '%$alamat%'";
  }

  $query .= " GROUP BY p.id";

  $result = $conn->query($query);
?>

<br>

<!-- Hasil -->
<table border="1" cellpadding="5">
  <tr>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Hobi</th>
  </tr>

  <?php if ($result->num_rows > 0): ?>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['alamat']; ?></td>
        <td><?= $row['hobi']; ?></td>
      </tr>
    <?php endwhile; ?>
  <?php else: ?>
    <tr>
      <td colspan="3">Data tidak ditemukan</td>
    </tr>
  <?php endif; ?>
</table>

<?php endif; ?>

</body>
</html>
