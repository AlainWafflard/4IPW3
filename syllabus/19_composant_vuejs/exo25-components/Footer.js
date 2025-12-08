// Définir le composant Footer

export default {
    name: 'FooterComponent', // Nom du composant

    template : `   
          <footer class="footer">
            <p>
            <label>Couleur du texte : </label>
            <select 
              id="textcolor"
              v-on:change="changeTextColor($event)">
                <option value="green">Vert</option>
                <option value="red">Rouge</option>
                <option value="black">Noir</option>
            </select>
            </p> 
            <p>&copy; 2025 - Tous droits réservés</p>
            <div id="metadata"></div>
          </footer>
    `,

    methods : {
        changeTextColor(e) {
            // alert(e.target.value)
            document.body.style.color = e.target.value
        }
    }
}