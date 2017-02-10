<?php

namespace Livraria\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    public function indexAction()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        
        $repository = $em->getRepository('Livraria\Entity\Categoria');

        $categorias = $repository->findAll();

        return new ViewModel(['categorias' => $categorias]);
    }


}

