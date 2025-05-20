<?php
class Solution {
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
        
        while ($i < $length && $s[$i] == '0') {
            $i++;
        }
        
        $INT_MAX = 2147483647;
        $INT_MIN = -2147483648;
        
        while ($i < $length && ctype_digit($s[$i])) {
            $digit = (int)$s[$i];
            
            if ($result > $INT_MAX / 10 || 
                ($result == $INT_MAX / 10 && $digit > ($sign == 1 ? 7 : 8))) {
                return ($sign == 1) ? $INT_MAX : $INT_MIN;
            }
            
            $result = $result * 10 + $digit;
            $i++;
        }
        
        $result *= $sign;
        
        if ($result > $INT_MAX) return $INT_MAX;
        if ($result < $INT_MIN) return $INT_MIN;
        
        return $result;
    }
}

$solution = new Solution();
echo "Test 1: " . $solution->myAtoi("42") . "\n";
echo "Test 2: " . $solution->myAtoi("   -42") . "\n";
echo "Test 3: " . $solution->myAtoi("4193 with words") . "\n";
echo "Test 4: " . $solution->myAtoi("words and 987") . "\n";
echo "Test 5: " . $solution->myAtoi("-91283472332") . "\n";
echo "Test 6: " . $solution->myAtoi("2147483648") . "\n";
echo "Test 7: " . $solution->myAtoi(" 0000000000012345678") . "\n";
?>