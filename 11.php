<?php

class Solution {
    function maxArea($height) {
        $left = 0;
        $right = count($height) - 1;
        $maxArea = 0;
        
        while ($left < $right) {
            $area = min($height[$left], $height[$right]) * ($right - $left);
            $maxArea = max($maxArea, $area);
            
            if ($height[$left] < $height[$right]) {
                $left++;
            } else {
                $right--;
            }
        }
        
        return $maxArea;
    }
}

$solution = new Solution();

echo $solution->maxArea([1,8,6,2,5,4,8,3,7]) . "\n";
echo $solution->maxArea([1,1]) . "\n";
echo $solution->maxArea([4,3,2,1,4]) . "\n";
echo $solution->maxArea([1,2,1]) . "\n";
echo $solution->maxArea([2,1]) . "\n";
echo $solution->maxArea([1,8,100,2,100,4,8,3,7]) . "\n";