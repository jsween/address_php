<?php
class Contact
{
    /******Properties******/
    private $first_name;
    /******Constructor******/
    function __construct($first_name)
    {
        $this->first_name = $first_name;
    }
    /******Setters******/
    function setFirstName($new_first_name)
    {
        $this->first_name = $new_first_name;
    }
    /******Getters******/
    function getFirstName()
    {
        return $this->first_name;
    }
    /******Functions******/
    //save
    function save()
    {
        array_push($_SESSION['list_of_contacts'], $this);
    }
    //get all contacts
    static function getAll()
    {
        return $_SESSION['list_of_contacts'];
    }
    //delete all contacts
    static function deleteAll()
    {
        $_SESSION['list_of_contacts'] = array();
    }

}
 ?>
