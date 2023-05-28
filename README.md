# Descrição
### Desenvolvida uma API REST, onde através de uma requisição ou página web disponível na aplicação é possível informar uma rota entre estados, para verificar se ela é válida ou não.
### Para o desenvolvimento foi utilizado as seguintes tecnologias:
- #### PHP
- #### Framework Laravel
- #### Javascript
- #### CSS
<br>

# Configuração da API
## Instalação da dependencias
```sh
composer install
```
<br />

## Criar uma cópia do arquivo <i>.env.example</i> e nomear como <i>.env</i>
<br>

## Para executar a aplicação é necessário gerar uma chave
```sh
php artisan key:generate
```
<br />

# Comandos da API

## Executar o PHPStan
```sh
composer stan
```

### Observação: como estou utilizando o Laravel, temos a organização dos arquivos diferentes, então será verificado as seguintes pastas:         
- #### app
- #### resources
- #### routes
- #### tests 
<br />

## Executar os testes
```sh
composer test
```
<br />

## Executar a API
```sh
composer start
```
<br>

# Requisição para API
### Por padrão as rotas de API do Laravel ficam num arquivo separado das demais requisições, então antes de informar a rota é necessário adicionar `/api/` na url.
### Na rota `/trajeto/validar`, temos uma requisição `GET` com uma query string com um campo de nome `rota` com as siglas de estados separados por vírgula, deixando a requisição da seguinte maneira:
#### `<ip da aplicação:porta de acesso>/api/trajeto/validar?rota=<sigla do estado 1>,<sigla do estado 2>`

### Exemplo de utilização:
```sh
http://127.0.0.1:8000/api/trajeto/validar?rota=RS,SC
```
##### Lembrando que é possível passar mais do que duas siglas de estados.
<br>

### Como retorno da requisição temos dois possíveis JSON, que estão nos seguintes formatos:
```json
{
 "rota": "ROTA_ORIGINAL_AQUI", 
 "isValida": boolean
}

{
 "codigo": CODIGO_DO_ERRO,
 "mensagem": "MENSAGEM DE ERRO"
}
```

<br>

# Front End
### Foi criada uma página web que tem um input para informar a rota entre os estados, onde ela será verificada através de uma requisição ajax para a API, e assim confirmar se a rota é válida ou não. 
### Sendo utilizado do retorno para criar uma mensagem personalizada a ser exibida na página, como é possível observar na imagem abaixo.
<br/>
<div align="center">
    <img width="center" src="https://github.com/patrickscheibel/API-Rota/assets/47672652/f4b68947-df6f-4dc3-84f6-93e7dcc26907"/>
</div>

