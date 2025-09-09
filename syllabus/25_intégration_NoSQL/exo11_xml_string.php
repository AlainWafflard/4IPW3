<PRE><?php
/*
 * Comment convertir un string XML en objet/array PHP 
 * fonction : SimpleXMLElement
 */

$string = <<< XML
<?xml version='1.0'?> 
<document> 
    <cmd>login</cmd> 
    <login>Richard</login> 
    <prop>
        <admin>0</admin>
        <restricted_user>1</restricted_user>
    </prop>
</document>
XML;
                                           
$document = simplexml_load_string($string);

var_dump($document); 
 
var_dump($document->login); 

var_dump( (string) $document->login ); 

var_dump($document->prop);

var_dump($document->prop->restricted_user);

?></PRE>