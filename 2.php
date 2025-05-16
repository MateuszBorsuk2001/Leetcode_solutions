<?php
class ListNode {
    public $val = 0;
    public $next = null;
    
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution {
    function addTwoNumbers($l1, $l2) {
        $dummyHead = new ListNode(0);
        $current = $dummyHead;
        $carry = 0;
        
        while ($l1 !== null || $l2 !== null) {
            $x = ($l1 !== null) ? $l1->val : 0;
            $y = ($l2 !== null) ? $l2->val : 0;
            
            $sum = $x + $y + $carry;
            $carry = intval($sum / 10);
            
            $current->next = new ListNode($sum % 10);
            $current = $current->next;
            
            if ($l1 !== null) $l1 = $l1->next;
            if ($l2 !== null) $l2 = $l2->next;
        }
        
        if ($carry > 0) {
            $current->next = new ListNode($carry);
        }
        
        return $dummyHead->next;
    }
}

function createLinkedList($arr) {
    $dummyHead = new ListNode(0);
    $current = $dummyHead;
    
    foreach ($arr as $val) {
        $current->next = new ListNode($val);
        $current = $current->next;
    }
    
    return $dummyHead->next;
}

function linkedListToArray($head) {
    $result = [];
    $current = $head;
    
    while ($current !== null) {
        $result[] = $current->val;
        $current = $current->next;
    }
    
    return $result;
}

echo "Przykład 1:\n";
$l1 = createLinkedList([2, 4, 3]);
$l2 = createLinkedList([5, 6, 4]);
$solution = new Solution();
$result = $solution->addTwoNumbers($l1, $l2);
echo "Lista 1: [2,4,3] (liczba 342)\n";
echo "Lista 2: [5,6,4] (liczba 465)\n";
echo "Wynik:   " . json_encode(linkedListToArray($result)) . " (liczba 807)\n";
echo "Sprawdzenie: 342 + 465 = " . (342 + 465) . "\n\n";

echo "Przykład 2:\n";
$l1 = createLinkedList([0]);
$l2 = createLinkedList([0]);
$result = $solution->addTwoNumbers($l1, $l2);
echo "Lista 1: [0] (liczba 0)\n";
echo "Lista 2: [0] (liczba 0)\n";
echo "Wynik:   " . json_encode(linkedListToArray($result)) . " (liczba 0)\n";
echo "Sprawdzenie: 0 + 0 = " . (0 + 0) . "\n\n";

echo "Przykład 3:\n";
$l1 = createLinkedList([9, 9, 9, 9, 9, 9, 9]);
$l2 = createLinkedList([9, 9, 9, 9]);
$result = $solution->addTwoNumbers($l1, $l2);
echo "Lista 1: [9,9,9,9,9,9,9] (liczba 9999999)\n";
echo "Lista 2: [9,9,9,9] (liczba 9999)\n";
echo "Wynik:   " . json_encode(linkedListToArray($result)) . "\n";
echo "Sprawdzenie: 9999999 + 9999 = " . (9999999 + 9999) . "\n";
?>
