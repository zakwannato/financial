<div>

    <div class="form-group">
        <label>User :</label>
        <select wire:model.change ="selectedUser" class="form-control" name="user_id" required>
            <option value="" selected>Please select user</option>
            @foreach($users as $user )
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Expenses type :</label>
        <select class="form-control" name="exp_type">
            <option value="1" selected>SHARED</option>
            <option value="2">PERSONEL</option>
        </select>
    </div>

    <div class="form-group">
        <label>Payment method :</label>
        <select wire:model.change ="selectedPaymentMethod" class="form-control" name="pay_id" required>
            <option value="" selected>Please select payment method</option>
            @foreach($m_payment_methods as $m_payment_method )
                <option value="{{ $m_payment_method->id }}">{{ $m_payment_method->pay_name }}</option>
            @endforeach
        </select>
    </div>

    @if ($selectedPaymentMethod==2) 
    <div class="form-group">
        <label>Payment credit card :</label>
        <select wire:model="selectedPaymentCreditCard" class="form-control" name="CC_id" required>
            <option value="" selected>Please select credit card</option>
            @foreach($credit_cards as $credit_card )
                <option value="{{ $credit_card->id }}">{{ $credit_card->CC_name }}</option>
            @endforeach
        </select>
    </div>
    @else
        <input type="text" name="CC_id" value="" hidden>
    @endif

    

</div>
