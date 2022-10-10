<?php

namespace App\Repository;


use App\Entity\FormaPago;
use App\Mapper\FormaPagoMapper;

class FormaPagoRepository
{
    public FormaPagoMapper $formaPagoMapper;
    public function __construct(FormaPagoMapper $formaPagoMapper)
    {
        $this->formaPagoMapper = $formaPagoMapper;
    }

    public function save(FormaPago $formaPago):bool
    {
        return $this->formaPagoMapper->insert($formaPago);
    }

    public function update(FormaPago $formaPago,int $auxID)
    {
        return $this->formaPagoMapper->update($formaPago,$auxID);
    }
    
    public function delete(FormaPago $formaPago):bool
    {
        return $this->formaPagoMapper->delete($formaPago);
    }

    public function find(int $id): ?FormaPago
    {
        return $this->formaPagoMapper->find($id);
    }

    public function findAll(): array
    {
        return $this->formaPagoMapper->findAll();
    }
}
