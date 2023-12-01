<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\commitment;
use App\Models\m_commitment;
use App\Models\m_payment_method;
use App\Models\user;
use Illuminate\Support\Facades\DB;

class CommitmentController extends Controller
{
    public function index()
    {
        //$commitments = commitment::all();
        $commitments = DB::table('commitments')
        ->join('m_commitments','m_commitments.id', '=', 'commitments.com_t_id')
        ->select('commitments.id', 'm_commitments.com_name', 'commitments.com_YM', 'commitments.pay_flag')
        ->where('commitments.pay_flag', '=', '0')
        ->get();

        $paids = DB::table('commitments')
        ->join('m_commitments','m_commitments.id', '=', 'commitments.com_t_id')
        ->join('m_payment_methods','m_payment_methods.id', '=', 'commitments.pay_id')
        ->join('users','commitments.user_id_pay', '=', 'users.id')
        ->select('commitments.*' , 'm_commitments.com_name' , 'users.name','m_payment_methods.pay_name')
        ->where('commitments.pay_flag', '=', '1')
        ->get();

        return view('commitments.commitments')->with('commitments',$commitments)->with('paids',$paids);
    }

    public function edit($id)
    {

        $commitments = commitment::find($id);
        $m_commitments = m_commitment::all();
        $users = User::all();
        $m_payment_methods = m_payment_method::all();

        return view('commitments.edit')
        ->with('commitments',$commitments)
        ->with('m_commitments',$m_commitments)
        ->with('users',$users)
        ->with('m_payment_methods',$m_payment_methods);
    }

    public function update(Request $request, $id)
    {
        $commitments = commitment::where('id', $id)
        ->update([
            'pay_flag' => '1',
            'com_amount' => $request->input('com_amount'),
            'com_pay_date' => $request->input('com_pay_date'),
            'user_id_pay' => $request->input('user_id_pay'),
            'pay_id' => $request->input('pay_id')
        ]);

        return redirect()->route(route: 'commitments.index');
    }
}
