<?php

class GetStudent extends StudentsModel{
    
    public function showStudent($id){
        if(!$id){
            return false;
        }
        else{
            $result = $this->getStudent($id);
         return $result;
        }
    }
}

?>