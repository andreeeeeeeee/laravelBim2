<?php

namespace App\Http\Controllers;

use App\Models\Casa;
use Illuminate\Http\Request;

class CasaController extends Controller
{
  public function index()
  {
    $casas = Casa::all();
    return view('casas.index', compact('casas'));
  }

  public function create()
  {
    return view('casas.create');
  }

  public function store(Request $request)
  {
    /* $casa = new Casa();
    $casa->imobiliaria = $request->input('imobiliaria');
    $casa->endereco = $request->input('endereco');
    $casa->preco = $request->input('preco');
    $casa->vendaAluguel = $request->input('vendaAluguel');
    $casa->save(); */

    Casa::create($request->all());
    return redirect()->route('casas.index')->with('success', 'Casa criada com sucesso!');
  }

  public function show(Casa $casa)
  {
    return view('casas.show', compact('casa'));
  }

  public function edit(Casa $casa)
  {
    return view('casas.edit', compact('casa'));
  }

  public function update(Request $request, Casa $casa)
  {
    $casa->imobiliaria = $request->input('imobiliaria');
    $casa->endereco = $request->input('endereco');
    $casa->preco = $request->input('preco');
    $casa->vendaAluguel = $request->input('vendaAluguel');
    $casa->save();

    return redirect()->route('casas.index')->with('success', 'Casa atualizada com sucesso!');
  }

  public function destroy(Casa $casa)
  {
    $casa->delete();

    return redirect()->route('casas.index')->with('success', 'Casa excluída com sucesso!');
  }

  public function maisCara()
  {
    $casa = Casa::orderByDesc('preco')->first();
    return view('casas.show', compact('casa'));
  }

  public function ordenarPorPreco()
  {
    $casas = Casa::orderBy('preco')->get();
    return view('casas.index', compact('casas'));
  }

  public function ordenarPorEndereco()
  {
    $casas = Casa::orderBy('endereco')->get();
    return view('casas.index', compact('casas'));
  }

  public function casasVenda()
  {
    $casas = Casa::where('vendaAluguel', 1)->get();
    return view('casas.index', compact('casas'));
  }

  public function casasAluguel()
  {
    $casas = Casa::where('vendaAluguel', 0)->get();
    return view('casas.index', compact('casas'));
  }

  public function pesquisa(Request $request)
  {
    $pesquisa = $request->input('pesquisa');
    $casas = Casa::where('imobiliaria', 'like', '%' . $pesquisa . '%')
                 ->orWhere('endereco', 'like', '%' . $pesquisa . '%')->get();
    return view('casas.index', compact('casas'));
  }
}
