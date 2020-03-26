<?php

include_once PATH_VIEW."header.html";
echo "<p>Nombre de clients trouvés :".count($clients)."</p>";

foreach ($clents as $client){
    echo $client->getId()." ".$clients->getTitreCli()." ".$client->getPrenomCli()." ".$client->getNomCli()."<br>";
}
include_once PATH_VIEW."footer.html";