<?php
class Contact
{
    private $first_name;
    private $last_name;
    private $phone;
    private $city;
    private $state;
    private $zip;

    function __construct($first_name, $last_name, $phone, $city, $state, $zip)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->phone = $phone;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
    }

    function getFirstName()
    {
        return $this->first_name;
    }

    function getLastName()
    {
        return $this->last_name;
    }

    function getPhone()
    {
        return $this->phone;
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

    function setFirstName($new_first_name)
    {
        $this->name = (string) $new_first_name;
    }

    function setLastName($new_last_name)
    {
        $this->name = (string) $new_last_name;
    }

    function setPhone($new_phone)
    {
        $this->phone = (integer) $new_phone;  // need to change type if phone # comes in formatted, ex: 555-555-1212
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
