<?php

namespace App\Http\Controllers;


use App\Models\Gifts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GiftsController extends Controller
{
    public function allGifts()
    {
        $gifts = $this->allGiftsFromDB();

        return view('gifts.all_gifts', compact('gifts'));
    }

    public function deleteGiftsFromDB($id)
    {

        db::table('gifts')->where('id', $id)->delete();
        return back();
    }

    public function viewGifts($id)
    {
        $gift = DB::table('gifts')
            ->join('users', 'gifts.user_id', '=', 'users.id')
            ->where('gifts.id', $id)
            ->select('gifts.*', 'users.name as username')
            ->first();
        $orcamento = DB::table('gifts')
            ->where('id', $id) // Filtro pelo ID do Gift
            ->select(
                'id',
                'valor_previsto',
                'valor_gasto',
                DB::raw('(valor_previsto - valor_gasto) AS valor_diferenca')
            )
            ->first();
        return view('gifts.view_gifts', compact('gift', 'orcamento'));
    }



    public function addGifts()
    {
        $allUsers = DB::table('users')->select('id', 'name as user_name')->get();
        return view('gifts.add_gifts', compact('allUsers'));
    }



    public function createGifts(Request $request)
    {
        //dd($request);
        $request->validate([
            'nome_prenda' => 'required|string|min:3',
            'valor_previsto' => 'required|numeric',
            'valor_gasto' => 'required|numeric',
            'user_id' => 'required|exists:users,id'
        ]);




        Gifts::insert([
            'nome_prenda' => $request->nome_prenda,
            'valor_previsto' => $request->valor_previsto,
            'valor_gasto' => $request->valor_gasto,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('gifts.all')->with('message', 'Gift adicionado com sucesso');
    }

    private function allGiftsFromDB()
    {

        $gifts = DB::table('gifts')
            ->join('users', 'gifts.user_id', '=', 'users.id')
            ->select('gifts.*', 'users.name as username')
            ->get();

        return $gifts;
    }

    public function editGifts($id)
    {

        $gift = DB::table('gifts')->where('id', $id)->first();
        $allUsers = DB::table('users')->select('id', 'name as user_name')->get();

        if (!$gift) {
            return redirect()->route('gifts.all_gifts')->with('error', 'Gift não encontrado.');
        }

        return view('gifts.edit_gifts', compact('gift', 'allUsers'));
    }

    public function updateGifts(Request $request, $id)
    {
        // Validação dos campos
        $request->validate([
            'nome_prenda' => 'required|string|min:3',
            'valor_previsto' => 'required|numeric',
            'valor_gasto' => 'required|numeric',
            'user_id' => 'required|exists:users,id'
        ]);

        // Encontra o gift pelo ID
        $gift = Gifts::find($id);

        // Atualiza os dados
        $gift->update([
            'nome_prenda' => $request->nome_prenda,
            'valor_previsto' => $request->valor_previsto,
            'valor_gasto' => $request->valor_gasto,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('gifts.all')->with('success', 'Gift atualizado com sucesso!');
    }
}
