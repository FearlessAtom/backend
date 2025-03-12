<?php

namespace Controllers;

/*
 * Example class
 *
 * @package Lab 4
 * @subpackage Controllers
 * @author Олексій Семенчук
*/
class UserController
{
    /*
     * Displays the given Model
     *
     * @access public
     * @return void
     * @param UserView $View
     * @param UserModel $Model
    */
    public function GetController($View, $Model): void
    {
        echo $View->GetView($Model->GetModel()->name) . "\n";
    }
}
