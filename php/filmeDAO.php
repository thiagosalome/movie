<?php

class filmeDAO{
  
    public function getAll(){
        require "bootstrap.php";
        $filme = $entityManager->getRepository("Filme")->findAll();
        return $filme;
    }

    public function insert(filmeVo $filmeVo){
        require "bootstrap.php"; 
        $insert = new filme;

        $insert->setNome($filmeVo->getNome());
        $insert->setMedida($filmeVo->getMedida());
        $insert->setTipoproteina($filmeVo->getTipoproteina());
        $insert->setCaloria($filmeVo->getCaloria());
        $insert->setProteina($filmeVo->getProteina());
        $insert->setCarboidrato($filmeVo->getCarboidrato());
        $insert->setGordura($filmeVo->getGordura());

        $entityManager->persist($insert); 
        $entityManager->flush();
        
        return $insert;
    }       

    public function update(filmeVo $filmeVo){                
        require "bootstrap.php";
        $update = $entityManager->find('Filme', $filmeVo->getId());

        $update->setNome($filmeVo->getNome());
        $update->setMedida($filmeVo->getMedida());
        $update->setTipoproteina($filmeVo->getTipoproteina());
        $update->setCaloria($filmeVo->getCaloria());
        $update->setProteina($filmeVo->getProteina());
        $update->setCarboidrato($filmeVo->getCarboidrato());
        $update->setGordura($filmeVo->getGordura());

        $entityManager->persist($update); 
        $entityManager->flush();
        
        return $update;
    } 
    
    public function delete(filmeVo $filmeVo){
        require "bootstrap.php";
        
        $delete = $entityManager->find('Filme', $filmeVo->getId());
        $entityManager->remove($delete); 
        $entityManager->flush();
        return true;
    }  
}
?>