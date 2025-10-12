// Définir le composant Footer

export default {
    name: 'FooterComponent', // Nom du composant

    template : `   
          <footer class="footer">
            <p>&copy; 2025 - Tous droits réservés</p>
            <div id="console"></div>
            <div>
                <label>couleur du texte</label>
                <select 
                  id="textcolor" 
                  @change="setTextColor($event)" >
                    <option value="black">noir</option>
                    <option value="blue">bleu</option>
                    <option value="green">vert</option>
                </select>
            </div>
          </footer>
    `,

    methods : {
        setTextColor(e) {
            // const select = document.getElementById("textcolor");
            // const newTextColor = select.value;
            const newTextColor = e.target.value
            console.log("Option choisie :", newTextColor);
            // Votre script ici
            document.body.style.color = newTextColor
        }
    }
}
