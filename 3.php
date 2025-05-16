<?php
/**
 * @param String $s
 * @return Integer
 */
function lengthOfLongestSubstring($s) {
    if (empty($s)) {
        return 0;
    }
    
    $n = strlen($s);
    $maxLength = 0;
    $charMap = [];
    $left = 0;
    
    for ($right = 0; $right < $n; $right++) {
        $currentChar = $s[$right];
        

        if (isset($charMap[$currentChar]) && $charMap[$currentChar] >= $left) {
            $left = $charMap[$currentChar] + 1;
        }
        
        $charMap[$currentChar] = $right;
        
        $maxLength = max($maxLength, $right - $left + 1);
    }
    
    return $maxLength;
}

echo lengthOfLongestSubstring("abcabcbb") . "\n";  // Output: 3
echo lengthOfLongestSubstring("bbbbb") . "\n";     // Output: 1
echo lengthOfLongestSubstring("pwwkew") . "\n";    // Output: 3
echo lengthOfLongestSubstring("") . "\n";          // Output: 0