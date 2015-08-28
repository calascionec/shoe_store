<?php

    class Brand
    {

        private $name;
        private $id;


        function __construct($name, $id = null)
        {
            $this->name = $name;
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

        function getId()
        {
            return $this->id;
        }
        ///////////////End Getters and Setters//////////////


        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO brands (name) VALUES ('{$this->name}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }


        ////////////////////Static functions/////////////////

        static function getAll()
        {
            $returned_brands = $GLOBALS['DB']->query("SELECT * FROM brands");
            $brands = array();
            foreach($returned_brands as $brand){
                $name = $brand["name"];
                $id = $brand["id"];
                $new_brand = new Brand($name, $id);
                array_push($brands, $new_brand);
            }

            return $brands;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM brands");
        }

    }



 ?>
