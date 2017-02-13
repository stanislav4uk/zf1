<?php
namespace App\Resources;

/**
 * Class Container
 * @package App\Resources
 */
class Container extends \Zend_Application_Resource_ResourceAbstract
{
    /**
     * @var string
     */
    public $_explicitType = 'dp_container';

    /**
     * @var null|\Pimple\Container
     */
    protected $container;

    /**
     * Container constructor.
     * @param null $options
     * @param null $container
     */
    public function __construct($options = null, $container = null)
    {
        parent::__construct($options);

        $this->container = $container;
    }

    /**
     * Strategy pattern: initialize resource
     *
     * @return mixed
     */
    public function init()
    {
        $providers = require APPLICATION_PATH . '/configs/providers.php';

        foreach ($providers as $provider) {
            $this->container->register(new $provider);
        }

        return $this->container;
    }
}