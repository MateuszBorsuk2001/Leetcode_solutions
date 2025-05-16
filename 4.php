<?php
class Solution {
    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {

        if (count($nums1) > count($nums2)) {
            return $this->findMedianSortedArrays($nums2, $nums1);
        }
        
        $x = count($nums1);
        $y = count($nums2);
        $low = 0;
        $high = $x;
        
        while ($low <= $high) {
            $partitionX = (int)(($low + $high) / 2);
            $partitionY = (int)(($x + $y + 1) / 2 - $partitionX);
            
            $maxX = ($partitionX == 0) ? PHP_INT_MIN : $nums1[$partitionX - 1];
            $minX = ($partitionX == $x) ? PHP_INT_MAX : $nums1[$partitionX];
            
            $maxY = ($partitionY == 0) ? PHP_INT_MIN : $nums2[$partitionY - 1];
            $minY = ($partitionY == $y) ? PHP_INT_MAX : $nums2[$partitionY];
            
            if ($maxX <= $minY && $maxY <= $minX) {

                if (($x + $y) % 2 == 0) {
                    return (max($maxX, $maxY) + min($minX, $minY)) / 2;
                } else {
                    return max($maxX, $maxY);
                }
            } else if ($maxX > $minY) {
                $high = $partitionX - 1;
            } else {
                $low = $partitionX + 1;
            }
        }
        
        return 0.0;
    }
}