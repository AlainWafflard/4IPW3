import { createApp } from "vue";

// import App from "app.js";
import ArticleList from "./ArticleList.js";


createApp({

  name: "App",

  components: {
    ArticleList,
  },

  template : `
    <div id="app">
      <ArticleList />
    </div>
  `,

}).mount("#app");
