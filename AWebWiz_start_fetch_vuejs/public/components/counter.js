export default {

    template : `<div>
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
        <!-- Affichage conditionnel de l'erreur -->
        <div v-if="erreur_message" class="erreur">
            ⚠️ {{ erreur_message }}
        </div>    
    </div>`,

    data() {
        return {
            compteur_vuejs : 0,
            erreur_message  : null     // null = pas d'erreur
        }
    },

    methods: {

        fetchCounter(action) {
            // reinit
            this.erreur_message = null; // reset error au début de chaque appel

            // set param
            // on crée le param pour la requête FETCH, mode "increment" ou "get"
            // attributs "returnType" et "page" exigés par AWebWiz
            const param = {
                returnType  : "application/json",
                page        : "counter_fetch",
                action      : action,   // "increment" or "get"
                vuejs       : true
            };

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
                    console.log('Problème avec fetch, contentType = ' + contentType);
                    throw new Error("La réponse n'est pas au format JSON" + contentType);
                }

                return response.json(); // Récupère la réponse
            })

            .then(json_data => {
               // on gère le retour : mise à jour du compteur
               this.compteur_vuejs = json_data.cpt_val;
            })

            .catch(error => {
                // Process error
                // alert('Erreur : ' + error);
                this.erreur_message = error.message;
                console.error('Problème avec fetch: ' + error);
            })
        }
    },

    mounted() {
        // au chargement de la page, le compteur est initialisé suivant la var SESSION
        this.fetchCounter("get");
    },
}
