# API
### Desenvolvido uma API REST, onde através de uma requisição ou página web disponível na aplicação é possível informar uma rota entre estados para verificar se ela é válida ou não.
### Para o desenvolvimento foi utilizado as tecnologias:
- #### PHP
- #### Framework Laravel
- #### Javascript
- #### CSS

<br/>

## Instalação da dependencias
```sh
composer install
```
<br />

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
### ou
```sh
php artisan serve
```

<br />

# Front End
### Foi criada uma página que tem um input para informar a rota entre os estados, onde ela será verificada através de uma requisição ajax para a Api, e assim confirmar se a rota é válida ou não. Como retorno temos dois possíveis json, que estão nos seguintes formatos:
```sh
{
 "rota": "ROTA_ORIGINAL_AQUI", 
 "isValida": boolean
}

{
 "codigo": CODIGO_DO_ERRO,
 "mensagem": "MENSAGEM DE ERRO"
}
```
### Esse retorno será utilizado para criar uma mensagem personalizado a ser exibida na página, como é possível observar na imagem abaixo.
<br/>
<div align="center">
<img width="center" src="https://github.com/patrickscheibel/API-Rota/assets/47672652/f4b68947-df6f-4dc3-84f6-93e7dcc26907"/>
<div>
