// Définir le composant Footer

export default {
    name: 'Menu', // Nom du composant

    template : `   
        <nav>
          <ul>
            <li><a href="#" @click.prevent="$parent.showPage('home')">Accueil</a></li>  |
            <li><a href="#" @click.prevent="$parent.showPage('about')">À propos</a></li>
          </ul>
        </nav>
    `,
}
