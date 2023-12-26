<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\user;
use App\Models\m_payment_method;
use App\Models\credit_card;

class SelectCreditCard extends Component
{   
    public $users;
    public $m_payment_methods;
    public $credit_cards;

    public $selectedUser = null;
    public $selectedPaymentMethod = null;
    public $selectedCreditCard = null;

    public function mount($selectedPaymentMethod = null)
    {
        $this->users = user::all();
        $this->m_payment_methods = collect();
        $this->credit_cards = collect();
    }
    public function render()
    {
        return view('livewire.select-credit-card');
    }

    public function updatedSelectedUser($user)
    {
        $this->m_payment_methods = m_payment_method::all();
    }

    public function updatedSelectedPaymentMethod()
    {
        $this->credit_cards = credit_card::where('user_id', '1')->get();  
    }

}
