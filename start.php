<?php
spl_autoload_register(function($class) {
include str_replace('\\', '/', $class) . '.php';
});

session_start();

define('CHAT_SERVER_URL', 'https://online-lectures-cs.thi.de/chat/');
define('CHAT_SERVER_ID', '1960b373-3673-45f0-8509-c3d7d901a332'); #

$service = new Utils\BackendService(CHAT_SERVER_URL, CHAT_SERVER_ID);
?>