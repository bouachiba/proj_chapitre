<?php

$idProduit = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$login = $_SESSION['login'];

try {
//Récupération du client
    $idClient = getClientInfo($login);
    //Test de l'existence du produit dans le panier
    if (checkProduitPanier($idProduit)) {
        //Modification de la quantité sur un produit existant dans le panier
        ajoutQtPanier($idProduit, $idClient);
    } else {
        //Insertion du produit dans le panier
        ajoutPanier($idProduit, $idClient);
    }
    
    //Redirection vers la liste des produits
    header('location:/produit');
    
} catch (Exception $ex) {
    echo $ex->getMessage();
}
