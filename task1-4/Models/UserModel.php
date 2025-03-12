<?php

namespace Models;
  
/*
 * Example class
 *
 * @package Lab 4
 * @subpackage Models
 * @author Семенчук Олексій
*/
class UserModel
{
    /*
     * Returns a Person model
     *
     * @access public
     * @return object
    */
    public function GetModel(): object
    {
        $Person = (object)array(
            "name" => "FearessAtom",
            "age" => "18",
        );

        return $Person;
    }
}
