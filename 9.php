<?php
/**
 * @param Integer $x
 * @return Boolean
 */
function isPalindrome($x) {
    if ($x < 0) {
        return false;
    }
    
    if ($x < 10) {
        return true;
    }
    
    if ($x % 10 == 0 && $x != 0) {
        return false;
    }
    
    $str = (string)$x;
    return $str === strrev($str);
    
}

var_dump(isPalindrome(121));
var_dump(isPalindrome(-121)); 
var_dump(isPalindrome(10)); 
var_dump(isPalindrome(12321)); 
?>