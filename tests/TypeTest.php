<?php

    /**
    * @backGlobals disabled
    * @backupstaticAttributes disabled
    */


    require_once "src/Type.php";

    $server= 'mysql:host=localhost:8889;dbname=shelter_test';
    $username= 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class TypeTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //     Types::deleteAll();
        // }
        function test_get_type()
        {
            //Arrange
            $type = "lion";
            $test_type = new Type($type);

            //Act
            $result = $test_type->getType();

            //Assert
            $this->assertEquals($type,$result);
        }

        function test_get_id()
        {
            //Arrange
            $id = 1;
            $type = "lion";
            $test_id = new Type($type,$id);

            //Act
            $result = $test_id->getId();

            //Assert
            $this->assertEquals($id,$result);
        }

    }



?>
