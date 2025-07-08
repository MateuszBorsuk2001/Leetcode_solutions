<?php

class Solution {
    
    function threeSumClosest($nums, $target) {
        sort($nums);
        $n = count($nums);
        $closestSum = $nums[0] + $nums[1] + $nums[2];
        
        for ($i = 0; $i < $n - 2; $i++) {
            $left = $i + 1;
            $right = $n - 1;
            
            while ($left < $right) {
                $currentSum = $nums[$i] + $nums[$left] + $nums[$right];
                
                if (abs($currentSum - $target) < abs($closestSum - $target)) {
                    $closestSum = $currentSum;
                }
                
                if ($currentSum == $target) {
                    return $currentSum;
                }
                else if ($currentSum < $target) {
                    $left++;
                }
                else {
                    $right--;
                }
            }
        }
        
        return $closestSum;
    }
}

$solution = new Solution();

$nums1 = [-1, 2, 1, -4];
$target1 = 1;
echo "Input: nums = [" . implode(", ", $nums1) . "], target = $target1\n";
echo "Output: " . $solution->threeSumClosest($nums1, $target1) . "\n";
echo "Expected: 2\n\n";

$nums2 = [0, 0, 0];
$target2 = 1;
echo "Input: nums = [" . implode(", ", $nums2) . "], target = $target2\n";
echo "Output: " . $solution->threeSumClosest($nums2, $target2) . "\n";
echo "Expected: 0\n\n";

$nums3 = [1, 1, 1, 0];
$target3 = -100;
echo "Input: nums = [" . implode(", ", $nums3) . "], target = $target3\n";
echo "Output: " . $solution->threeSumClosest($nums3, $target3) . "\n";
echo "Expected: 2\n";

?>