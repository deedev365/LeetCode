<?php
/*
https://leetcode.com/problems/plus-one/submissions/

Runtime: 3 ms, faster than 97.33% of PHP online submissions for Plus One.
Memory Usage: 19.2 MB, less than 72.14% of PHP online submissions for Plus One.
*/

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
            if($skip === true && $digits[$index] < 10) {
                return $digits;
            }
            
            $previousIndex = $index - 1;
            
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

class Solution2 {

/**
 * @param Integer[] $digits
 * @return Integer[]
 */
    function plusOne($digits) {
        $lastIndex = count($digits)-1;
        $extra = 0;

        for($index = $lastIndex; $index >= 0; $index--)
        {
            if($index == $lastIndex)
                $digits[$index]+=1;
            else {
                $digits[$index] += $extra;
                $extra = 0;
            }
            
            if ($digits[$index] > 9) {
                $digits[$index] -= 10;
                $extra = 1; 
            }
            
            if($extra == 0) {
                return $digits;
            }
        }
        if ($extra > 0) {
            array_unshift($digits, $extra);
        }
        
        return $digits;
    }
}
