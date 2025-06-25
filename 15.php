<?php

class Solution {
    
    function threeSum($nums) {
        $result = [];
        $n = count($nums);
        
        sort($nums);
        
        if ($n < 3) {
            return $result;
        }
        
        for ($i = 0; $i < $n - 2; $i++) {
            if ($i > 0 && $nums[$i] == $nums[$i - 1]) {
                continue;
            }
            
            $left = $i + 1;
            $right = $n - 1;
            
            while ($left < $right) {
                $sum = $nums[$i] + $nums[$left] + $nums[$right];
                
                if ($sum == 0) {
                    $result[] = [$nums[$i], $nums[$left], $nums[$right]];
                    
                    while ($left < $right && $nums[$left] == $nums[$left + 1]) {
                        $left++;
                    }
                    
                    while ($left < $right && $nums[$right] == $nums[$right - 1]) {
                        $right--;
                    }
                    
                    $left++;
                    $right--;
                } elseif ($sum < 0) {
                    $left++;
                } else {
                    $right--;
                }
            }
        }
        
        return $result;
    }
}

$solution = new Solution();

$nums1 = [-1, 0, 1, 2, -1, -4];
$result1 = $solution->threeSum($nums1);
echo "Input: [" . implode(", ", $nums1) . "]\n";
echo "Output: [";
foreach ($result1 as $i => $triplet) {
    if ($i > 0) echo ", ";
    echo "[" . implode(", ", $triplet) . "]";
}
echo "]\n\n";

$nums2 = [0, 1, 1];
$result2 = $solution->threeSum($nums2);
echo "Input: [" . implode(", ", $nums2) . "]\n";
echo "Output: [";
foreach ($result2 as $i => $triplet) {
    if ($i > 0) echo ", ";
    echo "[" . implode(", ", $triplet) . "]";
}
echo "]\n\n";

$nums3 = [0, 0, 0];
$result3 = $solution->threeSum($nums3);
echo "Input: [" . implode(", ", $nums3) . "]\n";
echo "Output: [";
foreach ($result3 as $i => $triplet) {
    if ($i > 0) echo ", ";
    echo "[" . implode(", ", $triplet) . "]";
}
echo "]\n";

?>