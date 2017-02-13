<?php
namespace App\Routers;

/**
 * This is a dummy-router that shouldn't do anything on routing
 */
class CronRoutersCli extends \Zend_Controller_Router_Abstract implements \Zend_Controller_Router_Interface {

    public function assemble($userParams, $name = null, $reset = false, $encode = true) {}

    public function route(\Zend_Controller_Request_Abstract $dispatcher) {}
}
