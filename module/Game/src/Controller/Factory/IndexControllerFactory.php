<?php
namespace Game\Controller\Factory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Game\Controller\IndexController;
use Game\Model\GameTable;

class IndexControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) 
    {
        //return new IndexController($container->get(GameTable::class));
        $serviceManager = $container->get('ServiceManager');
           return new IndexController($serviceManager);
    }
}