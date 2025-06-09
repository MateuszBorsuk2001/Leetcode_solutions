<?php

class Solution {
    function longestCommonPrefix($strs) {
        if (empty($strs)) {
            return "";
        }
        
        $prefix = $strs[0];
        
        for ($i = 1; $i < count($strs); $i++) {
            while (strpos($strs[$i], $prefix) !== 0) {
                $prefix = substr($prefix, 0, strlen($prefix) - 1);
                if (empty($prefix)) {
                    return "";
                }
            }
        }
        
        return $prefix;
    }
}

$solution = new Solution();

$test1 = ["flower","flow","flight"];
echo "Test 1: " . $solution->longestCommonPrefix($test1) . "\n";
$test2 = ["dog","racecar","car"];
echo "Test 2: " . $solution->longestCommonPrefix($test2) . "\n";
$test3 = ["interspecies","interstellar","interstate"];
echo "Test 3: " . $solution->longestCommonPrefix($test3) . "\n";
$test4 = ["throne","throne"];
echo "Test 4: " . $solution->longestCommonPrefix($test4) . "\n";
$test5 = ["single"];
echo "Test 5: " . $solution->longestCommonPrefix($test5) . "\n";
$test6 = [];
echo "Test 6: " . $solution->longestCommonPrefix($test6) . "\n";
?>