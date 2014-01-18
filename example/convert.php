<?php
/**
 * Convert an iOS Localizable.strings file to an Android XML file
 */
require __DIR__.'/../vendor/autoload.php';
use Loco\Api\ApiClient;

// create a dummy iOS strings file:
$strings = '
     " h e l l o - w o r l d "   =   " B o n j o u r   t o u t   l e   m o n d e " ; 
';


$client = ApiClient::factory();

// convert to Android-formatted XML
$result = $client->Convert( array(
    'src'    => $strings,
    'from'   => 'strings',
    'to'     => 'xml',
    'format' => 'android',
    'locale' => 'fr'
) );

// Get XML source from response object
echo (string) $result;