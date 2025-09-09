<html>
<head>
	<title>Displaying a php array in a html table ...</title>
	<style>
	div.catalogue table
	{
		border-collapse:collapse;
	}
	div.catalogue table td
	{
		border:1px solid black;
	}
	</style>
</head>
<body>
<?php
$ar = array( 'hello', 'world', '!', 'how', 'are', 'you', '?' );
?>
<div class="catalogue"><table><tr>
<?php
foreach( $ar as $element )
{
	echo "<td>$element</td>";
}
?>
</tr></table></div>
<br>
<div class="catalogue"><table>
<?php
foreach( $ar as $element )
{
	echo "<tr><td>$element</td></tr>";
}
?>
</table></div>
</body>
</html>