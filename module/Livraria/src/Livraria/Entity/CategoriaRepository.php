<?php
namespace Livraria\Entity;

use Doctrine\ORM\EntityRepository;

class CategoriaRepository extends EntityRepository {

   public function fetchPairs()
   {
   	 $enties = $this->findAll();

   	 $array = [];

   	 foreach ($enties as $entity) {
   	 	$array[$entity->getId()] = $entity->getNome();
   	 }

   	 return $array;
   }
    
}
