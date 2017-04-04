# Sistema web para controle de estoque, vendas, crediário e consignados.

O sistema foi personalizado para um brechô que possuia a necessidade de controla os consignados das roupas deixadas na loja para vendas. O pagamento só era realizado 30 dias depois de a roupa ter sido vendida. Essa roupa tambem pordeira ser adicionada a um crediario que aceita pagamentos parcelados.
O sistema é capaz de gerar relatorios de vendas, lucros, quais peças de roupas devem ser reembolsadas entre outros relatorios pertinentes ao cliente.
O sistema utiliza um painel de login para segurança das informações guardando logs dos usuários com as operações realizadas dentro do sistema.








# FrameWork Instalation - CakePHP Application Skeleton 

[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![License](https://img.shields.io/packagist/l/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

A skeleton for creating applications with [CakePHP](http://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. Download [Composer](http://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run
```bash
composer create-project --prefer-dist cakephp/app [app_name]
```

You should now be able to visit the path to where you installed the app and see
the setup traffic lights.

## Configuration

Read and edit `config/app.php` and setup the 'Datasources' and any other
configuration relevant for your application.
