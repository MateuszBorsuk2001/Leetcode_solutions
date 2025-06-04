<?php

class Solution {
    
    function intToRoman($num) {
        $values = [1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1];
        $symbols = ["M", "CM", "D", "CD", "C", "XC", "L", "XL", "X", "IX", "V", "IV", "I"];
        
        $result = "";
        
        for ($i = 0; $i < count($values); $i++) {
            while ($num >= $values[$i]) {
                $result .= $symbols[$i];
                $num -= $values[$i];
            }
        }
        
        return $result;
    }
}

$solution = new Solution();

echo "Test 1 (3): " . $solution->intToRoman(3) . "\n";
echo "Test 2 (58): " . $solution->intToRoman(58) . "\n";
echo "Test 3 (1994): " . $solution->intToRoman(1994) . "\n";
echo "Test 4 (4): " . $solution->intToRoman(4) . "\n";
echo "Test 5 (9): " . $solution->intToRoman(9) . "\n";
echo "Test 6 (27): " . $solution->intToRoman(27) . "\n";

?>