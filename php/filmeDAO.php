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
        $insert->setDtGravacaoInicio(new \DateTime($post["gravacaoInicial"] ." 00:00:00"));
        $insert->setDtGravacaoFim(new \DateTime($post["gravacaoFinal"] ." 00:00:00"));

        $entityManager->persist($insert); 
        $entityManager->flush();
        
        echo "<script>
                alert('Filme cadastrado com sucesso!');
                location = '../index.php';
            </script>";
    }       

    public function update($post){                
        require "bootstrap.php";
        $update = $entityManager->find('Filme', $post["id"]);

        $update->setTitulo($post["titulo"]);
        $update->setVerba($post["verba"]);
        $update->setDtGravacaoInicio(new \DateTime($post["gravacaoInicial"] ." 00:00:00"));
        $update->setDtGravacaoFim(new \DateTime($post["gravacaoFinal"] ." 00:00:00"));

        $entityManager->persist($update); 
        $entityManager->flush();
        
        echo "<script>
                alert('Filme alterado com sucesso!');
                location = '../index.php';
            </script>";
    } 
    
    public function delete($post){
        require "bootstrap.php";
        
        $delete = $entityManager->find('Filme', $post["id"]);
        $entityManager->remove($delete); 
        $entityManager->flush();
        
        echo "<script>
                alert('Filme deletado com sucesso!');
                location = '../index.php';
            </script>";
    }  
}
?>