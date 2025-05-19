<?php
class Solution {
    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x) {
        $isNegative = $x < 0;
        $x = abs($x);
        $reversed = (int)strrev((string)$x);
        
        if ($isNegative) {
            $reversed = -$reversed;
        }
        
        if ($reversed > 2147483647 || $reversed < -2147483648) {
            return 0;
        }
        
        return $reversed;
    }
}
?>