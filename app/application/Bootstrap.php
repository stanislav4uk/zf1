<?php

/**
 * Class Bootstrap
 */
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
    }

    /**
     * @throws Zend_Application_Bootstrap_Exception
     */
    protected function _initContainer()
    {
        $container = new \App\Resources\Container(null, new \Pimple\Container());
        $this->getApplication()->getBootstrap()->registerPluginResource($container);
    }

    /**
     * @throws Zend_Controller_Exception
     */
    public function _initRewrite()
    {
        $front = Zend_Controller_Front::getInstance();
        $router = new Zend_Controller_Router_Rewrite();
        $router->removeDefaultRoutes();

        $router->addRoute('index', new Zend_Controller_Router_Route('', array(
            'controller' => 'index',
            'action'     => 'index'
        )));
        $router->addRoute('currency_convert', new Zend_Controller_Router_Route('currency/convert', array(
            'controller' => 'index',
            'action'     => 'convert'
        )));
        $router->addRoute('cron_rates', new Zend_Controller_Router_Route('cron/rates', array(
            'controller' => 'cron',
            'action'     => 'rates'
        )));

        $front->setRouter($router);
    }
}
