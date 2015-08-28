<?php

    class Store
    {

        private $name;
        private $location;
        private $id;


        function __construct($name, $location, $id = null)
        {
            $this->name = $name;
            $this->location = $location;
            $this->id = $id;
        }

        //Getters and Setters

        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function getLocation()
        {
            return $this->location;
        }

        function setLocation($new_location)
        {
            $this->location = $new_location;
        }

        function getId()
        {
            return $this->id;
        }



    }








 ?>
