<?php
// LeetCode 17: Letter Combinations of a Phone Number

class Solution {
    public function letterCombinations($digits) {
        if ($digits === "") return [];
        $map = [
            '2' => ['a', 'b', 'c'],
            '3' => ['d', 'e', 'f'],
            '4' => ['g', 'h', 'i'],
            '5' => ['j', 'k', 'l'],
            '6' => ['m', 'n', 'o'],
            '7' => ['p', 'q', 'r', 's'],
            '8' => ['t', 'u', 'v'],
            '9' => ['w', 'x', 'y', 'z']
        ];
        $result = [];
        $backtrack = function($combination, $next_digits) use (&$backtrack, &$result, $map) {
            if (strlen($next_digits) == 0) {
                $result[] = $combination;
            } else {
                $digit = $next_digits[0];
                foreach ($map[$digit] as $letter) {
                    $backtrack($combination . $letter, substr($next_digits, 1));
                }
            }
        };
        $backtrack("", $digits);
        return $result;
    }
}

// Sample usage:
$digits = "23";
$sol = new Solution();
print_r($sol->letterCombinations($digits));
