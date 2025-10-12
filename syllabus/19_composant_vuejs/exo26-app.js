import { createApp } from 'vue';

import HeaderComponent from './exo26-components/Header.js'
import MainComponent from './exo26-components/Main.js'
import FooterComponent from './exo26-components/Footer.js'

// Créer l'application Vue et la "monter"
createApp({

    components: {
        'header-component': HeaderComponent,
        'main-component': MainComponent,
        'footer-component': FooterComponent
    },

    data() {
        return {
            verbose       : true,
            header_theme  : "light" // alt. is "light" or "dark"
        }
    }

}).mount('#app');

