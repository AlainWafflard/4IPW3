export default {

    name: "ArticleList",

    template : `
      <main class="article-list" v-show="this.page == 'home'">

        <h1>{{ title }}</h1>

        <h3 v-if="selectedArticle" >A la une</h3>

        <article v-if="selectedArticle" class="article-detail">
          <h2>{{ selectedArticle.title }}</h2>
          <p><em>{{ selectedArticle.author }}</em></p>
          <p><img alt="illustration" v-bind:src="media_path"</p>
          <p>{{ selectedArticle.body }}</p>
          <button @click="hideArticle(selectedArticle)" class="close-btn">
            Fermer
          </button>
        </article>

        <h3>{{ nombreArticles }} articles disponibles</h3>
    
        <section class="articles">
          <article
              v-for="article in articles.slice(0, 5)"
              :key="article.id"
              @mouseover="hoveredId = article.id"
              @mouseout="hoveredId = null"
              :class="{
                  'article-card': true,
                  'article-hover': hoveredId === article.id
                }"
          >
            <h2>{{ article.title }}</h2>
            <p class="article-resume">{{ article.resume }}</p>
            <p v-if="showMore" class="article-content">{{ article.content }}</p>
            <button @click="showArticle(article)" class="read-more-btn">
              Lire plus
            </button>
          </article>
        </section>

      </main>
    `,

    props : {
        page       : {
            type        : String,
            required    : true ,
        },
    },

    data() {
        return {
            "selectedArticle": null,
            "title": "Maquette Site de Presse / Listing",
            "showMore": false,
            "hoveredId": null,
            "articles": [
                {
                    "id": 1001,
                    "title": "Les bases de Vue.js 3 : un guide pour débutants",
                    "body": "Vue.js est un framework progressif pour construire des interfaces utilisateur. Découvrez ses concepts de base...",
                    "author": "Marie Dupont",
                    "readingTime": 8,
                    "category": "Développement Web",
                    "more": "Ce guide couvre les directives, les composants et la réactivité.",
                    "image": "0ab4193e0172a40f1fc2cc2c951024a2-1701435404.jpg"
                },
                {
                    "id": 1002,
                    "title": "CSS moderne : Flexbox et Grid en pratique",
                    "body": "Flexbox et CSS Grid sont des outils puissants pour créer des mises en page responsives. Apprenez à les combiner...",
                    "author": "Jean Martin",
                    "readingTime": 12,
                    "category": "Design",
                    "more": "Exemples concrets et cas d'usage pour chaque technique.",
                    "image": "0abdf235e7f0a9abd7cbbb3becc0dac6.jpg"
                },
                {
                    "id": 1003,
                    "title": "JavaScript ES6 : les fonctionnalités incontournables",
                    "body": "ES6 a introduit des fonctionnalités majeures comme les classes, les promesses et les template literals...",
                    "author": "Sophie Leroy",
                    "readingTime": 10,
                    "category": "JavaScript",
                    "more": "Un tour d'horizon des fonctionnalités les plus utiles.",
                    "image": "0ac33370fb3d811bc5c3c1e94a106475.jpg"
                },
                {
                    "id": 1004,
                    "title": "Comment optimiser les performances d'une application Vue.js",
                    "body": "Les applications Vue.js peuvent ralentir si elles ne sont pas optimisées. Voici des astuces pour les accélérer...",
                    "author": "Pierre Moreau",
                    "readingTime": 15,
                    "category": "Développement Web",
                    "more": "Lazy loading, memoization et bonnes pratiques.",
                    "image": "0b0b0994d12ad343511adfbfc364256e-1665048526.jpg"
                },
                {
                    "id": 1005,
                    "title": "Les bonnes pratiques en UX Design pour 2025",
                    "body": "L'expérience utilisateur évolue rapidement. Découvrez les tendances et bonnes pratiques pour cette année...",
                    "author": "Élodie Lambert",
                    "readingTime": 9,
                    "category": "Design",
                    "more": "Accessibilité, micro-interactions et design inclusif.",
                    "image": "0b24d8469d6c1277a4acb549d97b8a25-1702107985.jpg"
                },
                {
                    "id": 1006,
                    "title": "Introduction à Node.js et ses modules",
                    "body": "Node.js permet d'exécuter du JavaScript côté serveur. Découvrez ses modules essentiels comme fs et http...",
                    "author": "Thomas Bernard",
                    "readingTime": 14,
                    "category": "Backend",
                    "more": "Création d'un serveur simple et gestion des dépendances.",
                    "image": "0b34e6282e346fd3332495fd22046e15.jpg"
                },
                {
                    "id": 1007,
                    "title": "Les erreurs courantes en JavaScript et comment les éviter",
                    "body": "Même les développeurs expérimentés commettent des erreurs. Voici les pièges à éviter en JavaScript...",
                    "author": "Camille Petit",
                    "readingTime": 7,
                    "category": "JavaScript",
                    "more": "Hoisting, scope, et gestion des erreurs asynchrones.",
                    "image": "0b7d63b41f21a38d8a26b557ec6b6433.jpg"
                },
                {
                    "id": 1008,
                    "title": "Vue Router : naviguer entre les pages d'une application",
                    "body": "Vue Router est la bibliothèque officielle pour gérer la navigation dans une application Vue.js...",
                    "author": "Lucie Dubois",
                    "readingTime": 11,
                    "category": "Développement Web",
                    "more": "Configuration des routes, navigation dynamique et garde de navigation.",
                    "image": "0b84981a2211e54d998260151966555dfea3f1de.jpg"
                },
                {
                    "id": 1009,
                    "title": "Les outils indispensables pour un développeur front-end en 2025",
                    "body": "De VS Code à Figma, en passant par Git, voici les outils qui feront de vous un développeur plus productif...",
                    "author": "Antoine Girard",
                    "readingTime": 6,
                    "category": "Outils",
                    "more": "Extensions, plugins et workflows optimisés.",
                    "image": "0b9b6d6d154e98ce34b3f2e4ef76eae9-1702673875.jpg"
                },
                {
                    "id": 1010,
                    "title": "Comprendre le fonctionnement des Web Components",
                    "body": "Les Web Components permettent de créer des éléments personnalisés réutilisables dans le navigateur...",
                    "author": "Claire Fontaine",
                    "readingTime": 13,
                    "category": "Développement Web",
                    "more": "Custom Elements, Shadow DOM et templates HTML.",
                    "image": "0bb8852adca0be88f875bee9af0f6b3e-1703164664.jpg"
                },
                {
                    "id": 1011,
                    "title": "Les tendances du design graphique en 2025",
                    "body": "Le design graphique évolue avec de nouvelles tendances chaque année. Voici ce qui marque 2025...",
                    "author": "Jean Martin",
                    "readingTime": 8,
                    "category": "Design",
                    "more": "Couleurs, typographies et animations en vogue.",
                    "image": "0bdc2ef11a7dbca6095292802fec7f99.jpg"
                },
                {
                    "id": 1012,
                    "title": "Gérer l'état global avec Pinia dans Vue.js",
                    "body": "Pinia est la bibliothèque recommandée pour gérer l'état global dans les applications Vue.js...",
                    "author": "Marie Dupont",
                    "readingTime": 10,
                    "category": "Développement Web",
                    "more": "Stores, actions et état réactif.",
                    "image": "0c1fc483b67aa46db3965a230636a4fc-1703511818.jpg"
                },
                {
                    "id": 1013,
                    "title": "Les bases de TypeScript pour les développeurs JavaScript",
                    "body": "TypeScript ajoute des types statiques à JavaScript, ce qui améliore la robustesse du code...",
                    "author": "Nicolas Lefèvre",
                    "readingTime": 12,
                    "category": "JavaScript",
                    "more": "Interfaces, types génériques et configuration.",
                    "image": "0c2f66f43752d47fb49abeea0badf47a-1702908529.jpg"
                },
                {
                    "id": 1014,
                    "title": "Créer des animations fluides avec CSS et JavaScript",
                    "body": "Les animations améliorent l'expérience utilisateur. Découvrez comment les créer avec CSS et JavaScript...",
                    "author": "Élodie Lambert",
                    "readingTime": 9,
                    "category": "Design",
                    "more": "Transitions, keyframes et bibliothèques d'animation.",
                    "image": "0c3763f5e236769db9b3892c64cefa79-1701857877.jpg"
                },
                {
                    "id": 1015,
                    "title": "Sécurité des applications web : les bonnes pratiques",
                    "body": "La sécurité est cruciale pour toute application web. Voici comment protéger vos utilisateurs...",
                    "author": "Marc Renard",
                    "readingTime": 16,
                    "category": "Backend",
                    "more": "OWASP, injections SQL et protection des données.",
                    "image": "0c4b1eeb45c90b52bfb9d07943d855ab-1701697379.jpg"
                },
                {
                    "id": 1016,
                    "title": "Les nouveautés de Vue.js 4 : ce qui change",
                    "body": "Vue.js 4 apporte son lot de nouveautés. Découvrez les améliorations et les nouvelles fonctionnalités...",
                    "author": "Sophie Leroy",
                    "readingTime": 11,
                    "category": "Développement Web",
                    "more": "Performances, nouvelle API et outils de développement.",
                    "image": "0cba5a1b898a777cf6e982fee7550279.jpg"
                },
                {
                    "id": 1017,
                    "title": "Comment contribuer à un projet open source",
                    "body": "Contribuer à un projet open source est une excellente façon d'apprendre et de partager ses compétences...",
                    "author": "Thomas Bernard",
                    "readingTime": 7,
                    "category": "Outils",
                    "more": "Fork, pull requests et bonnes pratiques de contribution.",
                    "image": "0cbed40c0d920b94126eaf5e707be1f5-1702997257.jpg"
                },
                {
                    "id": 1018,
                    "title": "Les frameworks CSS les plus populaires en 2025",
                    "body": "Les frameworks CSS comme Tailwind, Bootstrap et Bulma dominent le paysage du développement front-end...",
                    "author": "Camille Petit",
                    "readingTime": 8,
                    "category": "Design",
                    "more": "Comparaison des fonctionnalités et cas d'usage.",
                    "image": "0cc918dec28dbd91f6006a2ce8101e2e-1701779555.jpg"
                },
                {
                    "id": 1019,
                    "title": "Déployer une application Vue.js avec Vercel ou Netlify",
                    "body": "Déployer une application Vue.js n'a jamais été aussi simple grâce à Vercel et Netlify...",
                    "author": "Antoine Girard",
                    "readingTime": 5,
                    "category": "Outils",
                    "more": "Configuration, CI/CD et bonnes pratiques de déploiement.",
                    "image": "0cc918dec28dbd91f6006a2ce8101e2e-1703676430.jpg"
                },
                {
                    "id": 1020,
                    "title": "Les principes SOLID appliqués à JavaScript",
                    "body": "Les principes SOLID sont des bonnes pratiques pour écrire du code maintenable et évolutif...",
                    "author": "Claire Fontaine",
                    "readingTime": 14,
                    "category": "JavaScript",
                    "more": "Exemples concrets pour chaque principe.",
                    "image": "0cd186290430da6e2432a89259c89401-1703075896.jpg"
                },
                {
                    "id": 1021,
                    "title": "Créer un thème sombre pour votre site web",
                    "body": "Les thèmes sombres sont populaires pour leur confort visuel. Voici comment en créer un pour votre site...",
                    "author": "Pierre Moreau",
                    "readingTime": 6,
                    "category": "Design",
                    "more": "CSS variables, préférences utilisateur et accessibilité.",
                    "image": "0cda32a621f6e95063eb94636596df08-1703512205.jpg"
                },
                {
                    "id": 1022,
                    "title": "Les tests unitaires avec Jest et Vue Test Utils",
                    "body": "Les tests unitaires sont essentiels pour garantir la qualité de votre code. Découvrez Jest et Vue Test Utils...",
                    "author": "Lucie Dubois",
                    "readingTime": 13,
                    "category": "Outils",
                    "more": "Configuration, écriture de tests et mocking.",
                    "image": "0cddb7c06f1cd518e1efdc0e20b70c31-1703019768.jpg"
                },
                {
                    "id": 1023,
                    "title": "Les API REST : bonnes pratiques et exemples",
                    "body": "Les API REST sont au cœur des applications modernes. Voici comment les concevoir et les utiliser...",
                    "author": "Nicolas Lefèvre",
                    "readingTime": 10,
                    "category": "Backend",
                    "more": "Endpoints, méthodes HTTP et gestion des erreurs.",
                    "image": "0cf2032b51f4501455502f80d1d6ef97.jpg"
                },
                {
                    "id": 1024,
                    "title": "Les hooks React pour les développeurs Vue.js",
                    "body": "Si vous connaissez Vue.js, voici comment comprendre et utiliser les hooks React...",
                    "author": "Marie Dupont",
                    "readingTime": 9,
                    "category": "Développement Web",
                    "more": "Comparaison des concepts et exemples pratiques.",
                    "image": "0d0c88ca7405e9fb2196f098df608b6f.jpg"
                },
                {
                    "id": 1025,
                    "title": "Les outils de monitoring pour les applications web",
                    "body": "Surveiller les performances et les erreurs de votre application est crucial. Découvrez les outils disponibles...",
                    "author": "Jean Martin",
                    "readingTime": 8,
                    "category": "Outils",
                    "more": "Google Analytics, Sentry et Lighthouse.",
                    "image": "0d47b16a209037cfbeddcf71476cd491.jpg"
                }
            ]
        };
    },

    computed: {
        nombreArticles() {
            return this.articles.length;
        },
        media_path() {
            return `./media/${this.selectedArticle.image}`
        }
    },

    methods: {
        showArticle(art_o) {
            console.log("lire article " + art_o.id)
            // alert(`Affichage de l'article ${id} (simulation)`);
            // Ici, on redirige vers une page dédiée ou on affiche le contenu complet.
            this.selectedArticle = art_o // Met à jour l'article sélectionné
        },

        hideArticle(art_o) {
            console.log("cacher article " + art_o.id)
            this.selectedArticle = null
        },
    },

};

