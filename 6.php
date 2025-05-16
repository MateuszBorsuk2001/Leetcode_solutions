<?php
class Solution {
    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    function convert($s, $numRows) {
        if ($numRows == 1 || $numRows >= strlen($s)) {
            return $s;
        }
        
        $rows = array_fill(0, $numRows, "");
        $direction = -1; 
        $row = 0;
        
        for ($i = 0; $i < strlen($s); $i++) {
            $rows[$row] .= $s[$i];
            
            if ($row == 0 || $row == $numRows - 1) {
                $direction = -$direction;
            }
            
            $row += $direction;
        }
        
        return implode("", $rows);
    }
}


$solution = new Solution();
echo $solution->convert("PAYPALISHIRING", 3);  // Output: "PAHNAPLSIIGYIR"
echo $solution->convert("PAYPALISHIRING", 4);  // Output: "PINALSIGYAHRPI"
?>