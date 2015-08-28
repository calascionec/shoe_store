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

        function updateName($new_name)
        {
            $GLOBALS['DB']->exec("INSERT INTO stores name SET '{$new_name}' WHERE id = {$this->id}");
            $this->name = $new_name;
        }

        function updateLocation($new_location)
        {
            $GLOBALS['DB']->exec("INSERT INTO stores location SET '{$new_location}' WHERE id = {$this->id}");
            $this->location = $new_location;
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

        static function find($search_id)
        {
            $found_store = null;
            $stores = Store::getAll();
            foreach($stores as $store){
                $store_id = $store->getId();
                if($store_id == $search_id) {
                    $found_store = $store;
                }
            }

            return $found_store;
        }


    }








 ?>
