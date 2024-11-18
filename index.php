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

        <!-- Task 1 -->
        <div class="task">
            <div class="task-header">
                <h2>Task 1: Line reversal</h2>
            </div>
            <p>Write a function that reverses a string.</p>
            <div class="solution">
                <form action="" method="POST">
                    <label for="inputString">
                        <p><strong>Enter a string to reverse:</strong></p>
                    </label>
                    <input type="text" id="inputString" name="inputString" required>
                    <input type="submit" name="submitString" value="Reverse String">

                </form>
                <?php
                if (isset($_POST['submitString'])) {
                    if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['inputString'])) {
                        $inputString = $_POST['inputString'];

                        if (is_numeric($inputString)) {
                            echo "<p><strong>Use other task. Numbers are not allowed in this task. </strong></p>";
                        } else {
                            echo "<p><strong>Original string: </strong>" . htmlspecialchars($inputString) . "</p>";
                            echo "<p><strong>Reversed string: </strong> " . reverseString($inputString) . "</p>";
                        }
                    } else {
                        echo "<p><strong>Invalid request method </strong></p>";
                    }
                }


                // function that reverses a string
                function reverseString($line)
                {
                    $reverseLine = '';
                    for ($i = strlen($line) - 1; $i >= 0; $i--) {
                        $reverseLine .= $line[$i];
                    }
                    return $reverseLine;
                }

                ?>
            </div>
        </div>

        <!-- Task 2 -->
        <div class="task">
            <div class="task-header">
                <h2>Task 2: Int reversal</h2>
            </div>
            <p>Write a function that reverses an integer.</p>
            <div class="solution">
                <form action="" method="POST">
                    <label for="inputInt">
                        <p><strong>Enter an integer:</strong></p>
                    </label>
                    <input type="number" id="inputInt" name="inputInt" required>
                    <input type="submit" name="submitInt" value="Reverse Int">
                </form>
                <?php


                if (isset($_POST['submitInt'])) {
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['inputInt'])) {
                        $int = $_POST['inputInt'];
                        echo "<p><strong>Original int: </strong>" . $int . "</p>";
                        echo "<p><strong>Reversed int: </strong> " . reverseInt($int) . "</p>";
                    } else {
                        echo "<p><strong>Invalid request method </strong></p>";
                    }
                }

                // function that reverses an integer.
                function reverseInt($num)
                {
                    $revNum = 0;


                    while ($num != 0) {
                        $revNum = $revNum * 10 + $num % 10;
                        $num = (int)($num / 10);
                    }

                    return $revNum;
                }
                ?>
            </div>
        </div>

        <!-- Task 3 -->
        <div class="task">
            <div class="task-header">
                <h2>Task 3: Check anagrams.</h2>
            </div>
            <p>Write a function that takes two strings and checks if they are anagrams.</p>
            <div class="solution">
                <form action="" method="POST">
                    <label for="inputStringAnagramm">
                        <p><strong>Enter strings to check whether your strings are anagrams or not:</strong></p>
                    </label>
                    <input type="text" id="firstString" name="firstString" required>
                    <input type="text" id="secondString" name="secondString" required>
                    <input type="submit" name="Check" value="Check">
                </form>

                <?php

                if (isset($_POST['Check'])) {
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['firstString']) && isset($_POST['secondString'])) {
                        $firstString = $_POST['firstString'];
                        $secondString = $_POST['secondString'];

                        if (is_numeric($firstString) || is_numeric($secondString)) {
                            echo "<p><strong>We can't check the anagram with numbers</strong></p>";
                        } else {
                            echo "<p><strong>Your strings: " . htmlspecialchars($firstString) . " and " . htmlspecialchars($secondString) .  "</strong></p>";
                            if (anagram($firstString, $secondString)) {
                                echo "<p><strong> Congratulations! Your strings are an anagram </strong></p>";
                            } else {
                                echo "<p><strong> Sorry! Your strings are not an anagram.</strong></p>";
                            }
                        }
                    }
                }

                // a function that takes two strings and checks if they are anagrams
                function anagram($string1, $string2)
                {
                    $string1 = strtolower($string1);
                    $string2 = strtolower($string2);

                    $charA = str_split($string1);
                    sort($charA);

                    $charB = str_split($string2);
                    sort($charB);

                    if ($charA == $charB) {
                        return true;
                    } else {
                        return false;
                    }
                }

                ?>

            </div>
        </div>

        <!-- Task 4 -->
        <div class="task">
            <div class="task-header">
                <h2>Task 4: A program that prints every second element of an array</h2>
            </div>
            <p>Write a function that prints every second element of an array</p>
            <div class="solution">
                <form action="" method="POST">
                    <label for="Input Array">
                        <p><strong>Enter an array, the function outputs every second element (just for fun):</strong></p>
                    </label>
                    <input type="text" id="inputArr" name="inputArr" required>
                    <input type="submit" name="submitArr" value="Submit">
                </form>
                <?php


                if (isset($_POST['submitArr'])) {
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $arrElement = $_POST['inputArr'];

                        // ^      - Start of the string
                        // (\s*\w+\s*) - Matches one "word" with optional spaces around it:
                        // - \s*    - Zero or more whitespace characters before the word
                        // - \w+    - One or more "word characters" (letters, numbers, or underscores)
                        // - \s*    - Zero or more whitespace characters after the word
                        // This part ensures that there is at least one word at the start of the string.
                        // (,      - Matches a comma after the first word
                        // $       - End of the string

                        if (preg_match('/^(\s*\w+\s*)(,\s*\w+\s*)*$/', $arrElement)) {
                            $arr = explode(",", $arrElement); // Convert the string to an array, separating by commas
                            echo "<p><strong>Original an array:" . htmlspecialchars($arrElement) . "</strong></p>";
                            echo "<p><strong>Every second element:" . secondElement($arr) . "</strong></p>";
                        } else {
                            echo "<p><strong>Please enter a list of words or numbers separated by commas. </strong></p>";
                        }
                    }
                }

                function secondElement($arr)
                {
                    $result = "";

                    for ($i = 1; $i < count($arr); $i += 2) {
                        $result .= $arr[$i] . " ";
                    }

                    return trim($result); // Remove spaces around the element
                }



                ?>
            </div>
        </div>

        <!-- Task 5 -->
        <div class="task">
            <div class="task-header">
                <h2>Task 5: Program where is necessary to output the sum of all values ​​of the array. </h2>
            </div>
            <p> Write a function which sum of all elemnts of an array</p>
            <div class="solution">
                <form action="" method="POST">
                    <label for="arrForSum">
                        <p><strong>Enter an array, the function will output the sum of the elements:</strong></p>
                    </label>
                    <input type="text" id="arrForSum" name="arrForSum" required>
                    <input type="submit" name="Sum" value="Sum">
                </form>

                <?php


                if (isset($_POST['Sum'])) {
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        $arrForSum = $_POST['arrForSum'];


                        // Validate if the input contains only numbers and commas
                        if (preg_match('/^\s*(\d+\s*,\s*)*\d+\s*$/', $arrForSum)) {
                            $sum = explode(",", $arrForSum); // Convert the string to an array, separating by commas


                            echo "<p><strong>Original an array: " . htmlspecialchars($arrForSum) . "</strong></p>";
                            echo "<p><strong>Sum of elements: " . sumElements($sum) . "</strong></p>";
                        } else {
                            echo "<p><strong>Please enter a list of numbers separated by commas. </strong></p>";
                        }
                    }
                }

                function sumElements($arr)
                {
                    $sum = 0;
                    foreach ($arr as $element) {
                        $sum += (int)trim($element);
                    }
                    return $sum;
                }



                ?>
                </pre>
            </div>
        </div>


        <!-- Task 6 -->
        <div class="task">
            <h2> Task 6: Calculates the factorial of a number.</h2>
            <div class="task-header">
                <p> Write a function that calculates the factorial of a number.</p>
            </div>
            <div class="solution">
                <form action="" method="POST">
                    <label for="CalculateFactorial">
                        <p><strong>Enter a number to calculate the factorial:</strong></p>
                    </label>
                    <input type="number" name="numFactorial" required>
                    <input type="submit" name="Factorial">
                </form>
                <?php

                if (isset($_POST['Factorial'])) {
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        $numF = $_POST['numFactorial'];
                        echo "<p><strong>The factorial of " . htmlspecialchars($numF) . " is " . factorial($numF) . " </strong></p>";
                    }
                }

                function factorial($num)
                {
                    $factorial = 1;

                    if ($num == 0 || $num == 1) {

                        return $factorial = 1;
                    } else {

                        for ($i = 1; $i <= $num; $i++) {
                            $factorial *= $i;
                        }

                        return $factorial;
                    }
                }



                ?>
            </div>

        </div>

        <!-- Task 7 -->

        <div class="task">
            <h2> Task 7: Even or odd.</h2>
            <div class="task-header">
                <p> Write a program that takes a number and determines whether it is even or odd.</p>
            </div>
            <div class="solution">
                <form action="" method="POST">
                    <label for="evenOrOdd">
                        <p><strong>Enter your number to check if it is even or odd</strong></p>
                    </label>
                    <input type="number" name="evenOdd" required>
                    <input type="submit" name="EvenorOdd" value="Even or Odd">
                </form>

                <?php

                if (isset($_POST['EvenorOdd'])) {
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        $numEO = $_POST['evenOdd'];

                        echo "<p><strong>Your number is " . htmlspecialchars($numEO) . " and it is " . evenOrOdd($numEO) . " </strong></p>";
                    }
                }

                function evenOrOdd($num)
                {

                    if ($num % 2 == 0) {
                        return "even";
                    } else {
                        return "odd";
                    }
                }

                ?>
            </div>

        </div>


        <!-- Task 8 -->

        <div class="task">
            <div class="task-header">
                <h2>Task 8: Array reversal.</h2>
            </div>
            <p>Write a function that reverses an array.</p>
            <div class="solution">
                <form action="" method="POST">
                    <label for="arrayReverse">
                        <p><strong>Enter an array, the function will output the reverse array</strong></p>
                    </label>
                    <input type="text" name="arrayReverse" required>
                    <input type="submit" name="submitReverse" value="Array reverse">
                </form>

                <?php

                if (isset($_POST['arrayReverse'])) {
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $arrInput = $_POST['arrayReverse'];

                        // ^      - Start of the string
                        // (\s*\w+\s*) - Matches one "word" with optional spaces around it:
                        // - \s*    - Zero or more whitespace characters before the word
                        // - \w+    - One or more "word characters" (letters, numbers, or underscores)
                        // - \s*    - Zero or more whitespace characters after the word
                        // This part ensures that there is at least one word at the start of the string.
                        // (,      - Matches a comma after the first word
                        // $       - End of the string


                        if (preg_match('/^(\s*\w+\s*)(,\s*\w+\s*)*$/', $arrInput)) {
                            $arrRev = explode(",", $arrInput); // Convert the string to an array, separating by commas

                            echo "<p><strong>Original an array:" . htmlspecialchars($arrInput) . "</strong></p>";
                            echo "<p><strong>Reverse an array:" . implode(",", reverseArr($arrRev)) . "</strong></p>";
                        } else {
                            echo "<p><strong>Please enter a list of words or numbers separated by commas. </strong></p>";
                        }
                    }
                }
                function reverseArr($arr)
                {
                    $reverseArr = [];


                    for ($i = count($arr) - 1; $i >= 0; $i--) {
                        $reverseArr[] = $arr[$i];
                    }
                    return $reverseArr;
                }

                ?>
            </div>
        </div>

        <!-- Task 9 -->

        <div class="task">
            <div class="task-header">
                <h2>Task 9: Palindrome.</h2>
            </div>
            <p>Write a function that checks if a word is a palindrome.</p>
            <div class="solution">
                <form action="" method="POST">
                    <label for="palindrome">
                        <p><strong>Enter a word to check for palindrome</strong></p>
                    </label>
                    <input type="text" name="stringPalindrome" required>
                    <input type="submit" name="submitPalindrome" value="Palindrome">
                </form>

                <?php
                if (isset($_POST['submitPalindrome'])) {
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $strPalindrome = $_POST['stringPalindrome'];

                        if (preg_match('/^[\s]*([a-zA-Zа-яА-ЯёЁ]+[\s]*)(,[\s]*[a-zA-Zа-яА-ЯёЁ]+[\s]*)*$/u', $strPalindrome)) {
                            echo "<p><strong>You word '" . htmlspecialchars($strPalindrome) . "' is " . palindromeOrNor($strPalindrome) . ".</strong></p>";
                        } else {
                            echo "<p><strong>Please enter a word. </strong></p>";
                        }
                    }
                }

                function palindromeOrNor($str)
                {

                    $j = 0;
                    $lenWord = strlen($str);
                    $word = strtolower($str);

                    for ($i = $lenWord - 1; $i >= 0; $i--) {
                        if ($word[$i] == $word[$j]) {
                            $j++;
                            if ($j == $lenWord) {
                                return "a palindrome";
                            }
                        } else {
                            return "not a palindrome";
                            break;
                        }
                    }
                }

                ?>
                </pre>
            </div>
        </div>


        <!-- Task 10 -->
        <div class="task">
            <div class="task-header">
                <h2>Task 10: Finding Prime Numbers.</h2>
            </div>
            <p>Write a program that finds all prime numbers from 1 to n.</p>
            <div class="solution">
                <form action="" method="POST">
                    <label for="primeNumber">
                        <p><strong>Enter n-number and the function wiil output all prime numbers from 1 to n</strong></p>
                    </label>
                    <input type="number" name="primeNumber" required>
                    <input type="submit" name="submitNumber" value="Prime Number">
                </form>
                <?php

                if (isset($_POST['submitNumber'])) {
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        $primeNumber = $_POST['primeNumber'];

                        echo "<p><strong>All prime numbers from 1 to " . htmlspecialchars($primeNumber) . ": " . primeNum($primeNumber) . " </strong></p>";
                    }
                }

                function isSimple($n)
                {
                    if ($n <= 1) {
                        return  false;
                    }

                    $sqrtN = sqrt($n);

                    for ($i = 2; $i <= $sqrtN; $i++) {
                        if ($n % $i == 0) {
                            return false;
                        }
                    }
                    return true;
                }


                function primeNum($endNum)
                {
                    $prime = "";
                    for ($i = 2; $i <= $endNum; $i++) {
                        if (isSimple($i)) {
                            $prime .=  $i . " ";
                        }
                    }

                    return $prime;
                }


                ?>
            </div>
        </div>

        <!-- Task 11 -->

        <div class="task">
            <div class="task-header">
                <h2>Task 11: The n-th Fibonacci number.</h2>
            </div>
            <p>Write a function that returns the n-th Fibonacci number.</p>
            <div class="solution">
                <form action="" method="POST">
                    <label for="fibNumber">
                        <p><strong>Enter n-number ????</strong></p>
                    </label>
                    <input type="number" name="fibNumber" required>
                    <input type="submit" name="submitFibNumber" value="Fibonacci number">
                </form>
                <?php

                if (isset($_POST['submitFibNumber'])) {
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        $fibNumber = $_POST['fibNumber'];

                        echo "<p><strong>The " . htmlspecialchars($fibNumber) .  "-th Fibonacci number: " . fibonacci($fibNumber) . " </strong></p>";
                    }
                }

                function fibonacci($n)
                {
                    $arrF = [0, 1];

                    if ($n < 0) return "Fibonacci is not defined for negative numbers.";
                    if ($n == 0) return "0";
                    if ($n == 1) return "1";

                    for ($i = 2; $i <= $n; $i++) {
                        $countF = $arrF[$i - 2] + $arrF[$i - 1];
                        $arrF[] = $countF;
                    }

                    return $arrF[$n];
                }


                ?>
            </div>
        </div>

        <!-- Task 12 -->
        <!-- refactor -->

        <div class="task">
            <div class="task-header">
                <h2>Task 12: Finding the second largest number in an array.</h2>
            </div>
            <p>Write a function that returns the second largest element of an array.</p>
            <div class="solution">
                <p><strong>the second largest element of [12, 35, 1, 10, 34, 1]:</strong></p>
                <pre>
            <?php

            function findSecondLargest($arr)
            {
                if (count($arr) < 2) {
                    return "Array must have at least two unique numbers.";
                }

                sort($arr);
                $lenArr = count($arr);
                $secondLarge = $arr[$lenArr - 2];
                return $secondLarge;
            }

            $arrk = [12, 35, 1, 10, 34, 1];
            echo findSecondLargest($arrk);

            ?>
                </pre>
            </div>
        </div>

        <!-- Task 13 -->
        <div class="task">
            <div class="task-header">
                <h2>Task 13: The common elements between two arrays .</h2>
            </div>
            <p>Write a program to find the common elements between two arrays.</p>
            <div class="solution">
                <p><strong>Common element:</strong></p>
                <pre>
            <?php

            function findCommonElements($arr1, $arr2)
            {
                for ($i = 0; $i < count($arr1); $i++) {
                    for ($j = 0; $j < count($arr2); $j++) {
                        $n = $arr1[$i];
                        if ($n == $arr2[$j]) {
                            $arr2[$j] . " ";
                        }
                    }
                }
            }


            //other

            function findComElOther($arr1, $arr2)
            {
                $arr2Assoc = array_flip($arr2);

                $commonElements = [];

                foreach ($arr1 as $element) {
                    if (isset($arr2Assoc[$element])) {
                        $commonElements[] = $element;
                    }
                }
                return $commonElements;
            }

            $arr1 = [1, 2, 3, 4, 5];
            $arr2 = [3, 5, 7, 8, 4];

            findCommonElements($arr1, $arr2);


            ?>

</html>