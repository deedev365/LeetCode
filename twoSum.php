<?php

class TwoSum {

    private array $cases = [
        [
            'nums' => [3,4,12,15],
            'sum' => 7,
            'expect' => [1,0]
        ],
        [
            'nums' => [3,2,7,15],
            'sum' => 9,
            'expect' => [2,1]
        ]
    ];

    public function __construct()
    {
        $this->check();
    }

    /**
     * @param Integer[] $nums
     * @param Integer $target
     
     * @return Integer[]
     */
    public function execute($nums, $target) {
        $lastIndex = count($nums) - 1;
        $sum = 0;
        
        for($i = $lastIndex; $i >= 0; $i--) {
            for($j = $lastIndex; $j >= 0; $j--) {
                if ($i !== $j) {
                    $sum = $nums[$i] + $nums[$j];
                    //echo $i. ' ' . $j . ' ' . $sum  . "\n";
                    if ($target === $sum) {
                        return [$i, $j];
                    }
                }
                
            }    
        }
    }
    
    public function check()
    {
        foreach($this->cases as $case) {
            $sum = $this->execute($case['nums'], $case['sum']);
            
            if($sum == $case['expect']) {
                echo 'Okay' . "\n";
            } else {
                echo 'Wrong' . "\n";
            }
            
            var_dump($sum);
        }
    }
}

new TwoSum();
