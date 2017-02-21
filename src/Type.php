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
        }




?>
