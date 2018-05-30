<?php

require "filmeDAO.php";
$method = $_SERVER['REQUEST_METHOD'];
$filme = new filmeDAO();

switch($method){

    case "POST":
        $filme->insert($_POST);

    case "PUT":
        parse_str(file_get_contents('php://input'), $_PUT);
        $filme->update($_PUT);
    break;

    case "DELETE":
        parse_str(file_get_contents('php://input'), $_DELETE);
        $filme->delete($_DELETE);
    break;
}

?>