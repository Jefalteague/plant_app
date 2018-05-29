<?php

/*BUILD THE APP PATH*/

#access the document root
$doc_root = $_SERVER['DOCUMENT_ROOT'];

#test it, remove for production
#echo $doc_root;

#access the uri
$uri = $_SERVER['REQUEST_URI'];

#test it, remove for production
#echo $uri;

/*(academic, but could Murach's code be replaced with pathinfo use?)
$path = $doc_root . $uri;
echo $path;
$path = pathinfo($path);
echo '==' . $path['dirname'];
echo '==' . $path['basename'];
echo '==' . $path['extension'];
echo '==' . $path['filename'];
*/

#split the uri
$dirs = explode('/', $uri);

#test it, remove for production
#echo $dirs[1] . '--';
#echo $dirs[2];

#combine dir[1] and dir[2], no index.php

$app_path = '/' . $dirs[1] . '/' . $dirs[2] . '/';

#test it, remove for production
#echo $app_path;

/*SET THE INCLUDE PATH*/

#combine doc_root and app_path

set_include_path($doc_root . $app_path);

#test it, remove for production
#echo get_include_path();

/*ACCESS TAGS PROCESSING FUNCTIONALITY not necessary unless pulling from database for home content*/

/*ACCESS DATABASE*/
require_once('model/db_connection.php');

#doc_dec is reusable code which precedes the header, solving an issue i can't remember
require_once('doc_dec.php');

/*PROVIDE FOR REDIRECTION FUNCTIONALITY*/

function redirect($url) {
    session_write_close();
    header("Location: " . $url);
    exit;
}

/*START SESSION*/

if (!isset($_SESSION)) {
	session_start();
	}

?>