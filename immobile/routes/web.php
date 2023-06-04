<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CasaController;

Route::get('/casas/mais-cara',            [CasaController::class, 'maisCara'])          ->name('casas.maisCara');
Route::get('/casas/ordenar-por-preco',    [CasaController::class, 'ordenarPorPreco'])   ->name('casas.ordenarPorPreco');
Route::get('/casas/ordenar-por-endereco', [CasaController::class, 'ordenarPorEndereco'])->name('casas.ordenarPorEndereco');
Route::get('/casas/venda',                [CasaController::class, 'casasVenda'])        ->name('casas.venda');
Route::get('/casas/aluguel',              [CasaController::class, 'casasAluguel'])      ->name('casas.aluguel');
Route::post('/casas/pesquisa/',           [CasaController::class, 'pesquisa'])          ->name('casas.pesquisa');
Route::get('/',                           [CasaController::class, 'index'])             ->name('casas.index');
Route::get('/casas/create',               [CasaController::class, 'create'])            ->name('casas.create');
Route::post('/casas',                     [CasaController::class, 'store'])             ->name('casas.store');
Route::get('/casas/{casa}',               [CasaController::class, 'show'])              ->name('casas.show');
Route::get('/casas/{casa}/edit',          [CasaController::class, 'edit'])              ->name('casas.edit');
Route::put('/casas/{casa}',               [CasaController::class, 'update'])            ->name('casas.update');
Route::delete('/casas/{casa}',            [CasaController::class, 'destroy'])           ->name('casas.destroy');

Route::fallback(function () {
  return 'Erro!';
});
