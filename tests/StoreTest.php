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

    class StoreTest extends PHPUnit_Framework_TestCase
    {


        protected function tearDown()
        {
            Store::deleteAll();
            // Brand::deleteAll();
        }


        function testGetName()
        {
            //Arrange
            $name = "shoe store";
            $location = "1234 nw 1st street";
            $test_store = new Store($name, $location);

            //Act
            $result = $test_store->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function testSetName()
        {
            //Arrange
            $name = "shoe store";
            $location = "1234 nw 1st street";
            $test_store = new Store($name, $location);

            $new_name = "new store";

            //Act
            $test_store->setName($new_name);
            $result = $test_store->getName();

            //Assert
            $this->assertEquals($new_name, $result);
        }

        function testGetLocation()
        {
            //Arrange
            $name = "shoe store";
            $location = "1234 nw 1st street";
            $test_store = new Store($name, $location);

            //Act
            $result = $test_store->getLocation();

            //Assert
            $this->assertEquals($location, $result);
        }

        function testSetLocation()
        {
            //Arrange
            $name = "shoe store";
            $location = "1234 nw 1st street";
            $test_store = new Store($name, $location);

            $new_location = "5555 sw 2nd street";

            //Act
            $test_store->setLocation($new_location);
            $result = $test_store->getLocation();

            //Assert
            $this->assertEquals($new_location, $result);
        }

        function testGetId()
        {
            //Arrange
            $name = "shoe store";
            $location = "1234 nw 1st street";
            $id = 4;
            $test_store = new Store($name, $location, $id);

            //Act
            $result = $test_store->getId();

            //Assert
            $this->assertEquals($id, $result);
        }

        function testsave()
        {
            //Arrange
            $name = "shoe store";
            $location = "1234 nw 1st street";
            $id = 4;
            $test_store = new Store($name, $location, $id);

            $test_store->save();

            //Act
            $result = Store::getAll();

            //Assert
            $this->assertEquals($test_store, $result[0]);
        }

        function testGetAll()
        {
            //Arrange
            $name = "shoe store";
            $location = "1234 nw 1st street";
            $id = 4;
            $test_store = new Store($name, $location, $id);

            $test_store->save();

            $name2 = "other store";
            $location2 = "5555 sw 2nd street";
            $id2 = 3;
            $test_store2 = new Store($name2, $location2, $id2);

            $test_store2->save();

            //Act
            $result = Store::getAll();

            //Assert
            $this->assertEquals([$test_store, $test_store2], $result);

        }

        function testDeleteAll()
        {
            //Arrange
            $name = "shoe store";
            $location = "1234 nw 1st street";
            $id = 4;
            $test_store = new Store($name, $location, $id);

            $test_store->save();

            $name2 = "other store";
            $location2 = "5555 sw 2nd street";
            $id2 = 3;
            $test_store2 = new Store($name2, $location2, $id2);

            $test_store2->save();

            //Act
            Store::deleteAll();
            $result = Store::getAll();

            //Assert
            $this->assertEquals([], $result);

        }




    }





 ?>
