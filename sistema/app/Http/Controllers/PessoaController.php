<?php

namespace App\Http\Controllers;

use App\Pessoa;
use App\PessoaUnidade;
use App\Unidade;
use App\User;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

use Illuminate\Mail\Message;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            if (Gate::allows('pessoa_view')) {

                $titulo = "Pessoas  ";
                $pessoas = Pessoa::paginate(10);

                return view('pessoa.index', compact('titulo', 'pessoas'));
            } else {
                $titulo = "SEM ACESSO ";

                return view('errors.404', compact('titulo'));
            }
        } catch (\Throwable $th) {
            $titulo = "SEM ACESSO ";

            return view('errors.404', compact('titulo'));
        }
    }

    public function create()
    {
        try {
            if (Gate::allows('insert_pessoa')) {

                $titulo = 'Cadastro de nova pessoa';
                return view('pessoa.formulario', compact('titulo'));
            } else {
                $titulo = "SEM ACESSO ";

                return view('errors.404', compact('titulo'));
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function store(Request $request)
    {

        try {
            $objetoUsuario = new User();
            //atribui a requisiçao a uma variavel
            $objetoPessoa = $request->all();
            /* INSERE UM USUARIO PARA ACESSAR O SISTEMA  */
            $input = $request->all();

            if (Gate::allows('insert_pessoa')) {
                $user = array(
                    'remember_token' => $input['_token'],
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'password' => bcrypt($input['password']),
                    'password-confirm' => bcrypt($input['password-confirm'])
                );
                $new_user = new User();
                $new_user = $new_user->create($user);
                //set id do usuario na tabela pessoa
                $objetoPessoa['user_id'] = $new_user->id;
                /* fim do insere usuario */
                /* UPLOAD de imagem  */
                $image = $request->file('foto_pessoa');
                $dir = "img/pessoa";
                $extencao = $image->guessClientExtension();
                $nomeImagem = "pessoa-perfil-" . $request->email . "." . $extencao;
                $image->move($dir, $nomeImagem);
                $imageSalvar = $dir . "/" . $nomeImagem;
                $objetoPessoa['foto_pessoa'] = $imageSalvar;
                //convert data nascimento
                $objetoPessoa['data_nascimento'] =  date('Y-m-d');
                /* fim do upload  */
                Pessoa::create($objetoPessoa);
                return redirect()->to("users/visualizar/" . $new_user->id);
            }
        } catch (\Throwable $th) {
            //dd($th);
            return view('errors.404');
        }
    }

    public function update(Request $request, Pessoa $pessoa)
    {
        try {

            if (Gate::allows('pessoa_edit')) {

                $usuario = User::findOrFail($request->user_id);
                if ($usuario->email === $request->email && Hash::check($request->senha_antiga, $usuario->password)) {
                    $new_user = User::findOrFail($request->user_id);
                    $input = $request->all();
                    $user = array(
                        'remember_token' => $input['_token'],
                        'name' => $input['name'],
                        'email' => $input['email'],
                        'password' => bcrypt($input['password']),
                        'password-confirm' => bcrypt($input['password-confirm'])
                    );
                    $new_user->update($user);
                    $objetoPessoa = Pessoa::findOrFail($pessoa->id);


                    /* fim do insere usuario */
                    /* UPLOAD de imagem  */
                    $image = $request->file('foto_pessoa');
                    $dir = "img/pessoa";
                    $extencao = $image->guessClientExtension();
                    $nomeImagem = "pessoa-perfil-" . $request->email . "." . $extencao;
                    $image->move($dir, $nomeImagem);
                    $imageSalvar = $dir . "/" . $nomeImagem;
                    /* fim do upload  */
                    $atualizarPessoa = $request->all();
                    $dataConvertida = date('Y-m-d', strtotime($objetoPessoa['data_nascimento']));


                    $atualizarPessoa['user_id'] = $new_user->id;
                    $atualizarPessoa['foto_pessoa'] = $imageSalvar;
                    $atualizarPessoa['data_nascimento'] = $dataConvertida;



                    $objetoPessoa->update($atualizarPessoa);
                    return redirect()->to("users/visualizar/" . $new_user->id);
                } else {
                    dd('no else');
                }
                $titulo = 't';
            }
        } catch (\Throwable $th) {
            return view('errors.404');
        }
    }

    public function destroy(Pessoa $pessoa)
    {
        try {
            if (Gate::allows('pessoa_delete')) {
                Pessoa::find($pessoa->id)->delete();
                User::find($pessoa->user_id)->delete();
                return redirect()->to('pessoas');
            }
        } catch (\Throwable $th) {
            return view('errors.404');
        }
    }
    /** EDITA AS PESSOAS DO SISTEMA DE MODO GERAL e usuario logado -$ID pega o id do usuario do sistema da tabela users */
    public function editar_pessoa($id)
    {
        //exculta o try caso tenha errors.404rs.404s cai no catch
        try {
            /** faz a consulta verificando o id do usuario está vinculado a uma pessoa  */
            $pessoa = Pessoa::where('user_id', $id)->first();
            // verifica se o id é o mesmo do usuario logado
            //caso seja é possivel editar o usuario logado
            if ($pessoa->user_id === Auth::user()->id) {
                $titulo = "Editar Pessoa Logada ";
                ///$user = $pessoa->pessoas()->first();
                return view('pessoa.formulario', compact('pessoa', 'titulo'));
            } else if (Gate::allows('pessoa_view')) {
                //caso seja uma edição de outros usuarios como usuarios gerais cadastrados no sistema, cai neste else
                $titulo = "Editar Pessoa";
                // $user = $pessoa->pessoas()->first();
                return view('pessoa.formulario', compact('pessoa', 'titulo'));
            } else {
                $titulo = "Acesso não autorizado ";
                return view('errors.404', compact('titulo'));
            }
        } catch (\Throwable $th) {
            $titulo = "dsa";
            return view('errors.404', compact('titulo', 'th'));
        }
    }

    /*
     METODO DE PESQUISAR
    */
    public function search(Request $request)
    {
        try {
            $titulo = 'Pessoas ';
            if (Gate::allows('pessoa_view')) {
                $pessoas = new Pessoa();
                $search = $request->get('table_search');
                $pessoas = Pessoa::where('name', 'like', '%' . $search . '%')->paginate(10);
                return view('pessoa.index', compact('titulo', 'pessoas'));
            } else {
                return view('errors.404', compact('titulo'));
            }
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }

    public function retorna_senhas(Request $request)
    {
        //pegar o email e comparar, e pegar a senha vinda e comparar
        if ($request->user_id) {
            $usuario = User::findOrFail($request->user_id);
            if ($usuario->email === $request->email && Hash::check($request->senha_antiga, $usuario->password)) {
                return response()->json(['success' => 'success']);
            } else {
                return response()->json(['error' => 'Email incorreto,']);
            }
        } else {
            $user = User::where('email', 'like', '%' . $request->email . '%')->first();

            if ($user) {

                return response()->json(['error' => 'error', 'data' => 'Este e-mail já está sendo utilizado por um usuário!']);
            } else {
                return response()->json(['success' => 'success', 'data' => 'Email disponivel!']);
            }
        }
    }

    /*
        Reset password
    */
    public function sendEmail(Request $request)
    {

        $credentials = ['email' => $request->email];
        $response = Password::sendResetLink($credentials, function (Message $message) {
            $message->subject($this->getEmailSubject());
        });

        switch ($response) {
            case Password::RESET_LINK_SENT:

                return redirect('/pessoas')->with('status', trans($response));
            case Password::INVALID_USER:
                return redirect('/pessoas')->with('email', trans($response));
        }
    }

    public function vincularUnidade(Pessoa $pessoa)
    {
        try {
            $titulo = 'Vincular uma Unidade a pessoa  ';
            if (Gate::allows('pessoa_vincular_unidade')) {
                $unidades = Unidade::all();

                $pessoa_unidades = PessoaUnidade::where('pessoa_id', $pessoa->id)->get();


                $unidade_id = 0;
                return view('pessoa.formulario-vincular-unidade', compact('titulo', 'unidades', 'pessoa', 'pessoa_unidades', 'unidade_id'));
            } else {
            }
        } catch (\Throwable $th) {
            return view('errors.404');
        }
    }
    public function insertUnidadePessoa(Request $request)
    {

        try {

            $pessoaUnidade = PessoaUnidade::where('pessoa_id', $request->pessoa_id)->get();


            if (Gate::allows('insert_unidade_pessoa')) {

                if ($pessoaUnidade->isEmpty()) {

                    PessoaUnidade::create($request->all());
                    return redirect('vincularUnidade/' . $request->pessoa_id)->with('status', 'Vinculado com sucesso !!!');
                } else {
                    $contador = 0;
                    foreach ($pessoaUnidade as $unidadeP) {

                        if ($unidadeP->unidade_id == $request->unidade_id) {
                            $contador += 1;
                        }
                    }

                    if ($contador == 0) {
                        PessoaUnidade::create($request->all());
                        return redirect('vincularUnidade/' . $request->pessoa_id)->with('status', 'Vinculado com sucesso !!!');
                    } else {
                        return redirect('vincularUnidade/' . $request->pessoa_id)->with('status', 'Unidade já está vinculada a um Colaborador/pessoa!');
                    }
                }
            } else {
                return view('errors.404');
            }
        } catch (\Throwable $th) {
            return view('errors.404');
        }
    }
    public function destroyUnidadePessoa($id, $pessoa)
    {

        try {

            if (Gate::allows('pessoa_delete_unidade')) {

                PessoaUnidade::find($id)->delete();
                return redirect('vincularUnidade/' . $pessoa)->with('status', 'Removido com sucesso!');
            }
        } catch (\Throwable $th) {
            return view('errors.404');
        }
    }
}
