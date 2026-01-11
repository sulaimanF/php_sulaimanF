<?php
  session_start();

  // step default
  $step = $_SESSION['step'] ?? 1;

  // proses submit
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($step == 1) {
      $_SESSION['nama'] = $_POST['nama'];
      $_SESSION['step'] = 2;
    } elseif ($step == 2) {
      $_SESSION['umur'] = $_POST['umur'];
      $_SESSION['step'] = 3;
    } elseif ($step == 3) {
      $_SESSION['hobi'] = $_POST['hobi'];
      $_SESSION['step'] = 4;
    }

    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
  }

    $step = $_SESSION['step'] ?? 1;
?>

  <!DOCTYPE html>
  <html>
  <head>
      <title>Form Bertahap 1 sampai 4</title>
  </head>
  <body>

<?php if ($step == 1): ?>
  <!-- Tampilan No 1 -->
  <form method="post">
    Nama Anda :
    <input type="text" name="nama" required>
    <br><br>
    <button type="submit">SUBMIT</button>
  </form>

  <?php elseif ($step == 2): ?>
  <!-- Tampilan No 2 -->
  <form method="post">
      Umur Anda :
      <input type="number" name="umur" required>
      <br><br>
      <button type="submit">SUBMIT</button>
  </form>

  <?php elseif ($step == 3): ?>
  <!-- Tampilan No 3 -->
  <form method="post">
      Hobi Anda :
      <input type="text" name="hobi" required>
      <br><br>
      <button type="submit">SUBMIT</button>
  </form>

  <?php else: ?>
  <!-- Tampilan No 4 -->
  <p><b>Nama:</b> <?= $_SESSION['nama']; ?></p>
  <p><b>Umur:</b> <?= $_SESSION['umur']; ?></p>
  <p><b>Hobi:</b> <?= $_SESSION['hobi']; ?></p>

  <?php
  // hapus session setelah tampil
  session_destroy();
  ?>

  <?php endif; ?>

</body>
</html>
