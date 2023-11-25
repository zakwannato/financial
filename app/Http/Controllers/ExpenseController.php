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

        return view('expenses.create',['users' => $users],['m_payment_methods' => $m_payment_methods]);
    }

    public function store(Request $request)
    {
        $expense = Expense::create([
            'user_id' => $request->input('user_id'),
            'exp_date' => $request->input('exp_date'),
            'exp_amount' => $request->input('exp_amount'),
            'pay_id' => $request->input('pay_id'),
            'exp_remarks' => $request->input('exp_remarks')

        ]);

        return redirect()->route(route: 'expenses.index');
    }

}
