<?php

declare(strict_types=1);

class Entidad
{
    public function __construct(
        private int $numeroFacturas,
        private int $importeTotal,
        private string $fechaDesde,
        private string $fechaHasta
    ) {
    }

    public function getNumeroFacturas()
    {
        return $this->numeroFacturas;
    }

    public function setNumeroFacturas($numeroFacturas)
    {
        $this->numeroFacturas = $numeroFacturas;

        return $this;
    }

    public function getImporteTotal()
    {
        return $this->importeTotal;
    }

    public function setImporteTotal($importeTotal)
    {
        $this->importeTotal = $importeTotal;

        return $this;
    }

    public function getFechaDesde()
    {
        return $this->fechaDesde;
    }

    public function setFechaDesde($fechaDesde)
    {
        $this->fechaDesde = $fechaDesde;

        return $this;
    }

    public function getFechaHasta()
    {
        return $this->fechaHasta;
    }

    public function setFechaHasta($fechaHasta)
    {
        $this->fechaHasta = $fechaHasta;

        return $this;
    }
}
