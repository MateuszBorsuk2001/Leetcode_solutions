<?php
class Solution {
    function isMatch(string $s, string $p): bool {
        $sLength = strlen($s);
        $pLength = strlen($p);
        
        $dp = array_fill(0, $sLength + 1, array_fill(0, $pLength + 1, false));
        
        $dp[0][0] = true;
        
        for ($j = 1; $j <= $pLength; $j++) {
            if ($p[$j - 1] === '*') {
                $dp[0][$j] = $dp[0][$j - 2];
            }
        }
        
        for ($i = 1; $i <= $sLength; $i++) {
            for ($j = 1; $j <= $pLength; $j++) {
                if ($p[$j - 1] === '.' || $p[$j - 1] === $s[$i - 1]) {
                    $dp[$i][$j] = $dp[$i - 1][$j - 1];
                } 
                elseif ($p[$j - 1] === '*') {
                    $dp[$i][$j] = $dp[$i][$j - 2];
                    
                    if ($p[$j - 2] === '.' || $p[$j - 2] === $s[$i - 1]) {
                        $dp[$i][$j] = $dp[$i][$j] || $dp[$i - 1][$j];
                    }
                } 
                else {
                    $dp[$i][$j] = false;
                }
            }
        }
        
        return $dp[$sLength][$pLength];
    }
}

$solution = new Solution();
echo $solution->isMatch("aa", "a") ? "true" : "false";
echo "\n";
echo $solution->isMatch("aa", "a*") ? "true" : "false";
echo "\n";
echo $solution->isMatch("ab", ".*") ? "true" : "false";
?>
