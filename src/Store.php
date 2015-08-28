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

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO stores (name, location) VALUES ('{$this->getName()}', '{$this->getLocation()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        //////////////////Static functions////////////////////////////

        static function getAll()
        {
            $returned_stores = $GLOBALS['DB']->query("SELECT * FROM stores");
            $stores = array();
            foreach($returned_stores as $store) {
                $name = $store['name'];
                $location = $store['location'];
                $id = $store['id'];
                $new_store = new Store($name, $location, $id);
                array_push($stores, $new_store);
            }

            return $stores;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stores");
        }


    }








 ?>
