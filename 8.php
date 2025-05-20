<?php


class Solution {
    /**
     * @param String $s
     * @return Integer
     */
    function myAtoi($s) {
        $s = trim($s);
        if (empty($s)) return 0;
        
        $i = 0;
        $sign = 1;
        $result = 0;
        $length = strlen($s);
        
        if ($s[$i] == '+' || $s[$i] == '-') {
            $sign = ($s[$i] == '-') ? -1 : 1;
            $i++;
        }

        while ($i < $length && ctype_digit($s[$i])) {
            if ($result > (PHP_INT_MAX - (int)$s[$i]) / 10) {
                return ($sign == 1) ? PHP_INT_MAX : PHP_INT_MIN;
            }
            $result = $result * 10 + (int)$s[$i];
            $i++;
        }
        
        return $sign * $result;
    }
}

// Test cases
$solution = new Solution();
echo "Test 1: " . $solution->myAtoi("42") . "\n";             // Expected: 42
echo "Test 2: " . $solution->myAtoi("   -42") . "\n";         // Expected: -42
echo "Test 3: " . $solution->myAtoi("4193 with words") . "\n"; // Expected: 4193
echo "Test 4: " . $solution->myAtoi("words and 987") . "\n";  // Expected: 0
?>