<?php

function my_first_form()
{
    $html = <<< HTML
<form method="post" >
    <label>mon premier input</label>
    <input name="my_first_input" type="text">
</form>
HTML;

    return $html;
}


function my_second_form()
{
    $html = <<< HTML

<form method="post">

<div>
	Ville :
	<input type="text" name="city" value="Rome" />
</div>
<div>
	Ecrivez votre nom : 
	<input 	type="text" 
			name="mon_nom" 
			placeholder="j'inscris mon nom ici" />
</div>
<div>
	Entrez votre mot de passe :
	<input type="password" name="mon_mot_de_passe" />
</div>
<hr />

<div>
	Comment vous sentez-vous ?
	<input type="radio" name="how_do_you_feel" value="very_good">Bien Bien
	<input type="radio" name="how_do_you_feel" value="good">Bien	
	<input type="radio" name="how_do_you_feel" value="fair">Bof
</div>
<br/>

<div>
	<label for="male">Male</label>
	<input type="radio" name="sex" id="male" value="male">
	<br>

	<label for="female">Female</label>
	<input type="radio" name="sex" id="female" value="female">
	<br>
</div>
<hr />


<div>
	Votre style de musique ?
	<input type="checkbox" name="music[]" value="pop">Popular
	<input type="checkbox" name="music[]" value="rock">Rock 'n Roll
	<input type="checkbox" name="music[]" value="rb">Rythm &amp; Blues
</div>
<br/>

<div>
	Quels sont vos pr&eacute;f&eacute;rences en mati&egrave;re de sandwich ? <BR>
	<input type="checkbox" name="sandwich[]" value="poulet_curry">poulet curry<BR>
	<input type="checkbox" name="sandwich[]" value="poulet_salade">poulet salade<BR>
	<input type="checkbox" name="sandwich[]" value="thon_piquant">thon piquant<BR>
</div>
<hr />

<div>
	<label for="voiture">Choisissez la couleur de votre voiture. Une de ces trois-là, et rien d'autre. </label>
	<select name="voiture">
	  <option value=""></option>
	  <option value="choco">Chocolate</option>
	  <option value="straw">Strawberry</option>
	  <option value="vanilla">Vanilla</option>
	</select>
	<div>Notez l'option blanche en premier choix. Pourquoi ? </div>
</div>
<hr />

<datalist id="browsers">
  <option value="Internet Explorer"></option>
  <option value="Firefox 2021"></option>
  <option value="Firefox 2020"></option>
  <option value="Firefox 2019"></option>
  <option value="Firefox 2018"></option>
  <option value="Chrome"></option>
  <option value="Opera 2000"></option>
  <option value="Opera 2020"></option>
  <option value="Safari"></option>
</datalist>

<div>
	<label for="browser">Choose your browser, or type your own text:</label>
	<input list="browsers" name="browser" type="text">
	<div>La "datalist" est fournie séparément. Elle n'est qu'une suggestion de valeur, et non un choix imposé.</div>
</div>
<hr />

<div>
	Ma couleur favorite : 
	<input type="color" name="my_favorite_color" />
</div>
<hr />

<div>
	<label for="my_favorite_number">Mon nombre fétiche (de 0 à 1000) : </label><br/>
	0
	<input 	type="range" 
			name="my_favorite_number" 
			id="my_favorite_number"
			value="666"
			min="0" 
			max="1000" />
	1000
	<br/>
</div>
<hr />

<button type="submit" name="process_b" style="background-color:lightblue;color:white;">
	button type "submit"
</button>
<label>Pour soumettre le form</label>
<br/>
	
<button type="button" name="local_b">
	button type "button"
</button>
<label>Rien ne se passe. Il manque le code Javascript.</label>
<br/>

<button>
	button no option
</button>
<label>Forme minimaliste : Soumettre le form
<br/>

<input type="submit" value="input type submit">
<label>Obsolete</label>
<br/>

</form>



HTML;

    return $html;

}


function form_background($bg_color='#000000')
{
    $out = <<< HTML

<form method="post">
    <label>couleur du BG ? </label>
    <input type="color" name="my_favorite_color" value="$bg_color"/>   
    <button name="set_bgcolor" type="submit">change</button>
</form>
HTML;

    return $out;
}

function form_login()
{
    $out = <<< HTML

<form method="post">
    <label>votre nom ?  </label>
    <input type="text" name="my_login" />   
    <button name="set_login" type="submit">Log !</button>
</form>
HTML;

    return $out;
}

function style_sheet($bg_color)
{
    $out = <<< HTML
    <style>
        body
        {
            background-color: $bg_color;
        }
    </style>
HTML;
    return $out;
}

