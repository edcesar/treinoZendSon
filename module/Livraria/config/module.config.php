<?php
namespace Livraria;

return array(
    'controllers' => array(
        'invokables' => array(
            'Livraria\Controller\Index' => 'Livraria\Controller\IndexController',
            'categorias' => 'LivrariaAdmin\Controller\CategoriasController'
        ),
    ),

      'router' => array(
        'routes' => array(
            'livraria' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/livraria[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                    	'__NAMESPACE__' => 'Livraria\Controller',
                        'controller' => 'Index',
                        'action'     => 'index',
                    ),
                ),
            ),

            'livraria-admin' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/admin/[:controller][:action]',
                    'defaults' => array(
                        'action'     => 'index',
                    ),
                ),
            ),

        ),
    ),
      
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'livraria/index/index' => __DIR__ . '/../view/livraria/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            'livraria' => __DIR__ . '/../view',
        ),
    ),

   'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver' 
                ),
            ),
        ),
    ),  
);