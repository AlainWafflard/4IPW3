
window.addEventListener("load", function() {
    const art_l = document.querySelectorAll("nav.articlesprincipaux div.articlesright")

    // for( const key in art_l )
    // {
    //     console.log( art_l[key].innerHTML )
    // }

    const new_art = document.createElement("div")
    new_art.setAttribute( "class", "article2")

    const h4 = document.createElement("h4")
    new_art.appendChild(h4)
    h4.innerHTML = "<span class=\"minititreright\">je suis un nouvel article</span>"

    const dom_el = document.querySelectorAll("nav.articlessecondaires div.row > div:nth-child(2)")[0]
    const existing_art = document.querySelectorAll("nav.articlessecondaires div.row > div:nth-child(2) > div.articles2")[1]
    dom_el.insertBefore(new_art, existing_art);

})