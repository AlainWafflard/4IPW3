<?php

/**
 * affichage catalogue
 * @param $data_a : le catalogue sous forme array
 * @return string:  HTML code
 */
function html_catalogue_contents( $data_a )
{
    ob_start();
    // var_dump($data_a);
    foreach( $data_a as $line => $product )
    {
        if( $line == 0 ) continue; // skip la ligne avec les titres
        ?>
        <div class="produit">
            <div class="formule">
                <?=$product[0]?>
            </div>
            <ul>
                <?php
                $formule_title = array(
                    "",
                    "Appels",
                    "SMS",
                    "Internet",
                    "Volume",
                    "Vitesse",
                );
                for( $i=1 ; $i<=5 ; $i++ )
                {
                    if(empty($product[$i])) continue;
                    echo <<< FORMULE
				<li>{$formule_title[$i]} : {$product[$i]}</li>
FORMULE;
                }
                ?>
            </ul>
            <div><a target="_blank" href="<?=$product[6]?>">
                    Plus d'info
                </a></div>
            <div>
                Ajouter au panier : <br>
                <div class="prix">A la pièce : 12 €
                    <select name="basket[toudou][single]"><option></option>
                        <option value="1">1</option>
                        <option value="2">2</option></select>
                </div>
            </div>
            <div class="prix">Groupe de 6 : 60 €
                <select name="basket[toudou][pack]"><option></option>
                    <option value="1">1</option>
                    <option value="2">2</option></select>
            </div>
        </div>
        <?php
    }
    return ob_get_clean();

}

/**
 * affiche les boutons et forms en tête du catalogue
 * @return string HTML code
 */
function html_catalogue_header()
{
    ob_start();
    ?>
    <h2>VOO : Catalogue des produits</h2>

    <form method="POST">
        <div class="search_bar">
            <input type="text" name="search_string"><button name="button_search">
                Chercher dans le catalogue
            </button>
        </div>
        <div class="login">
            Votre prénom : <input type="text" name="login_firstname">
            Votre nom : <input type="text" name="login_name">
        </div>
        <div class="button_bar">
            <button name="button_basket_add">
                Enregistrer mon panier
            </button><button name="button_basket_see">
                Voir mon panier
            </button><button name="button_buy">
                Acheter
            </button>
        </div>
    <?php
    return ob_get_clean();
}

function html_catalogue_footer()
{
    return "</form>";
}

