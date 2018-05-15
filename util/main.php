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

#split the uri
$dirs = explode('/', $uri);

#test it, remove for production
#print $dirs[1] . '--';
#print $dirs[2];

#combine dir[1] and dir[2], no index.php

$app_path = '/' . $dirs[1] . '/' . $dirs[2] . '/';

#test it, remove for production
#echo $app_path;

/*SET THE INCLUDE PATH*/

#combine doc_root and app_path

set_include_path($doc_root . $app_path);

#test it, remove for production
#echo get_include_path();

/*ACCESS TAGS PROCESSING FUNCTIONALITY*/

/*ACCESS DATABASE*/

require_once('model/db_connection.php');

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