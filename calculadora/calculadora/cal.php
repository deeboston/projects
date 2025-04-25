<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operation = $_POST["operation"];
    $result = "";
    $symbol = "";

    if (is_numeric($num1) && is_numeric($num2)) {
        switch ($operation) {
            case "add":
                $result = $num1 + $num2;
                $symbol = "+";
                break;
            case "subtract":
                $result = $num1 - $num2;
                $symbol = "-";
                break;
            case "multiply":
                $result = $num1 * $num2;
                $symbol = "×";
                break;
            case "divide":
                if ($num2 == 0) {
                    $result = "Error: Division by zero!";
                    $symbol = "÷";
                } else {
                    $result = $num1 / $num2;
                    $symbol = "÷";
                }
                break;
            default:
                $result = "Invalid operation!";
        }
    } else {
        $result = "Please enter valid numbers!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculation Result</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #121212;
            font-family: Arial, sans-serif;
            color: white;
            text-align: center;
        }

        .container {
            background: rgba(0, 0, 0, 0.8);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 0px 15px rgba(255, 255, 255, 0.1);
        }

        h2 {
            color: #FFD700;
        }

        p {
            font-size: 20px;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background: #FFD700;
            color: black;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        a:hover {
            background: #ffa500;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Calculation Result</h2>
        <p>
            <?php 
            if (isset($num1) && isset($num2)) {
                echo htmlspecialchars($num1) . " " . $symbol . " " . htmlspecialchars($num2) . " = " . $result;
            } else {
                echo "No calculation performed.";
            }
            ?>
        </p>
        <a href="formulario.html">Go Back</a>
    </div>

</body>
</html>
