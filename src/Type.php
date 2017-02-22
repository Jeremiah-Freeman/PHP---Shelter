<?php
    class Type
        {
            private $type;
            private $id;

            function __construct($type,$id=null)
            {
                $this->type = $type;
                $this->id = $id;
            }
            function getType()
            {
                return $this->type;
            }
            function getId()
            {
                return $this->id;
            }
            function save()
            {
                $GLOBALS['DB']->exec("INSERT INTO types(type)VALUES('{$this->getType()}')");
                $this->id = $GLOBALS['DB']->lastInsertId();
            }
            static function getAll()
            {
                $returned_types = $GLOBALS['DB']->query("SELECT * FROM types;");
                $types = array();
                foreach ($returned_types as $type)
                {
                    $new_type = new Type ($type['type'],$type['id']);
                    array_push($types,$new_type);
                }
                return $types;
            }
            static function deleteAll()
            {
                $GLOBALS['DB']->exec("DELETE FROM types;");
            }

            static function find($search_id)
            {
                $found_type = null;
                $types = Type::getAll();
                foreach ($types as $type)
                {
                    if ($search_id == $type->getId())
                    {
                        $found_type = $type;
                    }
                }
                return $found_type;
            }

            function getAnimals()
            {
                $returned_animals = $GLOBALS['DB']->query("SELECT * FROM animals WHERE id_type = {$this->getId()};");
                $animals = array();
                foreach ($returned_animals as $animal)
                {
                    $new_animal = new Animal ($animal['name'],$animal['age'],$animal['date_of_admittance'],$animal['id_type'],$animal['id']);
                    array_push($animals,$new_animal);
                }
                return $animals;
            }




        }




?>
