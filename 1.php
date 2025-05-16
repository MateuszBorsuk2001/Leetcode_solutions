<?php
/**
 * @param Integer[] $nums
 * @param Integer $target
 * @return Integer[]
 */
function twoSum($nums, $target) {
    $map = [];
    
    for ($i = 0; $i < count($nums); $i++) {
        $complement = $target - $nums[$i];
        
        if (array_key_exists($complement, $map)) {
            return [$map[$complement], $i];
        }
        
        $map[$nums[$i]] = $i;
    }
    
    return []; 
}

echo implode(' , ', twoSum([2, 7, 11, 15], 9)); // Output: 0, 1
echo PHP_EOL;
echo implode(' , ', twoSum([3, 2, 4], 6));     // Output: 1, 2
echo PHP_EOL;
echo implode(' , ', twoSum([3, 3], 6));        // Output: 0, 1
?>