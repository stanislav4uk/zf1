<?php
define("_CRONJOB_",true);
require(__DIR__ . '/../public/index.php');

// define application options and read params from CLI
$getopt = new Zend_Console_Getopt(array(
    'action|a=s' => 'action to perform in format of "module/controller/action/param1/param2/param3/.."',
    'env|e-s'    => 'defines application environment (defaults to "production")',
    'help|h'     => 'displays usage information',
));

try {
    $getopt->parse();
} catch (Zend_Console_Getopt_Exception $e) {
    // Bad options passed: report usage
    echo $e->getUsageMessage();
    return false;
}

// show help message in case it was requested or params were incorrect (module, controller and action)
if ($getopt->getOption('h') || !$getopt->getOption('a')) {
    echo $getopt->getUsageMessage();
    return true;
}

// initialize values based on presence or absence of CLI options
$env      = $getopt->getOption('e');
$front = $application->getBootstrap()
    ->bootstrap('frontController')
    ->getResource('frontController');

$params = array_reverse(explode('/', $getopt->getOption('a')));
$module = null;//array_pop($params);
$controller = array_pop($params);
$action = array_pop($params);
$request = new Zend_Controller_Request_Simple ($action, $controller, $module);

// set front controller options to make everything operational from CLI
$front->setRequest($request)
    ->setResponse(new Zend_Controller_Response_Cli())
    ->setRouter(new \App\Routers\CronRoutersCli())
    ->throwExceptions(true);

// lets bootstrap our application and enjoy!
$application->run();
