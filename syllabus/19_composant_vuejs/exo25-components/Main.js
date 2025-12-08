// Définir le composant Main

export default {
    name: 'MainComponent', // Nom du composant

    template : `   
          <main class="main">
            <h2>{{ title }}</h2>
            <h3>{{ contents.length }} articles</h3>
            <section v-for="content in contents" :key="content.id">
                <div
                  v-on:mouseover="HoveredId = content.id;"
                  v-on:mouseout="HoveredId = -1"
                  v-bind:class="HoveredId==content.id ? 'card_mouseover' : 'card_mouseout'"
                >
                    <h3>{{ content.title }}</h3>
                    <p>{{ content.body }}</p>
                    <p v-show="this.verbose_b" ><em>
                       {{ content.more }}   
                    </em></p>
                    <button v-on:click="display_metadata(content)" >
                        cliquez-moi
                    </button>
                </div>
            </section>
            <p>Nombre d'articles listés : {{ nombreArticles }}</p>
          </main>
    `,

    data() {
        return  {
            title      : "Bienvenue sur notre site !",
            contents   : [
                {
                    id      : 1001,
                    title   : "Article 1",
                    body    : "Un article de journal.",
                    more    : "bla bla blahhh",
                },
                {
                    id      : 1002,
                    title   : "Article 2",
                    body    : "Un autre exemple de contenu.",
                    more    : "bla bla blahhh",
                },
                {
                    id      : 1003,
                    title   : "Article 3",
                    body    : "Encore un autre exemple de contenu sans intérêt.",
                    more    : "bla bla blahhh",
                }
            ],
            HoveredId: -1, // id de l'élément où passe la souris
        }
    },

    props : {
        verbose_b   : {
            type        : Boolean,
            required    : false,
            default     : false,
        }
    },

    computed: {
        nombreArticles() {
            return this.contents.length;
        }
    },

    methods: {
        popup() {
            alert("You are not a clown !")
        },
        display_metadata(o) {
            const s= `
                Article : id = ${o.id}<br>
                Titre : ${o.title}
            `
            document.getElementById("metadata").innerHTML = s
        }
    },

}
