<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulacka</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="calculator">
        <form action="index.php" method="post">
            <input type="text" name="insert" readonly>
            <div class="buttons">
                <button name="insert[]" value="">1</button>
                <button name="insert[]" value="">2</button>
                <button name="insert[]" value="">3</button>
                <button name="insert[]" value="">+</button>
                <button name="insert[]" value="">4</button>
                <button name="insert[]" value="">5</button>
                <button name="insert[]" value="">6</button>
                <button name="insert[]" value="">-</button>
                <button name="insert[]" value="">7</button>
                <button name="insert[]" value="">8</button>
                <button name="insert[]" value="">9</button>
                <button name="insert[]" value="">*</button>
                <button name="insert[]" value="">0</button>
                <button name="insert[]" value="">.</button>
                <button name="insert[]" value="">/</button>
            </div>
                <input type="hidden" name="result" value="<?php echo $result; ?>">
                <input type="submit" value="=">
            </form>
            <input type="text" name="insert" readonly value="<?php echo $_POST["insert"]; ?>">
            <?php if (!empty($result)) { ?>
                <input type="text" readonly value="<?php echo $result; ?>">
            <?php } ?>
    </div>
<?php
if ($_SERVER["REQUEST METHOD" == "POST"]) {
    $result = "";

    if (isset($_POST["insert"])) {
        $insert = $_POST["insert"];

        $result = evulateExpression($insert);
    }
}

function evulateExpression($insert) {
    $operators = array("+", "-", "*", "/");
    $insert = str_replace(",", ".", $insert);
    $numbers = array_filter(preg_split('/\s+/', trim($insert)));

    $result = $numbers[0];

    for ($i=1; $i < count($numbers); $i += 2) { 
        $operator = $numbers[$i];
        $operand = $numbers[$i + 1] ?? '';

        if (in_array($operator, $operators) && is_numeric($operand)) {
            switch ($operator) {
                case "+":
                    $result += $operand;
                    break;
                case "-":
                    $result -= $operand;
                    break;
                case "*":
                    $result *= $operand;
                    break;
                case "/":
                    if ($operand != 0) {
                        $result /= $operand;
                    }
                    break;
            }
        }
    }
    return $result;
}
?>
</body>
</html>