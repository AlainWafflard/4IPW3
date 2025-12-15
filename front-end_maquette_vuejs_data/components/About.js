// Définir le composant Footer

export default {
    name: 'About', // Nom du composant

    template : `   
          <main v-show="this.page == 'about'">
            <h1>Livrable "front-end"</h1>
            <p>J'ai bien mangé, j'ai bien bu, j'ai la peau du ventre bien tendue, merci petit ...</p>
          </main>
    `,

    props : {
        page       : {
            type        : String,
            required    : true ,
        },
    }
}

