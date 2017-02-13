<?php
namespace LivrariaAdmin\Controller;

class CategoriasController extends AbstractCrudController
{
	public function __construct()
    {
        $this->entity = 'Livraria\Entity\Categoria';
        $this->form = 'LivrariaAdmin\Form\Categoria';
        $this->service = 'Livraria\Service\Categoria';
        $this->controller = 'Categorias';
        $this->route = 'livraria-admin';
    }


}

