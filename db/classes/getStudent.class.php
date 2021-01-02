<?php

class GetStudent extends StudentsModel{
    
    public function showStudent($id){
         $result = $this->getStudent($id);

         return $result;
    }
}

?>