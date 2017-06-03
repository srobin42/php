<?php
/**
 * Class Series calculates the largest product of (n) consecutive digits in a string of numbers.
 */
class Series
{
    private $series;
    private $length;

    public function __construct($input)
    {
        $this->length = strlen($input);      
        //input must be either empty string or only digits
        if (($this->length==0) || (is_numeric($input))) {
            $this->series = str_split($input);
        } else {
            throw new InvalidArgumentException("String must contain only digits.");  
        }

    }

    public function largestProduct($n) {
        if (($this->length < $n) || ($n < 0)) {
            //$n must be shorter than series length
            throw new InvalidArgumentException("Invalid length for product argument.");             
        } else if ($n == 0) {
            //$n=0, product=1 : there is always one 0-char string in every string incl empty strings
            return 1;          
        } else {
            $maxProduct = 0;
            for ($i=0; $i<=$this->length - $n; $i++) {
                $arr = array_slice($this->series, $i, $n);
                $newProduct = array_reduce($arr, function($carry, $item) {
                    return $carry *= $item;
                },1);
                /* could also use array_product function:
                $newProduct = array_product(array_slice($this->series, $i, $n);
                */
                $maxProduct = ($newProduct > $maxProduct  ? $newProduct: $maxProduct);
            }
            return $maxProduct;
        }
    }
}
