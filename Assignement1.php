<!DOCTYPE html>
<html>
<head>
    <title>PHP Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        .calculator {
            width: 300px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input, select, button {
            margin: 5px 0;
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }
        .result {
            margin-top: 10px;
            font-weight: bold;
            color: green;
        }
    </style>
</head>
<body>

<div class="calculator">
    <h2>PHP Calculator</h2>
    <form method="post" action="">
        <input type="number" name="num1" placeholder="Enter first number" required step="any">
        <input type="number" name="num2" placeholder="Enter second number" step="any">
        <select name="operation" required>
            <option value="add">Addition (+)</option>
            <option value="subtract">Subtraction (-)</option>
            <option value="multiply">Multiplication (×)</option>
            <option value="divide">Division (÷)</option>
            <option value="power">Exponentiation (^)</option>
            <option value="sqrt">Square Root (√)</option>
            <option value="percent">Percentage (%)</option>
            <option value="log">Logarithm (log)</option>
        </select>
        <button type="submit" name="calculate">Calculate</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['calculate'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'] ?? 0;
        $operation = $_POST['operation'];
        $result = '';

        switch ($operation) {
            case 'add':
                $result = $num1 + $num2;
                break;
            case 'subtract':
                $result = $num1 - $num2;
                break;
            case 'multiply':
                $result = $num1 * $num2;
                break;
            case 'divide':
                if ($num2 == 0) {
                    $result = 'Error: Division by zero';
                } else {
                    $result = $num1 / $num2;
                }
                break;
            case 'power':
                $result = pow($num1, $num2);
                break;
            case 'sqrt':
                if ($num1 < 0) {
                    $result = 'Error: Negative number for square root';
                } else {
                    $result = sqrt($num1);
                }
                break;
            case 'percent':
                $result = ($num1 / 100) * $num2;
                break;
            case 'log':
                if ($num1 <= 0) {
                    $result = 'Error: Logarithm of non-positive number';
                } else {
                    $result = log($num1);
                }
                break;
            default:
                $result = 'Invalid operation selected';
        }

        echo "<div class='result'>Result: $result</div>";
    }
    ?>
</div>

</body>
</html>
