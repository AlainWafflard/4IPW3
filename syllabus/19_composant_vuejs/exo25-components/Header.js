// Définir le composant Header

export default {

    name: 'HeaderComponent', // Nom du composant

    template : `   
          <header class="header">
            <h1 v-bind:class="theme">
                {{ title }}
            </h1>
            <h2 v-if="this.verbose_b">{{ title }}{{ title }}{{ title }}</h2>
            <h2 v-else>{{ title }}</h2>
            <nav>
              <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">À propos</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </nav>
          </header>
    `,

    props : {
        title       : {
            type        : String,
            required    : true ,
        },
        verbose_b   : {
            type        : Boolean,
            required    : false,
            default     : false,
        },
        theme       : {
            type        : String,
            required    : false,
            default     : 'light',
        },
    }

}
