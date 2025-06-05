<?php

class Solution {
    function romanToInt($s) {
        $values = [
            'I' => 1,
            'V' => 5,
            'X' => 10,
            'L' => 50,
            'C' => 100,
            'D' => 500,
            'M' => 1000
        ];
        
        $result = 0;
        $length = strlen($s);
        
        for ($i = 0; $i < $length; $i++) {
            if ($i < $length - 1 && $values[$s[$i]] < $values[$s[$i + 1]]) {
                $result -= $values[$s[$i]];
            } else {
                $result += $values[$s[$i]];
            }
        }
        
        return $result;
    }
}

$solution = new Solution();

echo "Test Case 1: " . $solution->romanToInt("III") . " (Expected: 3)\n";
echo "Test Case 2: " . $solution->romanToInt("LVIII") . " (Expected: 58)\n";
echo "Test Case 3: " . $solution->romanToInt("MCMXC") . " (Expected: 1990)\n";
echo "Test Case 4: " . $solution->romanToInt("IV") . " (Expected: 4)\n";
echo "Test Case 5: " . $solution->romanToInt("IX") . " (Expected: 9)\n";
echo "Test Case 6: " . $solution->romanToInt("XL") . " (Expected: 40)\n";
echo "Test Case 7: " . $solution->romanToInt("XC") . " (Expected: 90)\n";
echo "Test Case 8: " . $solution->romanToInt("CD") . " (Expected: 400)\n";
echo "Test Case 9: " . $solution->romanToInt("CM") . " (Expected: 900)\n";
echo "Test Case 10: " . $solution->romanToInt("MCDXLIV") . " (Expected: 1444)\n";
echo "Test Case 11: " . $solution->romanToInt("MMCDXLIV") . " (Expected: 2444)\n";
echo "Test Case 12: " . $solution->romanToInt("I") . " (Expected: 1)\n";
echo "Test Case 13: " . $solution->romanToInt("MMMCMXCIX") . " (Expected: 3999)\n";

?>