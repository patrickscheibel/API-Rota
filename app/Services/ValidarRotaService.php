<?php

namespace App\Services;

class ValidarRotaService
{
    /** 
     * Cria uma variável com os estados e seus vizinhos, sendo adicionado eles mesmos inicialmente,
     * isso ocorre devido aos casos de rotas que acontecem num mesmo estado. exemplo: ['RS','RS'].
     * 
     * @var array<mixed> 
     */
    private array $estadosVizinhos = [
        'AC' => ['AC', 'AM', 'RO'],
        'AL' => ['AL', 'PE', 'SE', 'BA'],
        'AP' => ['AP', 'PA'],
        'AM' => ['AM', 'AC', 'RR', 'RO', 'MT', 'PA', 'AP', 'TO'],
        'BA' => ['BA', 'SE', 'AL', 'PE', 'PI', 'TO', 'GO', 'MG', 'ES'],
        'CE' => ['CE', 'RN', 'PB', 'PE', 'PI'],
        'DF' => ['DF', 'GO'],
        'ES' => ['ES', 'BA', 'MG', 'RJ'],
        'GO' => ['GO', 'TO', 'BA', 'MG', 'MS', 'MT', 'DF'],
        'MA' => ['MA', 'PA', 'TO', 'PI'],
        'MT' => ['MT', 'RO', 'AM', 'PA', 'TO', 'GO', 'MS'],
        'MS' => ['MS', 'MT', 'GO', 'MG', 'SP', 'PR'],
        'MG' => ['MG', 'BA', 'GO', 'MS', 'SP', 'RJ', 'ES'],
        'PA' => ['PA', 'AM', 'AP', 'MA', 'TO', 'MT', 'RR'],
        'PB' => ['PB', 'RN', 'CE', 'PE'],
        'PR' => ['PR', 'SP', 'SC', 'MS'],
        'PE' => ['PE', 'AL', 'PB', 'CE', 'PI', 'BA'],
        'PI' => ['PI', 'PE', 'CE', 'BA', 'TO', 'MA'],
        'RJ' => ['RJ', 'ES', 'MG', 'SP'],
        'RN' => ['RN', 'CE', 'PB'],
        'RS' => ['RS', 'SC'],
        'RO' => ['RO', 'AC', 'AM', 'MT'],
        'RR' => ['RR', 'AM', 'PA'],
        'SC' => ['SC', 'RS', 'PR'],
        'SP' => ['SP', 'MG', 'MS', 'PR', 'RJ'],
        'SE' => ['SE', 'AL', 'BA'],
        'TO' => ['TO', 'PA', 'MA', 'PI', 'BA', 'GO', 'MT'],
    ];

    /** 
     * Verifica se a $rota é valida, com a comparação entre os estados vizinhos.
     * 
     * @param array<mixed> $rota 
     */
    public function isValida(array $rota): bool
    {
        if (count($rota) < 2)
        {
            return false;
        }
        elseif($this->isSiglaInexistente($rota))
        {
            return false;
        }

        $tamanho = count($rota);

        foreach ($rota as $i => $estadoAtual)
        {
            if ($i < $tamanho - 1)
            {
                $proximoEstado = $rota[$i + 1];
                // Compara as siglas dos estados vizinhos do $estadoAtual com o $proximoEstado, para verificar se a rota é valida. 
                if (!in_array($proximoEstado, $this->estadosVizinhos[$estadoAtual]))
                {
                    return false;
                }
            }
        }

        return true;
    }

    /** 
     * Verifica se alguma das siglas dos estados da $rota é inexistente.
     * 
     * @param array<mixed> $rota 
     */
    public function isSiglaInexistente(array $rota): mixed
    {
        // Compara as siglas dos estados da $rota com as chaves dos estados da variável local, para ver tem alguma sigla inexistente.
        return array_diff($rota, array_keys($this->estadosVizinhos));
    }
}
