<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_payment_method;

class M_PaymentMethodController extends Controller
{
    public function index()
    {
        return view('settings.paymet.paymet');
    }

    public function create()
    {

        return view('settings.paymet.create');
    }

    public function store(Request $request)
    {
        $paymet = m_payment_method::create([
            'pay_name' => $request->input('pay_name'),

        ]);

        return redirect()->route(route: 'paymet.index');
    }

}
 