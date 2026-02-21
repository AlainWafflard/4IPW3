export default {

    template : `
        Ceci est un compteur utilisant une requête FETCH
        dans le framework VUE.JS.<br>
        La valeur du compteur est stockée sur le serveur en variable SESSION.<br>
        <button
            type="button" 
            @click="() => fetchCounter('increment')">
                Comptons !
        </button>
        <span class="compteur">
            compteur : {{ compteur_vuejs }}
        </span>
    `,

    data() {
        return {
            compteur_vuejs : 0
        }
    },

    methods: {

        fetchCounter(action) {
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
                        vuejs       : true
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
                        vuejs       : true
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
                if ( ! response.ok)
                {
                    throw new Error(`Erreur HTTP : ${response.status}`);
                }

                const contentType = response.headers.get('content-type');
                if ( ! contentType || ! contentType.includes('application/json'))
                {
                    throw new Error("La réponse n'est pas au format JSON");
                }

                return response.json(); // Récupère la réponse
            })

            .then(json_data => {
               // on gère le retour : mise à jour du compteur
               this.compteur_vuejs = json_data.cpt_val;
            })

            .catch(erreur => {
                // Process error
                alert('Erreur : ' + erreur); // Affiche le message d'erreur
                console.error('Problème avec fetch: ' + error);
            })
        }
    },

    mounted() {
        // au chargement de la page, le compteur est initialisé suivant la var SESSION
        this.fetchCounter("get");
    },
}
