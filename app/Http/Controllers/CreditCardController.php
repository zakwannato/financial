<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\credit_card;

class CreditCardController extends Controller
{
    public function index()
    {
        return view('settings.credit_card.credit_card');
    }

    public function create()
    {
        $users = User::all();
        $credit_cards = credit_card::all();

        return view('expenses.create',['users' => $users]);
        return redirect()->route(route: 'm_commitment.index');
    }
}
