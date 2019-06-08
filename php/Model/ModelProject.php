<?php
class ModelProject{
    private $idProject;
    private $name;
    private $dep;

    public function setProjectFromDataBase($line){
        $this->setId($line["idProjeto"])
               ->setName($line["nome"])
               ->setDep($line["departamento"]);
    }

    public function setProjectFromPOST(){
        $this->setId(null)
               ->setName($_POST["nome"])
               ->setDep($_POST["dep"]);
    }
    
    public function setName($name){
        $this->name = $name;

        return $this;
    }

    public function setId($id){
        $this->idProject = $id;

        return $this;
    }

    public function setDep($dep){
        $this->dep = $dep;

        return $this;
    }

    public function getName(){
        return $this->name;
    }

    public function getId(){
        return $this->idProject;
    }

    public function getDep(){
        return $this->dep;
    }
}
 ?>