# Instalação da dependencias
```sh
composer install
```

# Executar o PHPStan
```sh
composer stan
```

### Observação: como estou utilizando o Laravel, temos a organização dos arquivos diferentes, então será verificado as seguintes pastas:         
- app
- resources
- routes
- tests 

# Executar os testes
```sh
composer test
```

# Executar a API
```sh
composer start
```
### ou
```sh
php artisan serve
```

# Frontend
### Foi criado uma página que tem um input para definir a rota, onde ela será verificada atraves de uma requisição ajax para a api pare confirmar se a rota é válida ou não. Como retorno temos dois possiveis json, que estão nos seguintes formatos:
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
### Esse retorno será utilizado para criar uma mensagem personalizado a ser exibida na página.