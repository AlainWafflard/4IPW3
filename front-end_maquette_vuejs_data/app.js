import { createApp } from "vue";

import ArticleList from "./components/ArticleList.js";
import Menu from "./components/Menu.js";
import About from "./components/About.js";

createApp({

  name: "App",

  components: {
    ArticleList,
    About,
    'press-menu' : Menu,
  },

  data() {
    return {
      currentPage: 'home', // Page par défaut
    }
  },

  methods: {
    showPage(page) {
      this.currentPage = page;
      // Optionnel : Mettre à jour l'URL (sans rechargement)
      // window.history.pushState({}, '', `#${page}`);
    },
  },

}).mount("#app");


