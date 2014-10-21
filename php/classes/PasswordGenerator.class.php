<?php

class PasswordGenerator {
    
    private $password;
    private $hash;
    
    public function __construct() {
        $this->hash = "sha512";
    }
    
    public function generatePassword($input) {
        return hash($this->hash, $input);
    }
    
    public function validatePassword($input, $stored) {
        if ($this->generatePassword($input) === $stored) {
            return true;
        }
        return false;
    }
}
