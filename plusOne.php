/*
https://leetcode.com/problems/plus-one/submissions/

Runtime: 18 ms, faster than 22.90% of PHP online submissions for Plus One.
Memory Usage: 19.3 MB, less than 24.05% of PHP online submissions for Plus One.
*/
<?php
class Solution {

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne($digits)
    {
        $lastIndex = count($digits) - 1;
        $skip = false;
        
        for($index = $lastIndex; $index >= 0; $index--) {
            $previousIndex = $index - 1;
            
            var_dump('index: ' . $index);
            var_dump($digits[$index]);
            
            if($skip === true && $digits[$index] < 10) {
                return $digits;
            }
            
            if($digits[$index] >= 9) {
                $digits[$index] = 0;
                
                if($index === 0) {
                    array_unshift($digits, 1);
                    return $digits;
                } else {
                    $digits[$previousIndex] += 1;
                    $skip = true;
                }
            } else {
                if($skip === false) {
                    $digits[$index] += 1;
                    return $digits;
                } else {
                    return $digits;
                }
            }
        }
        
        return $digits;        
    }
}
