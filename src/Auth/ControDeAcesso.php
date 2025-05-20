<?php
namespace Microblog\Auth;
/*sobre sessões no php
sessão (session) é uma funcionalidade usada para o controle
de acesso  e outras informações que sejam importantes enquanto
o navegador estiver aberto com o site.

Exemplos: áreas administrativas, painel de controle/dashboar,
aréa do cliente, área do aluno etc.

nestas áreas o acesso se dá através de alguma forma de autenticação.
exemplos: login/senha, biometria, facial, 2-fatores etc.*/

final class ControleDeAcesso 
{
    private function __construct() {}

    /*Iniciar sessão caso na tenha sessão */
    private static function iniciarSessao():void
    {
        if(!isset($_SESSION)) session_start();
    }

    /*"bloqueia" páginas admin caso o usuario não esteja logado*/
    public function exigirLogin(): void
    {
        //inicia sessão se necessario
        self::iniciarSessao();

        //Se não existir uma variavel de sessão chamada ID
        if(!isset($_SESSION['id'])){
            session_destroy();
            header("location:../login.php?acesso_proibido");
            exit;
        }
    }
}