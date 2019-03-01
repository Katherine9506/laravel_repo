<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019\3\2 0002
 * Time: 1:31
 */

namespace App\models;

class Node
{
    public $key;
    public $parent;
    public $left;
    public $right;
    public $IsRed;  //分辨红节点或黑节点

    public function __construct($key, $IsRed = TRUE)
    {
        $this->key = $key;
        $this->parent = NULL;
        $this->left = NULL;
        $this->right = NULL;
        //插入结点默认是红色
        $this->IsRed = $IsRed;
    }
}
