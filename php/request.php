<?php

require "filmeDAO.php";
$filme = new filmeDAO();

if(isset($_POST["create"])){
    try{
        $filme->insert($_POST);
    }
    catch(Exception $e){
        echo "<script>
                alert('Ocorreu uma exceção! Tente Novamente!');
                history.back();
            </script>";
    };
}
else if(isset($_POST["update"])){
    try{
        $filme->update($_POST);
    }
    catch(Exception $e){
        echo "<script>
                alert('Ocorreu uma exceção! Tente Novamente!');
                history.back();
            </script>";
    };
}
else if(isset($_POST["delete"])){
    try{
        $filme->delete($_POST);
    }
    catch(Exception $e){
        echo "<script>
                alert('Ocorreu uma exceção! Tente Novamente!');
                history.back();
            </script>";
    };
}
?>