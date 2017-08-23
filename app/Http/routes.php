<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Auth::routes();http:

Route::get('/home', 'HomeController@index');

Route::get('/', ['as'=>'site.home', 'uses'=>'Site\HomeController@index']);

Route::get('/sobre', ['as'=>'site.sobre', 'uses'=>'Site\PaginaController@sobre']);

Route::get('/contato', ['as'=>'site.contato', 'uses'=>'Site\PaginaController@contato']);

Route::post('/contato/enviar',['as'=>'site.contato.enviar', 'uses'=>'Site\PaginaController@enviarContato']);

Route::get('/imovel/{id}/{titulo?}', ['as'=>'site.imovel', 'uses'=>'Site\ImovelController@index']);

Route::get('/busca', ['as'=>'site.busca', 'uses'=>'Site\HomeController@busca']);

Route::get('/login',['as'=>'login', function(){
	return view('login.index');
}]);

Route::post('/login',['as'=>'login', 'uses'=>'Admin\UsuarioController@login']);

Route::get('/cadastro',['as'=>'principal.cadastro', 'uses'=>'Usuario\CadastroPerfilController@index']);

Route::post('/cadastro/salvar',['as'=>'principal.cadastro.salvar', 'uses'=>'Usuario\CadastroPerfilController@salvar']);

Route::group(['middleware'=>'auth'], function(){
	
	Route::get('/admin/login/sair',['as'=>'admin.login.sair', 'uses'=>'Admin\UsuarioController@sair']);

	Route::get('/admin/principal',['as'=>'admin.principal', function(){
		return view('login.principal_adm.index');
	}]);

	Route::get('/principal',['as'=>'usuario.principal', function(){
		return view('login.principal_usuario.index');
	}]);

	Route::get('/admin/usuarios',['as'=>'admin.usuarios', 'uses'=>'Admin\UsuarioController@lista']);
	Route::get('/admin/usuarios/adicionar',['as'=>'admin.usuarios.adicionar', 'uses'=>'Admin\UsuarioController@adicionar']);
	Route::post('/admin/usuarios/salvar',['as'=>'admin.usuarios.salvar', 'uses'=>'Admin\UsuarioController@salvar']);
	Route::get('/admin/usuarios/editar/{id}',['as'=>'admin.usuarios.editar', 'uses'=>'Admin\UsuarioController@editar']);
	Route::put('/admin/usuarios/atualizar/{id}',['as'=>'admin.usuarios.atualizar', 'uses'=>'Admin\UsuarioController@atualizar']);
	Route::get('/admin/usuarios/deletar/{id}', ['as'=>'admin.usuarios.deletar', 'uses'=>'Admin\UsuarioController@deletar']);

	Route::get('/admin/usuarios/papel/{id}',['as'=>'admin.usuarios.papel', 'uses'=>'Admin\UsuarioController@papel']);
	Route::post('/admin/usuarios/papel/salvar/{id}',['as'=>'admin.usuarios.papel.salvar', 'uses'=>'Admin\UsuarioController@salvarPapel']);
	Route::get('/admin/usuarios/papel/remover/{id}', ['as'=>'admin.usuarios.papel.remover', 'uses'=>'Admin\UsuarioController@removerPapel']);
	
	Route::get('/admin/paginas',['as'=>'admin.paginas', 'uses'=>'Admin\PaginasController@index']);
	Route::get('/admin/paginas/editar/{id}',['as'=>'admin.paginas.editar', 'uses'=>'Admin\PaginasController@editar']);
	Route::put('/admin/paginas/atualizar/{id}',['as'=>'admin.paginas.atualizar', 'uses'=>'Admin\PaginasController@atualizar']);
	Route::get('/admin/perfil',['as'=>'admin.perfil', function(){
		return view('login.principal_adm.perfil');
	}]);

	Route::get('/admin/imovel/tipos',['as'=>'admin.imovel.tipos', 'uses'=>'Admin\TipoController@listaAdm']);
	Route::get('/admin/imovel/tipos/adicionar',['as'=>'admin.imovel.tipos.adicionar', 'uses'=>'Admin\TipoController@adicionarAdm']);
	Route::post('/admin/imovel/tipos/salvar',['as'=>'admin.imovel.tipos.salvar', 'uses'=>'Admin\TipoController@salvarAdm']);
	Route::get('/admin/imovel/tipos/editar/{id}',['as'=>'admin.imovel.tipos.editar', 'uses'=>'Admin\TipoController@editarAdm']);
	Route::put('/admin/imovel/tipos/atualizar/{id}',['as'=>'admin.imovel.tipos.atualizar', 'uses'=>'Admin\TipoController@atualizarAdm']);
	Route::get('/admin/imovel/tipos/deletar/{id}', ['as'=>'admin.imovel.tipos.deletar', 'uses'=>'Admin\TipoController@deletarAdm']);

	Route::get('/admin/cidades',['as'=>'admin.cidades', 'uses'=>'Admin\CidadeController@listaAdm']);
	Route::get('/admin/cidades/adicionar',['as'=>'admin.cidades.adicionar', 'uses'=>'Admin\CidadeController@adicionarAdm']);
	Route::post('/admin/cidades/salvar',['as'=>'admin.cidades.salvar', 'uses'=>'Admin\CidadeController@salvarAdm']);
	Route::get('/admin/cidades/editar/{id}',['as'=>'admin.cidades.editar', 'uses'=>'Admin\CidadeController@editarAdm']);
	Route::put('/admin/cidades/atualizar/{id}',['as'=>'admin.cidades.atualizar', 'uses'=>'Admin\CidadeController@atualizarAdm']);
	Route::get('/admin/cidades/deletar/{id}', ['as'=>'admin.cidades.deletar', 'uses'=>'Admin\CidadeController@deletarAdm']);

	Route::get('/admin/imoveis',['as'=>'admin.imoveis', 'uses'=>'Admin\ImovelController@listaAdm']);
	Route::get('/admin/imoveis/adicionar',['as'=>'admin.imoveis.adicionar', 'uses'=>'Admin\ImovelController@adicionarAdm']);
	Route::post('/admin/imoveis/salvar',['as'=>'admin.imoveis.salvar', 'uses'=>'Admin\ImovelController@salvarAdm']);
	Route::get('/admin/imoveis/editar/{id}',['as'=>'admin.imoveis.editar', 'uses'=>'Admin\ImovelController@editarAdm']);
	Route::put('/admin/imoveis/atualizar/{id}',['as'=>'admin.imoveis.atualizar', 'uses'=>'Admin\ImovelController@atualizarAdm']);
	Route::get('/admin/imoveis/deletar/{id}', ['as'=>'admin.imoveis.deletar', 'uses'=>'Admin\ImovelController@deletarAdm']);

	Route::get('/principal/imoveis',['as'=>'principal.imoveis', 'uses'=>'Admin\ImovelController@listaUser']);
	Route::get('/principal/imoveis/adicionar',['as'=>'principal.imoveis.adicionar', 'uses'=>'Admin\ImovelController@adicionarUser']);
	Route::post('/principal/imoveis/salvar',['as'=>'principal.imoveis.salvar', 'uses'=>'Admin\ImovelController@salvarUser']);
	Route::get('/principal/imoveis/editar/{id}',['as'=>'principal.imoveis.editar', 'uses'=>'Admin\ImovelController@editarUser']);
	Route::put('/principal/imoveis/atualizar/{id}',['as'=>'principal.imoveis.atualizar', 'uses'=>'Admin\ImovelController@atualizarUser']);
	Route::get('/principal/imoveis/deletar/{id}', ['as'=>'principal.imoveis.deletar', 'uses'=>'Admin\ImovelController@deletarUser']);

	Route::get('/admin/galeria/{id}',['as'=>'admin.galeria', 'uses'=>'Admin\GaleriaController@listaAdm']);
	Route::get('/admin/galeria/adicionar/{id}',['as'=>'admin.galeria.adicionar', 'uses'=>'Admin\GaleriaController@adicionarAdm']);
	Route::post('/admin/galeria/salvar/{id}',['as'=>'admin.galeria.salvar', 'uses'=>'Admin\GaleriaController@salvarAdm']);
	Route::get('/admin/galeria/editar/{id}',['as'=>'admin.galeria.editar', 'uses'=>'Admin\GaleriaController@editarAdm']);
	Route::put('/admin/galeria/atualizar/{id}',['as'=>'admin.galeria.atualizar', 'uses'=>'Admin\GaleriaController@atualizarAdm']);
	Route::get('/admin/galeria/deletar/{id}', ['as'=>'admin.galeria.deletar', 'uses'=>'Admin\GaleriaController@deletarAdm']);

	Route::get('/principal/galeria/{id}',['as'=>'principal.galeria', 'uses'=>'Admin\GaleriaController@listaUser']);
	Route::get('/principal/galeria/adicionar/{id}',['as'=>'principal.galeria.adicionar', 'uses'=>'Admin\GaleriaController@adicionarUser']);
	Route::post('/principal/galeria/salvar/{id}',['as'=>'principal.galeria.salvar', 'uses'=>'Admin\GaleriaController@salvarUser']);
	Route::get('/principal/galeria/editar/{id}',['as'=>'principal.galeria.editar', 'uses'=>'Admin\GaleriaController@editarUser']);
	Route::put('/principal/galeria/atualizar/{id}',['as'=>'principal.galeria.atualizar', 'uses'=>'Admin\GaleriaController@atualizarUser']);
	Route::get('/principal/galeria/deletar/{id}', ['as'=>'principal.galeria.deletar', 'uses'=>'Admin\GaleriaController@deletarUser']);
	
	Route::get('/admin/perfil/',['as'=>'admin.perfil', 'uses'=>'Usuario\CadastroPerfilController@indexAdm']);
	Route::get('/admin/perfil/editar/{id}',['as'=>'admin.perfil.editar', 'uses'=>'Usuario\CadastroPerfilController@editarAdm']);
	Route::put('/admin/perfil/atualizar/{id}',['as'=>'admin.perfil.atualizar', 'uses'=>'Usuario\CadastroPerfilController@atualizarAdm']);
	Route::get('/admin/perfil/deletar/{id}', ['as'=>'admin.perfil.deletar', 'uses'=>'Usuario\CadastroPerfilController@deletarAdm']);

	Route::get('/principal/perfil/',['as'=>'principal.perfil', 'uses'=>'Usuario\CadastroPerfilController@indexUser']);
	Route::get('/principal/perfil/editar/{id}',['as'=>'principal.perfil.editar', 'uses'=>'Usuario\CadastroPerfilController@editarUser']);
	Route::put('/principal/perfil/atualizar/{id}',['as'=>'principal.perfil.atualizar', 'uses'=>'Usuario\CadastroPerfilController@atualizarUser']);
	Route::get('/principal/perfil/deletar/{id}', ['as'=>'principal.perfil.deletar', 'uses'=>'Usuario\CadastroPerfilController@deletarUser']);

	Route::get('/admin/slides',['as'=>'admin.slides', 'uses'=>'Admin\SlideController@listaAdm']);
	Route::get('/admin/slides/adicionar',['as'=>'admin.slides.adicionar', 'uses'=>'Admin\SlideController@adicionarAdm']);
	Route::post('/admin/slides/salvar',['as'=>'admin.slides.salvar', 'uses'=>'Admin\SlideController@salvarAdm']);
	Route::get('/admin/slides/editar/{id}',['as'=>'admin.slides.editar', 'uses'=>'Admin\SlideController@editarAdm']);
	Route::put('/admin/slides/atualizar/{id}',['as'=>'admin.slides.atualizar', 'uses'=>'Admin\SlideController@atualizarAdm']);
	Route::get('/admin/slides/deletar/{id}', ['as'=>'admin.slides.deletar', 'uses'=>'Admin\SlideController@deletarAdm']);

	Route::get('/admin/papel',['as'=>'admin.papel', 'uses'=>'Admin\PapelController@listaAdm']);
	Route::get('/admin/papel/adicionar',['as'=>'admin.papel.adicionar', 'uses'=>'Admin\PapelController@adicionarAdm']);
	Route::post('/admin/papel/salvar',['as'=>'admin.papel.salvar', 'uses'=>'Admin\PapelController@salvarAdm']);
	Route::get('/admin/papel/editar/{id}',['as'=>'admin.papel.editar', 'uses'=>'Admin\PapelController@editarAdm']);
	Route::put('/admin/papel/atualizar/{id}',['as'=>'admin.papel.atualizar', 'uses'=>'Admin\PapelController@atualizarAdm']);
	Route::get('/admin/papel/deletar/{id}', ['as'=>'admin.papel.deletar', 'uses'=>'Admin\PapelController@deletarAdm']);

	Route::get('/admin/papel/permissao/{id}',['as'=>'admin.papel.permissao', 'uses'=>'Admin\PapelController@permissao']);
	Route::post('/admin/papel/permissao/salvar/{id}',['as'=>'admin.papel.permissao.salvar', 'uses'=>'Admin\PapelController@salvarPermissao']);
	Route::get('/admin/papel/permissao/remover/{id}/{id_permissao}',['as'=>'admin.papel.permissao.remover', 'uses'=>'Admin\PapelController@removerPermissao']);
});

