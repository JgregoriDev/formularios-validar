<?php

namespace App;

use App\ConfigInterface;

class Config implements ConfigInterface
{
    private array $conf = [];

    public function __construct(string $configPath)
    {
        $dsn = file_get_contents($configPath);
        $this->conf = json_decode($dsn, true);
    }

    public function get(string $property) {
        return $this->conf[$property];
    }

    public function getDns(): string
    {
        return $this->get("dsn");
    }

    public function getRutaPoster(): string
    {
        return $this->get("rutaPosters");
    }

    public function getDataSourceName(): string
    {

        return $this->getDns();
    }
}