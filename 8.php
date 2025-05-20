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

        $INT_MAX = 2147483647;    // 2^31 - 1
        $INT_MIN = -2147483648;   // -2^31

        $number = '';
        while ($i < $length && ctype_digit($s[$i])) {
            $number .= $s[$i];
            $i++;
        }
        if ($number === '') return 0;
        if (strlen($number) > 10) {
            return ($sign === 1) ? $INT_MAX : $INT_MIN;
        }
        if (strlen($number) === 10) {
            $max_safe = ($sign === 1) ? '2147483647' : '2147483648';
            
            for ($j = 0; $j < 10; $j++) {
                if ($number[$j] < $max_safe[$j]) {
                    break;
                }
                if ($number[$j] > $max_safe[$j]) {
                    return ($sign === 1) ? $INT_MAX : $INT_MIN;
                }
            }
        }
        
        $result = (int)$number;
        $result *= $sign;
        
        if ($result > $INT_MAX) return $INT_MAX;
        if ($result < $INT_MIN) return $INT_MIN;
        
        return $result;
    }
}

$solution = new Solution();
echo "Test 1: " . $solution->myAtoi("42") . "\n";             // Expected: 42
echo "Test 2: " . $solution->myAtoi("   -42") . "\n";         // Expected: -42
echo "Test 3: " . $solution->myAtoi("4193 with words") . "\n"; // Expected: 4193
echo "Test 4: " . $solution->myAtoi("words and 987") . "\n";  // Expected: 0
echo "Test 5: " . $solution->myAtoi("-91283472332") . "\n";   // Expected: -2147483648
echo "Test 6: " . $solution->myAtoi("2147483648") . "\n";     // Expected: 2147483647
?>