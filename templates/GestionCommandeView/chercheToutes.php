<?php

echo "<p>Nombre de clients trouvés :".count($commandes)."</p>";

foreach ($commandes as $commande){
    echo $commande->getId()." ".$commande->getDateCde()." ".$commande->getNoFacture()." ".$commande->getIdClient()."<br>";
}
