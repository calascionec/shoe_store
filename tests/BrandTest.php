<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Store.php";
    require_once "src/Brand.php";


    $server = 'mysql:host=localhost;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class BrandTest extends PHPUnit_Framework_TestCase
    {


        protected function tearDown()
        {
            Store::deleteAll();
            Brand::deleteAll();
        }


        function testGetName()
        {
            //Arrange
            $name = "Nike";
            $test_brand = new Brand($name);

            //Act
            $result = $test_brand->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function testSetName()
        {
            //Arrange
            $name = "Nike";
            $test_brand = new Brand($name);

            $new_name = "Puma";

            //Act
            $test_brand->setName($new_name);
            $result = $test_brand->getName();

            //Assert
            $this->assertEquals($new_name, $result);
        }

        function testGetId()
        {
            //Arrange
            $name = "Nike";
            $id = 1;
            $test_brand = new Brand($name, $id);

            //Act
            $result = $test_brand->getId();

            //Assert
            $this->assertEquals($id, $result);
        }

        function testSave()
        {
            //Arrange
            $name = "Nike";
            $id = 1;
            $test_brand = new Brand($name, $id);

            $test_brand->save();

            //Act
            $result = Brand::getAll();

            //Assert
            $this->assertEquals($test_brand, $result[0]);
        }

        function testgetAll()
        {
            //Arrange
            $name = "Nike";
            $id = 1;
            $test_brand = new Brand($name, $id);

            $test_brand->save();

            $name2 = "Puma";
            $id2 = 2;
            $test_brand2 = new Brand($name2, $id2);

            $test_brand2->save();

            //Act
            $result = Brand::getAll();

            //Assert
            $this->assertEquals([$test_brand, $test_brand2], $result);
        }

        function testDeleteAll()
        {

            //Arrange
            $name = "Nike";
            $id = 1;
            $test_brand = new Brand($name, $id);

            $test_brand->save();

            $name2= "Puma";
            $id2 = 2;
            $test_brand2 = new Brand($name2, $id2);

            $test_brand2->save();

            //Act
            Brand::deleteAll();
            $result = Brand::getAll();

            //Assert
            $this->assertEquals([], $result);

        }

    }
 ?>
