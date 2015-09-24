<?php
/**
 * Created by PhpStorm.
 * User: romapaliy
 * Date: 9/24/15
 * Time: 9:52 AM
 */

require_once('route.php');
require_once('config.php');

$route_config = array(
    'all' => 'list',
    'add' => 'add'
);

$route = new Router($route_config);
$route->run();
