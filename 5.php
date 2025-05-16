<?php
class Solution {
    function longestPalindrome($s) {
        if (empty($s)) {
            return "";
        }

        $start = 0;
        $maxLength = 1;
        $len = strlen($s);

        for ($i = 0; $i < $len; $i++) {
            $len1 = $this->expandAroundCenter($s, $i, $i);
            $len2 = $this->expandAroundCenter($s, $i, $i + 1);
            $currMaxLength = max($len1, $len2);
            
            if ($currMaxLength > $maxLength) {
                $maxLength = $currMaxLength;
                $start = $i - floor(($currMaxLength - 1) / 2);
            }
        }
        
        return substr($s, $start, $maxLength);
    }
    
    function expandAroundCenter($s, $left, $right) {
        while ($left >= 0 && $right < strlen($s) && $s[$left] === $s[$right]) {
            $left--;
            $right++;
        }
        return $right - $left - 1;
    }
}

$solution = new Solution();
echo $solution->longestPalindrome("babad") . "\n";  // Output: "bab" or "aba"
echo $solution->longestPalindrome("cbbd") . "\n";   // Output: "bb"
echo $solution->longestPalindrome("a") . "\n";      // Output: "a"
echo $solution->longestPalindrome("ac") . "\n";     // Output: "a"
echo $solution->longestPalindrome("racecar") . "\n"; // Output: "racecar"
echo $solution->longestPalindrome("bananas") . "\n"; // Output: "anana"
echo $solution->longestPalindrome("") . "\n";       // Output: ""
?>