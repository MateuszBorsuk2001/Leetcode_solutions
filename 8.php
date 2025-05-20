<?php
/**
 * LeetCode Problem #8 - String to Integer (atoi)
 * 
 * Implement the myAtoi(string s) function, which converts a string to a 32-bit signed integer.
 */

class Solution {
    /**
     * @param String $s
     * @return Integer
     */
    function myAtoi($s) {
        $s = trim($s); // Remove leading/trailing whitespace
        if (empty($s)) return 0;
        
        $i = 0;
        $sign = 1;
        $result = 0;
        $length = strlen($s);
        
        // Check for sign
        if ($s[$i] == '+' || $s[$i] == '-') {
            $sign = ($s[$i] == '-') ? -1 : 1;
            $i++;
        }
        
        // Define integer limits
        $INT_MAX = 2147483647;    // 2^31 - 1
        $INT_MIN = -2147483648;   // -2^31
        
        // Process digits
        while ($i < $length && ctype_digit($s[$i])) {
            $digit = (int)$s[$i];
            
            // Check for overflow
            if ($result > $INT_MAX / 10 || 
                ($result == $INT_MAX / 10 && $digit > 7)) {
                return ($sign == 1) ? $INT_MAX : $INT_MIN;
            }
            
            $result = $result * 10 + $digit;
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
echo "Test 5: " . $solution->myAtoi("-91283472332") . "\n";   // Expected: -2147483648
?>