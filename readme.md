# Real Imovel

Sistema de gerenciamento de imoveis ...

## Tecnologias utilizadas

### Backend
* PHP - 5.6.*
* Apache - 2.4.7
* Mysql - 5.5.44
* Laravel - 5.2.*

### Frontend
* Jquery - 3.1.0 (https://jquery.com/)
* Materialize - 0.97.7 (http://materializecss.com)
* jQuery Mask Plugin - 1.14.11 (https://igorescobar.github.io/jQuery-Mask-Plugin)

## Tarefas para relacionar o usuario com o imovel

OK - * Adicionar coluna de usuario na migration de imovel.
OK - * ajustar as seeds dos imoveis adicionando usuario ao imovel.
Ok - * Adicionar campo na interface de imoveis quando o usuario for administrador, lista de todos os usuarios.
OK - * listar para os usuarios logado apenas os imoveis vinculados a ele.
* Salvar Usuário selecionado

## Apresentação Topicos

1 - Frontend
- Materialize
- jQuery
- jQuery Mask Plugin
- jQuery LoadingOverlay
- Padrões javaScript
    Versão em ingles => http://opensource.locaweb.com.br/locawebstyle/documentacao/praticas/javascript/
    Versão em portugues => https://addyosmani.com/resources/essentialjsdesignpatterns/book/#revealingmodulepatternjavascript

    * As principais vantagens de manter este padrão são:

    - Consistência de código;
    - Melhores práticas;
    - Escalabilidade;
    - Fácil manutenção;
    - Uniformidade entre projetos.

    Obs: Depois de falar, exibir exemplos e falar um pouco.


2 - BackEnd
- Laravel (Fazer a propaganga, falar de algumas funcionalidades que destaca o framework, e o motivo da escolha, falar dos recursos que ja vem prontos, autenticação e etc ...), documentação incrivel.

- Padrões do PHP. (http://www.php-fig.org/), o laravel, segue fortemente o que é definido pela PSR-*, para atender um requisito Não Funcional (INTEROPERABILIDADE)

- Blade (Organizar as views, e a criação de template).

- Autenticação.

- Permissões => Plugin para gerenciar ACL, criado por um Brasileiro, https://github.com/Zizaco/entrust, simples de cofnigurar, documentação incrivel. Mostrar exemplos no codigo.

- Persistencia, foi utilizado o ELOQUENT, ORM nativo do laravel, caso não tenha afinidade com outro ORM, o eco sistema do laravel, permite, com facilidade realizar a subtituição. (Exibir exemplos).

- Migration e Seeds => Recurso espetacular, permite criar e versionar o banco de dados, entre desenvolvedores. As Seeds, permite ter uma massa de dados inicial para que seja feitos teste, assim não é necessario cadastrar dados a todo momento, e facilitando a entrada de novos membros no time.
(exibir os exemplos).

- Requests com Validator, recursos sensacional que permiter verificar a entradas de dados, exemplo campo obrigatorio, tamanho maximo, unico. consultar a documentação (https://laravel.com/docs/5.5/requests).

3 - Gerencia de Configuração

- Utilização do Controlador de Versão GIT, (vantagem de utilizar, e diversos recursos de integração).
- Heroku para fazer build e deploy, real-imoveis.herokuapp.com, falar um pouco do processo, como funcionar e como e simples de utilizar. Integração do com GIT.

4 - Finalização
- Considerações, o que é o Real Imoveis? Quanto porcento esta concluido? Onde queremos chegar com Real Imoveis?


## Obrigado, meus queridos, felicidades e alegrias, sucesso ...



