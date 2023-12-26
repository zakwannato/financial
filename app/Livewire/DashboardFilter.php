<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Expense;

class DashboardFilter extends Component
{
    public $totalRecords;

    public $totalShared;
    public $totalAdvance;

    public $yearMonth = null;

    public function mount()
    {
        $this->totalRecords = Expense::where('pay_id', '1')->where('exp_YM', date('Y-m'))->sum('exp_amount');
        $this->yearMonth = date('Y-m');
    }

    public function render()
    {
        return view('livewire.dashboard-filter');
    }

    // public function emitSelectedYearMonth($value)
    // {
    //     // $this->emit('yearMonthSelected', $this->totalRecords = 201);
    //     // $this->totalRecords = 500;

    //     $this->totalRecords = Expense::where('pay_id', '1')
    //     ->where('exp_YM', 'emitSelectedYearMonth')
    //     ->sum('exp_amount');
    // }

    public function updatedYearMonth()
    {
        // dd($this->yearMonth);
        $this->totalRecords = Expense::where('pay_id', '1')->where('exp_YM', $this->yearMonth)->sum('exp_amount');
        // $this->emit('selectedYearMonth', $this->selectedYearMonth);
    }

}
