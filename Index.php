<?php

// Autoloading classes
spl_autoload_register(function ($class) {
    include 'Controller/' . $class . '.php';
});

// Routing
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$controller = new HomeController();

// Perform action
switch ($action) {
    case 'forums':
        $controller->forums();
        break;
    case 'forum_topic_1':
        $controller->forumTopic1();
        break;
    case 'forum_topic_2':
        $controller->forumTopic2();
        break;
    // Add more cases for additional forum topics as needed
    default:
        $controller->index();
        break;
}
