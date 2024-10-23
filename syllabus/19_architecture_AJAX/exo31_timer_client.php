<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exo31 : AJAX, timer & event</title>
	<style type="text/css">
		div.horloge
		{
			margin-top:1em;
		}
	
		div#quote label,
		div#quote span 
		{
			display: inline-block;
			width: 120px;
			vertical-align: top;
			text-align: right;
			background-color: whitesmoke;
		}
	</style>
	<script
	 src="https://code.jquery.com/jquery-3.4.1.js"   
	 integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
	 crossorigin="anonymous"></script>
	<script>
	
	function Horloge() 
	{
		var laDate = new Date();
		var hou = String(laDate.getHours()).padStart(2, "0");
		var min = String(laDate.getMinutes()).padStart(2, "0");
		var sec = String(laDate.getSeconds()).padStart(2, "0");
		var h = hou + ":" + min + ":" + sec ;
		return h;
	}
	
	function RefreshQuote()
	{
		// URL du serveur 
		var server_url = 'exo17-31_timer_server.php';

		$.post( server_url, function(quote_json) {
			console.log(quote_json);
			s = '<div class="horloge">' + Horloge() + '</div>' ;
			$.each( quote_json, function( i, quote ) {
				console.log(quote);
				s += "<label>" + quote.name + "</label>" 
				   + "<span>" + quote.value + " " + quote.curr + "</span><br />";
			});
			console.log(s);
			$("div#quote").append(s);
		}, "json" );
	}
	
	// au chargement de la page
	$( function() 
	{
		// Refreshing quote now 
		RefreshQuote();

		// Refreshing quote every 15 minutes
		// setInterval(RefreshQuote, 1000*60*15);
		setInterval(RefreshQuote, 1000*60*15);
	});

	</script>
</head>
<body>
	
	<h1>Exo17-31 : AJAX, timer & event</h1>
	<h2>Cours de la Bourse de New York</h2>
	<div id="quote"></div>

</body>
</html>