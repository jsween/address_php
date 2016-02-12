<?php
class Contact
{
    /******Properties******/
    private $first_name;
    private $last_name;
    /******Constructor******/
    function __construct($first_name)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }
    /******Setters******/
    function setFirstName($new_first_name)
    {
        $this->first_name = $new_first_name;
    }
    function setLastName($new_last_name)
    {
        $this->last_name = $new_last_name;
    }
    /******Getters******/
    function getFirstName()
    {
        return $this->first_name;
    }
    function getLastName()
    {
        return $this->Last_name;
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
