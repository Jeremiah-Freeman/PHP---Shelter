<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Animal.php";
    require_once "src/Type.php";

    $server= 'mysql:host=localhost:8889;dbname=shelter_test';
    $username= 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class AnimalTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Animal::deleteAll();
            Type::deleteAll();
        }

        function test_animal_getters()
        {
            //Arrange
            $type = "lion";
            $id = 1;
            $test_type = new Type($type,$id);
            $name = "Mr. Lion";
            $age = 50;
            $date_of_admittance = '2017-02-21';
            $id_type = $test_type->getId();
            $test_animal = new Animal($name,$age,$date_of_admittance,$id_type,$id);


            //Act
            $test_values = array(
                'name' => "Mr. Lion",
                'age'=>50,
                'date_of_admittance'=>'2017-02-21',
                'id_type'=>1,
                'id' => 1
            );
            $result = array(
                'name' => $test_animal->getName(),
                'age'=>$test_animal->getAge(),
                'date_of_admittance'=>$test_animal->getDateOfAdmittance(),
                'id_type'=>$test_animal->getIdType(),
                'id' => $test_animal->getId()
            );

            //Assert
            $this->assertEquals($test_values,$result);
        }

        // function test_save()
        // {
        //     //Arrange
        //     $type = "lion";
        //     $test_type = new Type($type);
        //     $test_type-> save();
        //
        //     //Act
        //     $result = Type::getAll();
        //
        //     //Assert
        //     $this->assertEquals($test_type,$result[0]);
        // }
        // function test_getAll()
        // {
        //     //Arrange
        //     $type = "lion";
        //     $type2 = "shark";
        //     $test_type = new Type($type);
        //     $test_type->save();
        //     $test_type2 = new Type($type2);
        //     $test_type2->save();
        //
        //     //Act
        //     $result = Type::getAll();
        //
        //     //Assert
        //     $this->assertEquals([$test_type,$test_type2], $result);
        //
        // }


    }



?>
