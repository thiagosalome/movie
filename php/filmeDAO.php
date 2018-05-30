<?php

class filmeDAO{
  
    public function getAll(){
        require "bootstrap.php";
        $filme = $entityManager->getRepository("Filme")->findAll();
        return $filme;
    }

    public function insert($post){
        require "bootstrap.php"; 
        $insert = new Filme;

        $insert->setTitulo($post["titulo"]);
        $insert->setVerba($post["verba"]);
        $insert->setDtGravacaoInicio($post["gravacaoInicial"]);
        $insert->setDtGravacaoFim($post["gravacaoFinal"]);

        $entityManager->persist($insert); 
        $entityManager->flush();
        
        return $insert;
    }       

    public function update($update){                
        require "bootstrap.php";
        $update = $entityManager->find('Filme', $update["id"]);

        $update->setTitulo($post["titulo"]);
        $update->setVerba($post["verba"]);
        $update->setDtGravacaoInicio($post["gravacaoInicial"]);
        $update->setDtGravacaoFim($post["gravacaoFinal"]);

        $entityManager->persist($update); 
        $entityManager->flush();
        
        return $update;
    } 
    
    public function delete($delete){
        require "bootstrap.php";
        
        $delete = $entityManager->find('Filme', $delete["id"]);
        $entityManager->remove($delete); 
        $entityManager->flush();
        return true;
    }  
}
?>