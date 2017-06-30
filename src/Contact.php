<?php
class Contact
{
    private $first_name;
    private $last_name;
    private $street;
    private $city;
    private $state;
    private $zip;
    private $phone;

    function __construct($first_name, $last_name, $street, $city, $state, $zip, $phone)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->street = $street;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
        $this->phone = $phone;
    }

    function getFirstName()
    {
        return $this->first_name;
    }

    function getLastName()
    {
        return $this->last_name;
    }

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

    function getPhone()
    {
        return $this->phone;
    }

    function setFirstName($new_first_name)
    {
        $this->first_name = (string) $new_first_name;
    }

    function setLastName($new_last_name)
    {
        $this->last_name = (string) $new_last_name;
    }

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
        $this->zip = (integer) $new_zip;
    }

    function setPhone($new_phone)
    {
        $this->phone = (integer) $new_phone;  // need to change type if phone # comes in formatted, ex: 555-555-1212
    }

    function save()  // pushes each new contact to array; saves in $_SESSION variable 'list_of_contacts'
    {
        array_push($_SESSION['list_of_contacts'], $this);
    }

    static function getAll()  // retrieves 'list_of_contacts' from $_SESSION variable
    {
        return $_SESSION['list_of_contacts'];
    }

    static function deleteAll()  // deletes 'list_of_contacts' array
    {
        $_SESSION['list_of_contacts'] = array();
    }
}
?>
