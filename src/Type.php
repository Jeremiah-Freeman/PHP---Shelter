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


        }




?>
