<?php

$auth = $GLOBALS['auth'];
$auth->logOut();

header('Location: /');

?>