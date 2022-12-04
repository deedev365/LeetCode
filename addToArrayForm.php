<?php
/*
https://leetcode.com/problems/add-to-array-form-of-integer/
The array-form of an integer num is an array representing its digits in left to right order.

For example, for num = 1321, the array form is [1,3,2,1].
Given num, the array-form of an integer, and an integer k, return the array-form of the integer num + k.

Example 1:
Input: num = [1,2,0,0], k = 34
Output: [1,2,3,4]
Explanation: 1200 + 34 = 1234

Example 2:
Input: num = [2,7,4], k = 181
Output: [4,5,5]
Explanation: 274 + 181 = 455

Example 3:
Input: num = [2,1,5], k = 806
Output: [1,0,2,1]
Explanation: 215 + 806 = 1021
*/

class Solution {

    public array $cases = [
        ['nums' => [1,2,0,0], 'plus' => 34, 'expect' => [1,2,3,4]],
        ['nums' => [2,7,4], 'plus' => 181, 'expect' => [4,5,5]],
        ['nums' => [2,1,5], 'plus' => 806, 'expect' => [1,0,2,1]],
        ['nums' => [0], 'plus' => 23, 'expect' => [2,3]],
        ['nums' => [0], 'plus' => 10000, 'expect' => [1,0,0,0,0]],
        ['nums' => [6], 'plus' => 809, 'expect' => [8,1,5]],
        ['nums' => [7], 'plus' => 993, 'expect' => [1,0,0,0]]
    ];

    /**
     * @param Integer[] $nums
     * @param Integer $plus
     * 
     * @return Integer[]
     */
    function addToArrayForm($nums, $plus)
    {
        $index = count($nums) - 1;
        $plus = (string) $plus;
        $plusIndex = strlen((string)$plus) - 1;
        $extra = 0;

        for($index; $index >= 0; $index--) {
            if($plusIndex >= 0) {
                $nums[$index] += $plus[$plusIndex];
                $plusIndex--;
            }
            
            if($extra > 0) {
                $nums[$index] += $extra;
                $extra = 0;
            }
            
            if($nums[$index] > 9) {
                $nums[$index] -= 10;
                $extra++;
            }
        }
        
        if($plusIndex >= 0) {
            for($plusIndex; $plusIndex >= 0; $plusIndex--) {
                $adding = $plus[$plusIndex] + $extra;
                $extra = 0;
                if ($adding > 9) {
                    $adding -= 10;
                    $extra = 1;
                }
                array_unshift($nums, $adding);
            }
        }
        
        if($extra > 0) {
            array_unshift($nums, $extra);    
        }
        
        return $nums;
    }
    
    public function checking($printResult = true)
    {
        foreach($this->cases as $key => $case) {
            $final = $this->addToArrayForm($case['nums'], $case['plus']);
            $caseNum = $key + 1;
            
            echo "Case №" . $caseNum . ': ';
            echo ($case['expect'] == $final) ? 'Okay' : 'Wrong';
            
            if($printResult) {
                echo "\n";
                var_dump($final);
            }
            echo "\n";
        }    
    }
}

$numbers = new Solution();
$numbers->checking();
