<?php
/**
 * Created by PhpStorm.
 * User: lorszil
 * Date: 2017. 08. 01.
 * Time: 13:11
 */

class Tractor{

    public $brand = "";
    public $type = "";
    public $price;
    public $performance;
    public $description = "";

    public function __construct($brand, $type , $price, $performance, $description){
        $this->brand = $brand;
        $this->type = $type ;
        $this->price = $price;
        $this->performance = $performance;
        $this->description = $description;
    }

}
