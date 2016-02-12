<?php
class Address
{
    /****Properties****/
    private $street;
    private $city;
    private $state;
    private $zip;
    /****Constructor****/
    function __construct($street, $city, $state, $zip)
    {
        $this->street = $street;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
    }
    /****Setters****/
    function setStreet($new_street)
    {
        $this->street = (string) $new_street;
    }
    function setCity($new_city)
    {
        $this->city = (string) $new_city;
    }
    function setState($new_state)
    {
        $this->state = (string) $new_state;
    }
    function setZip($new_zip)
    {
        $this->zip = (string) $new_zip;
    }
    /****Getters****/
    function getStreet()
    {
        return $this->street;
    }
    function getCity()
    {
        return $this->city;
    }
    function getState()
    {
        return $this->state;
    }
    function getZip()
    {
        return $this->zip;
    }
}
 ?>
