<?php
session_start(); // Начинаем сессию
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks and their solutions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding-top: 50px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .task {
            background-color: #fff;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .task h2 {
            color: #007BFF;
            margin-bottom: 10px;
        }
        .task p {
            color: #555;
            font-size: 16px;
        }
        .task pre {
            background-color: #f8f8f8;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-family: Consolas, monaco, monospace;
        }
        .task .solution {
            margin-top: 20px;
            background-color: #e9f7ef;
            padding: 15px;
            border-left: 5px solid #28a745;
        }
        .footer {
            text-align: center;
            margin-top: 50px;
            padding: 20px;
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Tasks and their solutions</h1>

    <!-- Форма для ввода -->
    <div class="task">
        <h2>Enter a word to reverse:</h2>
        <form method="POST" action="">
            <label for="word">Enter Word:</label>
            <input type="text" id="word" name="word" required>
            <input type="submit" value="Reverse Word">
        </form>
    </div>

    <div class="task">
        <h2>Task 1: Line reversal</h2>
        <p>Write a function that reverses a string.</p>
        <div class="solution">
            <p><strong>Solution:</strong></p>
            <pre>
<?php
// Функция для переворота строки
function reverseString($line) {
    $reverseLine = '';
    for ($i = strlen($line) - 1; $i >= 0; $i--) {
        $reverseLine .= $line[$i];
    }
    return $reverseLine;
}

// Проверка и обработка введенного слова
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['word'])) {
    // Получаем слово из формы
    $word = htmlspecialchars($_POST['word']); // Очищаем данные для безопасности

    // Сохраняем слово в сессии
    $_SESSION['word'] = $word;

    // Вызываем функцию для переворота строки
    $reversedWord = reverseString($word);

    // Отображаем оригинальное и перевёрнутое слово
    echo "<p><strong>Original word:</strong> $word</p>";
    echo "<p><strong>Reversed word:</strong> $reversedWord</p>";
}
?>
            </pre>
        </div>
    </div>
</div>

<div class="footer">
    <p>© 2024 Task Solutions</p>
</div>

</body>
</html>
