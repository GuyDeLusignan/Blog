<?php 

//Define back paths
define('CONTROLLER_BACK', $_SERVER['DOCUMENT_ROOT'] . '/blog/back/controller');
define('MODEL_BACK', $_SERVER['DOCUMENT_ROOT'] . '/blog/back/model');
define('BACK', $_SERVER['DOCUMENT_ROOT'] . '/blog/back');
define('BACK_URL', $_SERVER['HTTP_HOST'] . '/blog/back'); //Link

//Define front paths
define('CONTROLLER_FRONT', $_SERVER['DOCUMENT_ROOT'] . '/blog/front/controller');
define('MODEL_FRONT', $_SERVER['DOCUMENT_ROOT'] . '/blog/front/model');
define('FRONT', $_SERVER['DOCUMENT_ROOT'] . '/blog/front');
define('FRONT_URL', $_SERVER['HTTP_HOST'] . '/blog/front'); //Link

//Define core paths
define('CONTROLLER_CORE', $_SERVER['DOCUMENT_ROOT'] . '/blog/core/controller');
define('MODEL_CORE', $_SERVER['DOCUMENT_ROOT'] . '/blog/core/model');
define('CORE', $_SERVER['DOCUMENT_ROOT'] . '/blog/core');
define('CORE_URL', $_SERVER['HTTP_HOST'] . '/blog/core'); //Link

//CSS
define('CSS', '/blog/core/css');
define('JS_CORE', '/blog/core/js');
define('JS_FRONT', '/blog/front/js');
define('JS_BACK', '/blog/back/js');