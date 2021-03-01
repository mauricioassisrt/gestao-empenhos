
## Sistema de gestão de empenhos

## Install Project 
 Copie o arquivo env.example
```shell php -r "copy('.env.example', '.env'); ```
 ## Caso haja necessidade 
 exculte o comando para gerar uma nova key 
```shell php artisan key:generate ```


 Suba o arquivo do banco de dados e crie o database com o nome nomedobanco 


Comentar o foreach no arquivo app/Providers/AuthServiceProvider.php, caso ele não estiver comentado o php artisan não funciona.
Instalação das tabelas no banco de dados, entre no terminal até a pasta do sistema, em seguida digite a linha de código php artisan migrate
# php artisan migrate
# refresh no migrate  php artisan migrate:fresh
Após a instalação das migrations instale as seeds


instale os usuários php artisan db:seed --class=UserTableSeeder
instale o arquivo da tabela pessoa  php artisan db:seed --class=PessoaSeeder
instale os roles php artisan db:seed --class=RoleTableSeeder
instale os permissions php artisan db:seed --class=PermissionTableSeeder



 após isso exculte o comando 
```shell php artisan serve ```

 acesse o browser com a URL localhost:8000
=

Após a instalação sistema pronto acesse a tela de login Usuário: admin@laravel.com e Senha: admin1234.

#### Caso ocorra as mensagens de envio de email estar em outro idioma utilize na pasta vendor no caminho altere o metodo \vendor\laravel\framework\src\Illuminate\Auth\Notifications\ResetPassword.php

<p>Dentro do metodo toMail altere para este logo a baixo </p>

public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        if (static::$createUrlCallback) {
            $url = call_user_func(static::$createUrlCallback, $notifiable, $this->token);
        } else {
            $url = url(route('password.reset', [
                'token' => $this->token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));
        }

        return (new MailMessage)
            ->subject(Lang::get('Redefinição de senha'))
            ->line(Lang::get('Você está recebendo este e-mail porque recebemos uma solicitação de redefinição de senha para sua conta.'))
            ->action(Lang::get('Mudar Senha?!'), $url)
            ->line(Lang::get('Este link de redefinição de senha expirará em: alguns minutos.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
            ->line(Lang::get('Se você não solicitou uma redefinição de senha, nenhuma ação adicional será necessária.'));
    }
### Caso a Mensagem inferior do email não esteja tratuzida vá no diretorio vendor\laravel\framework\src\Illuminate\Notifications\resources\views\email.blade.php e altere apartir de {{-- Subcopy --}} para¨###
@isset($actionText)
@slot('subcopy')
@lang(
    "Se você estiver com problemas para clicar no botão \":actionText\" , copie a URL e cole no seu navegador\n".
    ':',
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset


## problemas e erros ao redefinir senha  erros recorrentes a porta ou ao gmail 

https://stackoverflow.com/questions/33939393/failed-to-authenticate-on-smtp-server-error-using-gmail

### criar model controller e migrations
php artisan make:model Todo -mcr


Route::resource('nome','Controller');

## Learning Laravel
