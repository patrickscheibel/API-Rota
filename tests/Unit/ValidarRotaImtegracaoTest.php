<?php

namespace Tests\Feature;

use Tests\TestCase;

class ValidarRotaImtegracaoTest extends TestCase
{
    /**
     * Testa se a rota de validação retorna status 200 e um JSON com a rota válida.
     */
    public function testValidarRotaValida(): void
    {
        $response = $this->get('api/trajeto/validar?rota=RS,SC');

        $response->assertStatus(200);
        $response->assertJson([
            'rota' => 'RS,SC',
            'isValida' => true
        ]);
    }

    /**
     * Testa se a rota de validação retorna status 400 e um JSON com a mensagem de erro referente a rota inválida.
     */
    public function testValidarRotaInvalida(): void
    {
        $response = $this->get('api/trajeto/validar?rota=RS,PU');

        $response->assertStatus(400);
        $response->assertJson([
            'codigo' => 400,
            'mensagem' => 'A rota está com alguma sigla de estado inexistente.'
        ]);
    }
}