<?php
/**
 * Created by PhpStorm.
 * User: liull
 * Date: 2016-3-18
 * Time: 16:10
 */
class talker{

    private $data = 'Hi';

    public function & get(){
        return $this->data;
    }

    public function out(){
        echo $this->data."\n";
    }

}

$aa = new talker();
$d = &$aa->get();

$aa->out();
$d = 'How';print_r($GLOBALS);
$aa->out();
$d = 'Are';
$aa->out();
$d = 'You';
$aa->out();