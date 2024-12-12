<?php

namespace App\Http\Controllers;

use App\Http\Requests\AffiliatesFormRequest;
use App\Models\Affiliate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffiliatesController extends Controller
{
    public function index(Request $request)
    {
        $affiliates = Affiliate::all();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        $request->session()->forget('mensagem.sucesso');

        return view('affiliates.index')->with('affiliates', $affiliates)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('affiliates.create');
    }

    public function store(AffiliatesFormRequest $request)
    {
        $data = $request->except(['_token']);

        $affiliate = Affiliate::create($data);

        return to_route('affiliates.index')->with('mensagem.sucesso', "Afiliado '{$affiliate->name}' adicionado com sucesso");
    }

    public function edit(Affiliate $affiliate)
    {
        return view('affiliates.edit')->with('affiliate', $affiliate);
    }

    public function update(AffiliatesFormRequest $request, Affiliate $affiliate)
    {
        $affiliate->fill($request->all());
        $affiliate->save();

        return to_route('affiliates.index')->with('mensagem.sucesso', "Afiliado '$affiliate->name' atualizado com sucesso!");
    }

    public function destroy()
    {
        Auth::logout();

        return to_route('login');
    }

    public function toggleActive(Affiliate $affiliate)
    {
        $affiliate->active = !$affiliate->active;
        $affiliate->save();

        return back()->with('success', 'Status do afiliado atualizado com sucesso!');
    }

}
