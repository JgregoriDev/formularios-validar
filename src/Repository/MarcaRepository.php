<?php

namespace App\Repository;

use App\Mapper\MarcaMapper;
use App\Entity\Marca;

class MarcaRepository
{
    public MarcaMapper $marcaMapper;
    public function __construct(MarcaMapper $marcaMapper)
    {
        $this->marcaMapper = $marcaMapper;
    }

    public function save(Marca $marca): bool
    {
        return $this->marcaMapper->insert($marca);
    }

    public function update(Marca $marca,int $idAuxiliar)
    {
        return $this->marcaMapper->update($marca,$idAuxiliar);
    }

    public function delete(Marca $marca): bool
    {
        return $this->marcaMapper->delete($marca);
    }

    public function find(int $id): ?Marca
    {
        return $this->marcaMapper->find($id);
    }

    public function findAll(): array
    {
        return $this->marcaMapper->findAll();
    }
}
