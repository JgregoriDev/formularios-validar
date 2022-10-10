<?php

declare(strict_types=1);

namespace App\Repository;

use App\Mapper\ProveedorMapper;
use App\Entity\Proveedor;

class ProveedorRepository
{
    public ProveedorMapper $proveedorMapper;
    public function __construct(ProveedorMapper $proveedorMapper)
    {
        $this->proveedorMapper = $proveedorMapper;
    }

    public function save(Proveedor $proveedor)
    {
        $this->proveedorMapper->insert($proveedor);
    }

    public function update(Proveedor $proveedor, int $idAux)
    {
        $this->proveedorMapper->update($proveedor, $idAux);
    }

    public function delete(Proveedor $proveedor)
    {
        $this->proveedorMapper->delete($proveedor);
    }

    public function find(int $id): ?Proveedor
    {
        return $this->proveedorMapper->find($id);
    }

    public function findAll(): array
    {
        return $this->proveedorMapper->findAll();
    }
}
