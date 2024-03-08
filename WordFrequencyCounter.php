<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word Frequency Counter</title>
</head>

<body>
    <h1>Word Frequency Counter</h1>
    <form action="" method="post">
        <label for="inputText">Paste your text here:</label><br>
        <textarea id="inputText" name="inputText" rows="10" cols="50"></textarea><br>

        <label for="sortingOrder">Sorting Order:</label>
        <select id="sortingOrder" name="sortingOrder">
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
        </select><br>

        <label for="displayLimit">Number of Words to Display:</label>
        <input type="number" id="displayLimit" name="displayLimit" value="10" min="1"><br>

        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["inputText"])) {
        $inputText = $_POST["inputText"];
        $sortingOrder = $_POST["sortingOrder"];
        $displayLimit = $_POST["displayLimit"];

        $words = str_word_count($inputText, 1);

        $stopWords = ["the", "and", "in", "to", "of", "a", "is", "for", "on"];
        $filteredWords = array_diff($words, $stopWords);
        $wordFrequencies = array_count_values($filteredWords);

        ($sortingOrder === "asc") ? asort($wordFrequencies) : arsort($wordFrequencies);
        echo "<h2>Word Frequencies</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Word</th><th>Frequency</th></tr>";
        $counter = 0;
        foreach ($wordFrequencies as $word => $frequency) {
            if ($counter < $displayLimit) {
                echo "<tr><td>$word</td><td>$frequency</td></tr>";
                $counter++;
            } else {
                break;
            }
        }
        echo "</table>";
    }
    ?>
</body>

</html>