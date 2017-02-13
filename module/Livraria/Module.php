<?php
namespace Livraria;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ . 'Admin' => __DIR__ . '/src/' . __NAMESPACE__ . 'Admin',
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                'Livraria\Service\Categoria' => function($service){
                    return new \Livraria\Service\Categoria($service->get('Doctrine\ORM\EntityManager'));
                },
                 'Livraria\Service\Livro' => function($service){
                    return new \Livraria\Service\Livro($service->get('Doctrine\ORM\EntityManager'));
                },
            ],
        ];
    }
}
