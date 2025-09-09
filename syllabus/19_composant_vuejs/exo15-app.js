import { createApp } from 'vue';

import HeaderComponent from './exo15-components/Header.js'
import MainComponent from './exo15-components/Main.js'
import FooterComponent from './exo15-components/Footer.js'

// Créer l'application Vue et la "monter"
createApp({
    components: {
        'header-component': HeaderComponent,
        'main-component': MainComponent,
        'footer-component': FooterComponent
    }
}).mount('#app');

