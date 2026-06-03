<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutenticacaoController;
use App\Http\Controllers\VitrineController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnuncioController; // 🌟 CONSERTADO: Importação adicionada aqui!

// =========================================================================
// 🌍 ROTAS PÚBLICAS (Visitantes e Usuários Gerais)
// =========================================================================

Route::get('/', [VitrineController::class, 'index'])->name('vitrine.index');
Route::get('/animal/{id}', [VitrineController::class, 'show'])->name('vitrine.show');

// 👥 Novas telas da Comunidade e ONGs
Route::get('/comunidade/{tipo}', [AnuncioController::class, 'carregarPagina'])->name('comunidade.ver');
Route::post('/comunidade/{tipo}/salvar', [AnuncioController::class, 'salvarAnuncio'])->name('comunidade.salvar')->middleware('auth');
Route::get('/ongs', function () { return view('paginas.ongs'); })->name('ongs');


// =========================================================================
// 🔐 ROTAS DE AUTENTICAÇÃO
// =========================================================================

Route::get('/login', [AutenticacaoController::class, 'mostrarLogin'])->name('login');
Route::post('/login', [AutenticacaoController::class, 'login']);
Route::get('/cadastro', [AutenticacaoController::class, 'mostrarCadastro'])->name('cadastro'); // 🌟 Rota oficial de cadastro do seu sistema
Route::post('/cadastro', [AutenticacaoController::class, 'cadastro']);
Route::post('/logout', [AutenticacaoController::class, 'logout'])->name('logout');


// =========================================================================
// 🛡️ ROTAS PROTEGIDAS (Apenas Usuários Logados)
// =========================================================================

Route::middleware(['auth'])->group(function () {
    
    // 🐾 Painel do Candidato (Adotante)
    Route::get('/adotar/{animal_id}', [CandidatoController::class, 'formularioAdocao'])->name('adocao.formulario');
    Route::post('/adotar/{animal_id}', [CandidatoController::class, 'submeterFormulario'])->name('adocao.submeter');
    Route::get('/painel-candidato', [CandidatoController::class, 'painel'])->name('candidato.painel');

    // 👑 Painel Administrativo (ONG / Protetor)
    Route::middleware(['can:access-admin'])->group(function () {
        
        // Central de Triagem (Consolidada)
        Route::get('/admin/triagem', [AdminController::class, 'triagem'])->name('admin.triagem');
        Route::get('/admin/triagem/{id}', [AdminController::class, 'verSolicitacao'])->name('admin.solicitacao.ver');
        Route::post('/admin/triagem/{id}/responder', [AdminController::class, 'responderSolicitacao'])->name('admin.solicitacao.responder');
        
        // Gerenciamento de Animais (CRUD)
        Route::get('/admin/animais', [AdminController::class, 'indexAnimais'])->name('admin.animais.index');
        Route::post('/admin/animais', [AdminController::class, 'salvarAnimal'])->name('admin.animais.salvar');
        Route::delete('/admin/animais/{id}', [AdminController::class, 'deletarAnimal'])->name('admin.animais.deletar');
    });

});