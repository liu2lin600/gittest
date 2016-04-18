<?php
/**
 * Created by PhpStorm.
 * User: liull
 * Date: 2016-3-28
 * Time: 14:19
 */
interface IProduct{
    function apples();
    function books();
}

class FruitStore implements IProduct{
    public function apples(){
        return  'Fruit shop-----We have apples';
    }
    public function books(){
        return  'Fruit shop-----We don\'t have books';
    }
}

class BookStore implements IProduct{
    public function apples(){
        return  'Fruit shop-----We don\'t have apples';
    }
    public function books(){
        return  'Fruit shop-----We have books';
    }
}

class useProduct{
    public function __construct(){
        $apple = new FruitStore();
        $book = new BookStore();
        $this->doInterface($apple);
        $this->doInterface($book);
        //实例化类在一个方法中，调用类的方法又在另一个方法中，降低了耦合度
    }
    function doInterface(IProduct $product){
        echo $product->apples()."\n";
        echo $product->books()."\n";
    }
}
$worker = new useProduct();