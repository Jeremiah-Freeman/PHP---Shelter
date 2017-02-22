<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */


    require_once "src/Type.php";
    require_once "src/Animal.php";

    $server= 'mysql:host=localhost:8889;dbname=shelter_test';
    $username= 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class TypeTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Type::deleteAll();
        }
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
        function test_save()
        {
            //Arrange
            $type = "lion";
            $test_type = new Type($type);
            $test_type-> save();

            //Act
            $result = Type::getAll();

            //Assert
            $this->assertEquals($test_type,$result[0]);
        }
        function test_getAll()
        {
            //Arrange
            $type = "lion";
            $type2 = "shark";
            $test_type = new Type($type);
            $test_type->save();
            $test_type2 = new Type($type2);
            $test_type2->save();

            //Act
            $result = Type::getAll();

            //Assert
            $this->assertEquals([$test_type,$test_type2], $result);

        }

        function test_find()
        {
            //Arrange
            $type = "lion";
            $type2 = "shark";
            $test_type = new Type($type);
            $test_type->save();
            $test_type2 = new Type($type2);
            $test_type2->save();

            //Act
            $result = Type::find($test_type->getId());

            //Assert
            $this->assertEquals($test_type, $result);

        }

        function test_getAnimals()
        {
            //Arrange
            $type = "lion";
            $test_type = new Type($type);
            $test_type-> save();
            $name = "Mr. Lion";
            $age = 50;
            $date_of_admittance = '2017-02-21';
            $name2 = "Mrs. Lion";
            $age2 = 48;
            $date_of_admittance2 = '2017-02-23';
            $id_type = $test_type->getId();
            $test_animal = new Animal($name,$age,$date_of_admittance,$id_type);
            $test_animal->save();
            $test_animal2 = new Animal($name2,$age2,$date_of_admittance2,$id_type);
            $test_animal2->save();

            //Act
            $result = $test_type->getAnimals();

            //Assert
            $this->assertEquals([$test_animal,$test_animal2], $result);

        }

    }



?>
