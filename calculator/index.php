<?php
$result = '';

if (isset($_POST["calculate"])) {
  $num1 = htmlspecialchars($_POST["num1"]);
  $num2 = htmlspecialchars($_POST["num2"]);
  $operator = htmlspecialchars($_POST["operator"]);
}

if (is_numeric($num1) && is_numeric($num2)) {
  switch ($operator) {
    case "add":
      $result = $num1 + $num2;
      break;

    case "subtract":
      $result = $num1 - $num2;
      break;

    case "multiply":
      $result = $num1 * $num2;
      break;

    case "divide":
      if ($num2 != 0) {
        $result = $num1 / $num2;
      } else {
        $result = "Error: Pembagian dengan 0 tidak diperbolehkan";
      }
      break;
  }
} else {
  $result = "Angka tidak valid";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KALKULATOR SEDERHANA</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="calculator-container">
    <div class="calc-box">
      <h1 class="judul">Kalkulator Sederhana</h1>

      <div class="operational">
        <form class="calculator-form" action="index.php" method="post">
          <input class="input" type="text" name="num1" id="num1" placeholder="Angka Pertama" value="<?php echo isset($_POST["num1"]) ? $_POST["num1"] : ''; ?>">

          <input class="input" type="text" name="num2" id="num2" placeholder="Angka Kedua" value="<?php echo isset($_POST["num2"]) ? $_POST["num2"] : ''; ?>">

          <select class="operator" name="operator" id="operator">
            <option value="add" <?php echo isset($_POST["operator"]) && $_POST["operator"] == 'add' ? 'selected' : ''; ?>>Tambah</option>
            <option value="subtract" <?php echo isset($_POST["operator"]) && $_POST["operator"] == 'subtract' ? 'selected' : ''; ?>>Kurang</option>
            <option value="multiply" <?php echo isset($_POST["operator"]) && $_POST["operator"] == 'multiply' ? 'selected' : ''; ?>>Kali</option>
            <option value="divide" <?php echo isset($_POST["operator"]) && $_POST["operator"] == 'divide' ? 'selected' : ''; ?>>Bagi</option>
          </select>
      </div>

      <div class="btn-container"><button class="calc-btn" type="submit" name="calculate">HITUNG</button></div>

      </form>

      <div class="result">
        <p class="result-font">Result: <?php echo htmlspecialchars($result); ?></p>
      </div>
    </div>
  </div>
</body>

</html>