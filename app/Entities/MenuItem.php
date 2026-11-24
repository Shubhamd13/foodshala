<?php namespace App\Entities;

use CodeIgniter\Entity;

class MenuItem extends Entity
{
    public function setPrice(string $price)
    {
        $price = (int)$price;
        if($price<0){
            $this->attributes['price'] = 0;
        }
        $this->attributes['price'] = $price;
        return $this;
    }
    public function getAttributes(){
        return $this->attributes; 
    }
}