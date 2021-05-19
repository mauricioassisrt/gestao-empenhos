## Sistema de gestão de empenhos

## Install Project Caso seja o primeiro clone rodar o comando composer update 

## 1° Copie o arquivo env.example 
 cp .env.example .env
## 2° Caso haja necessidade 
 exculte o comando para gerar uma nova key 
```shell php artisan key:generate ```
# 3° Comentar FOREACH das roles 
Comentar o foreach no arquivo app/Providers/AuthServiceProvider.php, caso ele não estiver comentado o php artisan não funciona.
Instalação das tabelas no banco de dados, entre no terminal até a pasta do sistema, em seguida digite a linha de código 

php artisan migrate
refresh no migrate  php artisan migrate:fresh

## 4° Após a instalação das migrations instale as seeds

instale os permissions php artisan db:seed 



## 5° rodar o server  após isso exculte o comando 
```shell php artisan serve ```

 acesse o browser com a URL localhost:8000
=

Após a instalação sistema pronto acesse a tela de login Usuário: admin@laravel.com e Senha: admin1234.


## Caso ocorra problemas com a redefinição de senha com
## problemas e erros ao redefinir senha  erros recorrentes a porta ou ao gmail 


https://stackoverflow.com/questions/33939393/failed-to-authenticate-on-smtp-server-error-using-gmail

HABILITA APP MENOS SEGUROS 
https://myaccount.google.com/lesssecureapps?pli=1&rapt=AEjHL4N2oRzjfYRyPqNiIAEp2MmwYdVgKNLaq2b1CoU3RemM1HQfF0fOHCQzmle-rYmC0Gva5DNkf3VU5IDPAv6aJSOf1Rr0Rw

CONFIGURAÇÂO DO SMTP PARA REDEFINCAO DE SENHA 

MAIL_DRIVER=smtp
MAIL_HOST=smtp.googlemail.com
MAIL_PORT=587
MAIL_USERNAME=evento.tads@gmail.com
MAIL_PASSWORD=tads2016
MAIL_ENCRYPTION=tls
