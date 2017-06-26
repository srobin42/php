<?php
/*
 *  Class PhoneNumber validates a NANP and returns it in various forms.
 */
class PhoneNumber
{
    private $phone;
    private $areaCode;

    public function __construct($num) {
        if(preg_match('/[a-zA-Z]/', $num) === 1) {
            throw new InvalidArgumentException("Invalid phone number");            
        }

        $this->phone = preg_replace('/\D/',"", $num);
        switch(strlen($this->phone)) {
            case 10:
                $this->areaCode = substr($this->phone, 0, 3);
                break;
            case 11:
                if($this->phone[0] == 1) {
                    $this->phone = substr($this->phone, 1);
                    $this->areaCode = substr($this->phone, 0, 3);
                } else {
                    throw new InvalidArgumentException("Invalid country code");                    
                }
                break;
            default:
                throw new InvalidArgumentException("Invalid phone number");
        }

        return $this->phone;
    }

    public function number() {
        return $this->phone;
    }

    public function areaCode() {
        return $this->areaCode;
    }

    public function prettyPrint() {
        $pretty = "($this->areaCode) ". substr($this->phone, 3, 3) ."-" .substr($this->phone, 6);
        return $pretty;
    }
}
