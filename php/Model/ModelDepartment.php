<?php
class ModelDepartment{
    private $idDepartment;
    private $name;

    public function setDepartmentFromDataBase($line){
        $this->setId($line["idDepartamento"])
               ->setName($line["nome"]);
    }

    public function setDepartmentFromPOST(){
        $this->setId(null)
               ->setName($_POST["nome"]);
    }
    
    public function setName($name){
        $this->name = $name;
        return $this;
    }

    public function setId($id){
        $this->idDepartment = $id;
        return $this;
    }

    public function getName(){
        return $this->name;
    }

    public function getId(){
        return $this->idDepartment;
    }
}
 ?>