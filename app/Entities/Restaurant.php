<?php namespace App\Entities;

use CodeIgniter\Entity;

class Restaurant extends Entity
{
    public function verifyPassword(string $pass){
        
        return password_verify($pass, $this->password);
    }
    public function setPassword(string $pass)
    {
        $this->attributes['password'] = password_hash($pass, PASSWORD_BCRYPT);

        return $this;
    }
    public function getAttributes(){
        return $this->attributes; 
    }
}