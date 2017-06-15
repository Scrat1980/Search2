<?php
spl_autoload_register(function ($className){
    require_once ($className . '.php');
});

$page = (isset($_GET['page']))
    ? $_GET['page']
    : 'search';

$rout = [
    'search' => [
        'controller' => 'SiteController',
        'action' => 'search',
    ],
    'results' => [
        'controller' => 'SiteController',
        'action' => 'results',
    ],
    'ajax' => [
        'controller' => 'FindController',
        'action' => 'index',
    ],
    'details' => [
        'controller' => 'FindController',
        'action' => 'details'
    ]
];

foreach ($rout as $key => $components) {
    if($page == $key) {
        $controller = $components['controller'];
        $action = $components['action'];
        break;
    }
}

if(isset($controller)) {
    $c = new $controller();
    $c->{$action}();

}