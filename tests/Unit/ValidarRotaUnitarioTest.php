<?php

namespace Tests\Unit;

use App\Services\ValidarRotaService;
use Tests\TestCase;

class ValidarRotaUnitarioTest extends TestCase
{
    /**
     * Testa as rotas que serão validadas.
     */
    public function testValidarRotaValidas(): void
    {
        $service = new ValidarRotaService();
        $this->assertTrue($service->isValida(['RS', 'RS']));
        $this->assertTrue($service->isValida(['RS', 'SC']));
        $this->assertTrue($service->isValida(['RS', 'SC', 'PR', 'SP']));
        $this->assertTrue($service->isValida(['RS', 'SC', 'RS']));
        $this->assertTrue($service->isValida(['AM', 'MT', 'GO']));
        $this->assertTrue($service->isValida(['PR', 'SC', 'RS']));
        $this->assertTrue($service->isValida(['RR', 'RR']));
        $this->assertTrue($service->isValida(['RJ', 'SP']));
    }

    /**
    * Testa as rotas que serão invalidadas.
    */
    public function testValidarRotaInvalidas(): void
    {
        $service = new ValidarRotaService();
        $this->assertFalse($service->isValida([]));
        $this->assertFalse($service->isValida(['RS']));
        $this->assertFalse($service->isValida(['RS', 'PR', 'SP', 'MG']));
        $this->assertFalse($service->isValida(['RS', 'SC', 'PR', 'SP', 'MS', 'MT', 'RO', 'AM', 'RR', 'TO']));
        $this->assertFalse($service->isValida(['RS', 'SC', 'PR', 'SP', 'AM', 'PA', 'MA']));
        $this->assertFalse($service->isValida(['PR', 'RS']));
        $this->assertFalse($service->isValida(['PR', 'RJ']));
        $this->assertFalse($service->isValida(['RS', 'RR', 'MT']));
        $this->assertFalse($service->isValida(['SC', 'BB', 'HI']));
        $this->assertFalse($service->isValida(['RT', 'PO']));
    }
}