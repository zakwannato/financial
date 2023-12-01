<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_commitment;
use Illuminate\Support\Facades\DB;

class M_CommitmentController extends Controller
{
    public function index()
    {
        $m_commitments = m_commitment::all();

        return view('settings.master.commitment.m_commitment')->with('m_commitments',$m_commitments);
    }

    public function create()
    {

        return view('settings.master.commitment.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        
        $expense = m_commitment::create([
            'com_name' => $request->input('com_name'),
            'active_flag' => $request->has(key:'active_flag')
        ]);

        return redirect()->route(route: 'm_commitment.index');
    }

    public function edit($id)
    {
        $m_commitment = m_commitment::find($id);

        return view('settings.master.commitment.edit')->with('m_commitment',$m_commitment);
    }

    public function update(Request $request, $id)
    {
        $m_commitment = m_commitment::where('id', $id)
        ->update([
            'com_name' => $request->input('com_name'),
            'active_flag' => $request->has(key:'active_flag')
        ]);

        return redirect()->route(route: 'm_commitment.index');
    }

    public function destroy($id)
    {
        $m_commitment = m_commitment::find($id);

        $m_commitment->delete();

        return redirect()->route(route: 'm_commitment.index');
    }
}
