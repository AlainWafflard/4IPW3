// Définir le composant Main

export default {
    name: 'MainComponent', // Nom du composant

    template : `   
          <main class="main">
            <h2>{{ title }}</h2>
            <h3>{{ contents.length }} articles</h3>
            <section v-for="content in contents" :key="content.id">
                <div
                  @mouseover="HoveredId = content.id;"
                  @mouseout="HoveredId = -1"
                  :class="HoveredId==content.id ? 'card_mouseover' : 'card_mouseout'"
                >
                    <h3>{{ content.title }}</h3>
                    <p>{{ content.body }}</p>
                    <p v-show="this.verbose_b" ><em>
                       {{ content.more }}   
                    </em></p>
                    <button @click="show_metadata(content.id)" >
                        meta-data
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
        // show metadata of contents id given in the footer
        show_metadata(id) {
            // alert("You are not a clown !" +  id )
            const art = this.contents.find( article => article.id === id )
            document.getElementById("console").innerHTML = `
                article id : ${art.id}<br>
                title : ${art.title}<br>
            `
        }
    },

}
