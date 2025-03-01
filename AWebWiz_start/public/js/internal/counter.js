/**
 * Page load
 */
$( function() {

    // URL du serveur
    const server_url = '/public/index.php';

    $('button#b_compteur').on({
        'click': function () {
            // on récupère la valeur du compteur
            const cur_cpt_val = $('span#compteur').text();
            // on crée le param pour la requête AJAX
            const param = {
                page: "counter_ajax",
                action  : "increment",
                cur_cpt_val: cur_cpt_val
            };
            // on envoie la requête AJAX et on gère le retour : mise à jour du compteur
            $.post(
                server_url,
                param,
                function (json_data) {
                    const new_cpt_val = json_data.cpt_val;
                    $('span#compteur').text(new_cpt_val);
                },
                "json"
            );
        }
    })

    // au chargement, récupérer la valeur du compteur stockée sur le serveur
    $.post(
        server_url,
        {
            page    : "counter_ajax",
            action  : "get",
        },
        function (json_data) {
            const new_cpt_val = json_data.cpt_val;
            $('span#compteur').text(new_cpt_val);
        },
        "json"
    );

});

