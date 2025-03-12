<?php

namespace Views;

/*
 * Example class
 *
 * @package Lab 4
 * @subpackage Views
 * @author Олексій Семенчук
*/
class UserView
{
    /*
     * Wrapps a given string in a HTML <h1> tag
     *
     * @access public
     * @return void
     * @param string $Title
    */
    public function GetView(string $Title): string
    {
        return "<h1>" . $Title . "</h1>";
    }
}
