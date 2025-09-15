export default {

    name: "ArticleList",

    template : `
      <main class="article-list">

        <h1>{{ title }}</h1>
        <h3>{{ nombreArticles }} articles disponibles</h3>
    
        <section class="articles">
          <article
              v-for="article in articles"
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

        <div v-if="selectedArticle" class="article-detail">
          <h2>{{ selectedArticle.title }}</h2>
          <p>{{ selectedArticle.content }}</p>
          <button @click="hideArticle(selectedArticle)" class="close-btn">
            Fermer
          </button>
        </div>

      </main>
    `,

    data() {
        return {
            selectedArticle: null, // Stocke l'article sélectionné
            title: "Maquette Site de Presse / Listing",
            showMore: false,
            hoveredId: null,
            articles: [
                {
                    id: 1,
                    title: "L'essor des énergies renouvelables",
                    resume: "En 2025, les énergies renouvelables représentent 40% de la production mondiale d'électricité.",
                    content: "En 2025, les énergies renouvelables ont connu une croissance sans précédent, grâce aux avancées technologiques et aux politiques gouvernementales incitatives. Les panneaux solaires et les éoliennes sont désormais omniprésents, réduisant significativement les émissions de CO2..."
                },
                {
                    id: 2,
                    title: "Les bienfaits de la méditation",
                    resume: "Une étude récente montre que 10 minutes de méditation par jour améliorent la concentration.",
                    content: "Une étude menée par l'Université de Harvard a révélé que la méditation quotidienne, même pour une courte durée, a des effets significatifs sur la réduction du stress et l'amélioration des fonctions cognitives. Les participants ont montré une augmentation de 20% de leur capacité à se concentrer après seulement 4 semaines de pratique..."
                },
                {
                    id: 3,
                    title: "Voyage dans l'espace : une réalité pour les touristes",
                    resume: "Les voyages spatiaux deviennent accessibles au grand public grâce à des entreprises privées.",
                    content: "Avec l'émergence de sociétés comme SpaceX et Blue Origin, le tourisme spatial n'est plus un rêve lointain. Dès 2026, des vols suborbitaux seront proposés à des tarifs abordables, permettant à des centaines de personnes de vivre l'expérience de l'apesanteur et d'admirer la Terre depuis l'espace..."
                },
                {
                    id: 4,
                    title: "L'intelligence artificielle dans la santé",
                    resume: "L'IA révolutionne le diagnostic médical avec une précision inégalée.",
                    content: "Les algorithmes d'intelligence artificielle sont désormais capables de détecter des maladies comme le cancer à un stade précoce, avec une précision supérieure à celle des médecins. Des outils comme IBM Watson ou DeepMind de Google analysent des millions de données pour fournir des diagnostics en quelques secondes..."
                },
                {
                    id: 5,
                    title: "Les villes du futur",
                    resume: "Les smart cities intègrent la technologie pour améliorer la qualité de vie.",
                    content: "Les villes intelligentes utilisent des capteurs et des réseaux connectés pour optimiser la gestion des ressources, réduire la pollution et améliorer les services publics. Singapour et Copenhague sont souvent citées comme des modèles de villes durables et technologiquement avancées..."
                },
                {
                    id: 6,
                    title: "L'impact des réseaux sociaux sur la santé mentale",
                    resume: "Une étude révèle que les réseaux sociaux augmentent l'anxiété chez les jeunes.",
                    content: "Les plateformes comme Instagram et TikTok sont pointées du doigt pour leur rôle dans l'augmentation des troubles anxieux et dépressifs chez les adolescents. Les comparaisons sociales et la recherche de validation en ligne sont identifiées comme les principaux facteurs de risque..."
                },
                {
                    id: 7,
                    title: "La révolution des véhicules électriques",
                    resume: "Les voitures électriques dominent désormais le marché automobile.",
                    content: "Avec des modèles comme la Tesla Model 3 ou la Renault Zoé, les véhicules électriques représentent désormais plus de 30% des ventes de voitures neuves en Europe. Les gouvernements encouragent cette transition avec des subventions et des infrastructures de recharge de plus en plus développées..."
                },
                {
                    id: 8,
                    title: "Le télétravail : une nouvelle norme",
                    resume: "Le télétravail s'impose comme une pratique courante dans les entreprises.",
                    content: "Depuis la pandémie de 2020, le télétravail est devenu une norme pour de nombreuses entreprises. Des études montrent que cette pratique améliore la productivité et réduit le stress lié aux trajets, tout en posant de nouveaux défis en termes de gestion d'équipe et de cohésion sociale..."
                },
                {
                    id: 9,
                    title: "La blockchain au-delà des cryptomonnaies",
                    resume: "La technologie blockchain trouve des applications dans divers secteurs.",
                    content: "Initialement associée aux cryptomonnaies comme le Bitcoin, la blockchain est désormais utilisée pour sécuriser les transactions dans des domaines variés : traçabilité des produits alimentaires, gestion des droits d'auteur, ou encore vote électronique. Sa transparence et son immuabilité en font un outil précieux pour la confiance numérique..."
                },
                {
                    id: 10,
                    title: "L'éducation en ligne : une alternative viable",
                    resume: "Les plateformes d'apprentissage en ligne gagnent en popularité.",
                    content: "Des plateformes comme Coursera, Udemy ou Khan Academy démocratisent l'accès à l'éducation pour des millions de personnes dans le monde. Ces outils permettent d'apprendre à son rythme, avec des cours dispensés par des experts dans divers domaines, allant de la programmation à la philosophie..."
                }
            ],
        };
    },

    computed: {
        nombreArticles() {
            return this.articles.length;
        },
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

