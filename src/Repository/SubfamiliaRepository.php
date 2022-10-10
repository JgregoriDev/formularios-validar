<?php

namespace App\Repository;


use App\Entity\Subfamilia;
use App\Mapper\FamiliaMapper;
use App\Mapper\SubfamiliaMapper;

class SubfamiliaRepository
{
    public SubfamiliaMapper $subfamiliaMapper;
    public function __construct(SubfamiliaMapper $subfamiliaMapper)
    {
        $this->subfamiliaMapper = $subfamiliaMapper;
    }

    public function save(Subfamilia $subfamilia)
    {
        return $this->subfamiliaMapper->insert($subfamilia);
    }

    public function update(Subfamilia $subfamilia,int $id1, int $id2)
    {
        return $this->subfamiliaMapper->update($subfamilia,$id1,$id2);
    }

    public function delete(Subfamilia $subfamilia)
    {
        return $this->subfamiliaMapper->delete($subfamilia);
    }

    public function find(int $id, int $id2): ?Subfamilia
    {
        return $this->subfamiliaMapper->find($id, $id2);
    }

    public function findAll(): array
    {
        return $this->subfamiliaMapper->findAll();
    }
}
