<?php

class Animal
    {
        private $name;
        private $age;
        private $date_of_admittance;
        private $id_type;
        private $id;

        function __construct($name,$age,$date_of_admittance,$id_type,$id=null)
        {
            $this->name = $name;
            $this->age = $age;
            $this->date_of_admittance = $date_of_admittance;
            $this->id_type = $id_type;
            $this->id = $id;
        }
        function getName()
        {
            return $this->name;
        }
        function getAge()
        {
            return $this->age;
        }
        function getDateOfAdmittance()
        {
            return $this->date_of_admittance;
        }
        function getIdType()
        {
            return $this->id_type;
        }
        function getId()
        {
            return $this->id;
        }
        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO animals(name,age,date_of_admittance,id_type)VALUES('{$this->getName()}',{$this->getAge()},'{$this->getDateOfAdmittance()}',{$this->getIdType()})");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_animals = $GLOBALS['DB']->query("SELECT * FROM animals;");
            $animals = array();
            foreach ($returned_animals as $animal)
            {
                $new_animal = new Animal ($animal['name'],$animal['age'],$animal['date_of_admittance'],$animal['id_type'],$animal['id']);
                array_push($animals,$new_animal);
            }
            return $animals;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM animals;");
        }


}

?>
