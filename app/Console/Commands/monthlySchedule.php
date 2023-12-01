<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\commitment;
use App\Models\m_commitment;
use App\Models\m_payment_method;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class monthlySchedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:monthly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run schedule every month';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $m_commitments = m_commitment::all();

        foreach($m_commitments as $m_commitment ){
                 $commitments = commitment::create([
                'com_t_id' => $m_commitment->id,
                'com_YM' => Carbon::now()->format('Y-m'),
                'pay_flag' => '0',
                // 'com_amount' => '0',
                // 'com_pay_date' => Carbon::now()->format('Y-m-d'),
             
                // 'user_id_pay' => '1',
                // 'com_remarks' => 'TEST'

            ]);
        }

        // foreach($m_commitments as $m_commitment ){
        //     $commitments = commitment::create([
        //         'com_t_id' => $m_commitment->id,
        //         'com_YM' => Carbon::now()->format('Y-m'),
        //         'pay_flag' => '0'

        //     ]);
        // }

        // $m_payment_methods = m_payment_method::create([
        //     'pay_name' => $m_commitment->com_name,

        // ]);

    }
}
