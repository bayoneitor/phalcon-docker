<?php

use Phalcon\Mvc\Router\Group;
use Phalcon\Mvc\Router;


$router = new Router(false);
$router->removeExtraSlashes(true);

$API = new Group(['controller' => 'API']);
$API->addGet('', ['action' => 'get']);

$CompanySecurity = new Group(['controller' => 'CompanySecurity']);
$CompanySecurity->addGet('', ['action' => 'get']);

$Company = new Group(['controller' => 'Company']);
$Company->addGet('', ['action' => 'get']);

$Security = new Group(['controller' => 'Security']);
$Security->addGet('', ['action' => 'get']);

$router->mount($API);
$router->mount($CompanySecurity);
$router->mount($Company);
$router->mount($Security);

return $router;
