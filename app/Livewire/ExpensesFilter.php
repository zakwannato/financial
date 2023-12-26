<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\expense;
use App\Models\m_payment_method;
use Illuminate\Support\Facades\DB;

class ExpensesFilter extends Component
{
    public $selectedUser;
    public $selectedType;
    public $selectedMethod;
    public $selectedMonth;

    public $users;
    public $m_payment_methods;
    public $expenses;

    public function mount()
    {
        $this->users = User::all();
        $this->m_payment_methods = m_payment_method::all();

        $this->expenses = DB::table('expenses')
        ->join('users','expenses.user_id', '=', 'users.id')
        ->join('m_payment_methods', 'expenses.pay_id', '=', 'm_payment_methods.id')
        ->select('expenses.*', 'users.name', 'm_payment_methods.pay_name')
        ->get();

        $this->selectedMonth = date('Y-m');

    }

    public function filterExpenses()
    {
        // $query = $this->expenses;

        // if ($this->selectedUser && $this->selectedUser !== 'all') {
        //     $query->where('user_id', $this->selectedUser);
        // }

        // if ($this->selectedMethod && $this->selectedMethod !== 'all') {
        //     $query->where('pay_id', $this->selectedMethod);
        // }

        $this->expenses = DB::table('expenses')
        ->join('users','expenses.user_id', '=', 'users.id')
        ->join('m_payment_methods', 'expenses.pay_id', '=', 'm_payment_methods.id')
        ->select('expenses.*', 'users.name', 'm_payment_methods.pay_name')
        ->when($this->selectedUser && $this->selectedUser !== 'all', function ($query) { $query->where('user_id', $this->selectedUser); } )
        ->when($this->selectedMethod && $this->selectedMethod !== 'all', function ($query) { $query->where('pay_id', $this->selectedMethod); } )
        ->when($this->selectedType && $this->selectedType !== 'all', function ($query) { $query->where('exp_type', $this->selectedType); } )
        ->where('exp_YM', $this->selectedMonth)
        ->get();


        // dd($this->selectedMonth);


        // $this->expenses = $query->get();
    }

    public function render()
    {
        return view('livewire.expenses-filter');
    }
}
