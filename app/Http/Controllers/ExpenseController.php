<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\expense;
use App\Models\m_payment_method;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    public function index()
    {
        // $expenses = expense::all();
        $expenses = DB::table('expenses')
                    ->join('users','expenses.user_id', '=', 'users.id')
                    ->join('m_payment_methods', 'expenses.pay_id', '=', 'm_payment_methods.id')
                    ->select('expenses.*', 'users.name', 'm_payment_methods.pay_name')
                    ->get();

        return view('expenses.expenses',['expenses' => $expenses]);
    }

    public function create()
    {
        $users = User::all();
        $m_payment_methods = m_payment_method::all();

        return view('expenses.create',['users' => $users]);
    }

    public function store(Request $request)
    {
        // dd($request->input('pay_id'));

        $YM = $request->input('exp_date');
        $userid = $request->input('user_id');
        $CC_id = $request->input('CC_id');
        $exp_YM  = null;
        $pay_id = $request->input('pay_id');

        // dd($pay_id );

        if($pay_id == '2' && $request->has(key:'CC_id'))
        {
            
            $exp_YM = cutOffMonthYearCC($YM,$userid,$CC_id);
            // dd('CC');
            
        }
        else
        {
            $exp_YM = cutOffMonthYear($YM);
            // dd('NOT CC');
        }
        
        
        $expense = Expense::create([
            'user_id' => $request->input('user_id'),
            'exp_date' => $request->input('exp_date'),
            'exp_YM' => $exp_YM,
            'exp_amount' => $request->input('exp_amount'),
            'pay_id' => $request->input('pay_id'),
            'CC_id' => $request->input('CC_id'),
            'exp_type' => $request->input('exp_type'),
            'exp_description' => $request->input('exp_description'),
            'exp_remarks' => $request->input('exp_remarks'),
            'exp_zakwan' => $request->input('exp_zakwan'),
            'exp_rashidah' => $request->input('exp_rashidah')
            
        ]);

        return redirect()->route(route: 'expenses.index');
    }

    public function edit($id)
    {

        $expense = Expense::find($id);
        $users = User::all();
        $m_payment_methods = m_payment_method::all();

        return view('expenses.edit')->with('expense',$expense)->with('users',$users)->with('m_payment_methods',$m_payment_methods);
    }

    public function update(Request $request, $id)
    {
        $expense = Expense::where('id', $id)
        ->update([
            'user_id' => $request->input('user_id'),
            'exp_date' => $request->input('exp_date'),
            'exp_amount' => $request->input('exp_amount'),
            'pay_id' => $request->input('pay_id'),
            'exp_description' => $request->input('exp_description'),
            'exp_remarks' => $request->input('exp_remarks')
        ]);

        return redirect()->route(route: 'expenses.index');
    }

    public function destroy($id)
    {
        $expense = Expense::find($id);

        $expense->delete();

        return redirect()->route(route: 'expenses.index');
    }

}
