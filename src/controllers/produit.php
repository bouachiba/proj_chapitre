<?php

//Récupération du numéro de pages
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT);
$recherche = filter_input(INPUT_GET, 'recherche', FILTER_SANITIZE_STRING);

if($page == null){
    $page = 1;
}
$catalogue = getCatalogue($page, $nbLivresParPage, $recherche);
$nbTotalLivres = getNbLivres($recherche);

//calcul du nombre de page
$nbPages = (int)$nbTotalLivres/$nbLivresParPage;
//Si la division entière possède un reste
//on ajoute 1 au nombre de page
if($nbTotalLivres% $nbLivresParPage > 0){
    $nbPages++;
}

$response = getResponse('view-produit', array(
    'catalogue' => $catalogue,
    'nbPages' => $nbPages,
    'nbTotal' => $nbTotalLivres,
    'pageActive' => $page,
    'recherche' => $recherche
        
));

echo $response;


