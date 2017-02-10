<?php

namespace LivrariaAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;

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

        $page = $this->params()->fromRoute('page');
            
        $paginator = new Paginator(new ArrayAdapter($list));
        $paginator->setCurrentPageNumber($page);
        $paginator->setDefaultItemCountPerPage(1);

        return new ViewModel(['data' => $paginator, 'page' => $page]);
    }

    protected function getEm()
    {
    	if (null === $this->em) {
    		$this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    	}
    	return $this->em;
    }


}

