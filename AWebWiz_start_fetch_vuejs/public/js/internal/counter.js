/**
 * mise à jour du compteur, grâce à une requête FETCH
 * incrémentation ou récupération valeur courante du compteur sur le serveur
 * @param action "get" (default) or "increment"
 */
function getset_counter(action)
{
    // set param
    let param;
    switch(action) {
        case "increment":
            // on crée le param pour la requête FETCH, mode "increment"
            // attributs "return" et "page" exigés par AWebWiz
            param = {
                return      : "application/json",
                page        : "counter_fetch",
                action      : "increment",
            };
            break;
        case "get":
        default:
            // on crée le param pour la requête FETCH, mode "get"
            // attributs "return" et "page" exigés par AWebWiz
            param = {
                return      : "application/json",
                page        : "counter_fetch",
                action      : "get",
            };
            break;
    }

    // Envoyer la requête avec Fetch
    fetch(window.location.pathname, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded', // Format attendu par PHP pour $_POST
        },
        body: new URLSearchParams(param).toString(), // Convertit l'objet en format "clé=valeur"
    })

    .then(response => {
        // get response and validate response format
        if (!response.ok)
        {
            throw new Error(`Erreur HTTP : ${response.status}`);
        }
        const contentType = response.headers.get('content-type');
        if (!contentType || !contentType.includes('application/json'))
        {
            throw new Error("La réponse n'est pas au format JSON");
        }
        return response.json(); // Récupère la réponse
    })

    .then(json_data => {
        // on gère le retour : mise à jour du compteur
        document.getElementById('compteur').textContent = json_data.cpt_val;
    })

    .catch(erreur => {
        // 5. Process error
        alert('Erreur : ' + erreur.message); // Affiche le message d'erreur
    });
}


// définition des évènements sur les boutons
document.addEventListener( 'DOMContentLoaded', (event) => {
    // associer les évènements aux boutons après le chargement de la page
    document.getElementById('b_compteur')
        .addEventListener('click', () => getset_counter("increment"));

    // mettre le compteur à jour
    getset_counter("get");
});

