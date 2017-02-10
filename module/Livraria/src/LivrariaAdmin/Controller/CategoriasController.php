<?php

namespace LivrariaAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CategoriasController extends AbstractActionController
{
	/**
	 * @var EntityManager
	 */ 
	protected $em;

    public function indexAction()
    {
        $list = $this->getEm()
        	->getRepository('Livraria\Entity\Categoria')
        	->findAll();
        
        return new ViewModel(['data' => $list]);
    }

    protected function getEm()
    {
    	if (null === $this->em) {
    		$this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    	}
    	return $this->em;
    }


}

