<?php

namespace App\Repository;


use App\Entity\Familia;
use App\Mapper\FamiliaMapper;

class FamiliaRepository
{
    public FamiliaMapper $familiaMapper;
    public function __construct(FamiliaMapper $familiaMapper)
    {
        $this->familiaMapper = $familiaMapper;
    }

    public function save(Familia $familia)
    {
        return $this->familiaMapper->insert($familia);
    }

    public function update(Familia $familia,$id)
    {
        return $this->familiaMapper->update($familia,$id);
    }
    
    public function delete(Familia $familia)
    {
        return $this->familiaMapper->delete($familia);
    }

    public function find(int $id): ?Familia
    {
        return $this->familiaMapper->find($id);
    }

    public function findAll(): array
    {
        return $this->familiaMapper->findAll();
    }
}
