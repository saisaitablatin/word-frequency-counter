<?php

/**
 * Calculate the total price of items in a shopping cart.
 *
 * @param array $items An array of items with 'name' and 'price' keys.
 * @return float The total price of the items.
 */
function calculateTotalPrice(array $items): float {
    $total = 0;

    foreach ($items as $item) {
        $total += $item['price'];
    }

    return $total;
}

/**
 * Modify a string by keeping spaces and converting to lowercase.
 *
 * @param string $inputString The input string to be modified.
 * @return string The modified string.
 */
function modifyString(string $inputString): string {
    return strtolower($inputString);
}

/**
 * Check if a number is even or odd.
 *
 * @param int $number The number to be checked.
 * @return string The result indicating whether the number is even or odd.
 */
function checkEvenOrOdd(int $number): string {
    return ($number % 2 == 0) ? "The number $number is even." : "The number $number is odd.";
}

// Example usage:

// Shopping cart
$items = [
    ['name' => 'Widget A', 'price' => 10],
    ['name' => 'Widget B', 'price' => 15],
    ['name' => 'Widget C', 'price' => 20],
];
$totalPrice = calculateTotalPrice($items);
echo "Total price: $" . $totalPrice . PHP_EOL;

// String manipulation
$inputString = "This is a poorly written program with little structure and readability.";
$modifiedString = modifyString($inputString);
echo "Modified string: " . $modifiedString . PHP_EOL;

// Check if a number is even or odd
$number = 42;
$result = checkEvenOrOdd($number);
echo $result . PHP_EOL;
