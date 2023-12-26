<div>

<div class="card card-custom gutter-b" >
    <div class="card-body form-group row">

  

            <div class="col-lg-3">
                <label>User Id:</label>
                <select class="form-control" name="billing_card_exp_month" wire:model="selectedUser">
                        <option value="all" selected>All</option>
                    @foreach($users as $user )
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-lg-3">
                <label>Expenses type :</label>
                <select class="form-control" name="exp_type" wire:model="selectedType">
                    <option value="all" selected>ALL</option>
                    <option value="1">SHARED</option>
                    <option value="2">PERSONEL</option>
                </select>
            </div>

            <div class="col-lg-3" >
                <label>Payment method :</label>
                <select class="form-control" name="billing_card_exp_year" wire:model="selectedMethod">
                    <option value="all" selected>All</option>
                    @foreach($m_payment_methods as $m_payment_method )
                    <option value="{{ $m_payment_method->id }}">{{ $m_payment_method->pay_name }}</option>
                @endforeach
                </select>
            </div>

            <div class="col-lg-3" >
                <label>Month Year :</label>
				<input class="form-control" type="month" wire:model="selectedMonth" />							
            </div>
    </div>

    <div class="card-body form-group row">
        <div class="col-lg-3">
            <label></label>
            <button type="submit" class="btn btn-primary font-weight-bold mr-2" wire:click="filterExpenses">Filter</button>
        </div>
    </div>

</div>  


@foreach($expenses as $expense )
<div class="row">
    <div class="col-xl-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b card-stretch">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Section-->
                <div class="d-flex align-items-center">
                    <!--begin::Pic-->
                    <div class="flex-shrink-0 mr-4 symbol symbol-65 symbol-circle">
                        <img src="assets/media/project-logos/3.png" alt="image" />
                    </div>
                    <!--end::Pic-->
                    <!--begin::Info-->
                    <div class="d-flex flex-column mr-auto">
                        <!--begin: Title-->
                        <a href="#" class="card-title text-hover-primary font-weight-bolder font-size-h5 text-dark mb-1">{{ $expense->exp_description }}</a>
                        <span class="text-muted font-weight-bold">{{ $expense->name}}</span>
                        <!--end::Title-->
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Section-->

                 <!--begin::Text-->
                 <p class="mb-7 mt-3">{{ $expense->exp_remarks }}</p>
                 <!--end::Text-->

                <!--begin::Content-->
                <div class="d-flex flex-wrap mt-14">

                    <div class="mr-12 d-flex flex-column mb-7">
                        <span class="d-block font-weight-bold mb-4">Date</span>
                        <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{ $expense->exp_date }}</span>
                    </div>

                    <div class="mr-12 d-flex flex-column mb-7">
                        <span class="font-weight-bolder mb-4">Amount</span>
                        <span class="font-weight-bolder font-size-h5 pt-1">
                        <span class="font-weight-bold text-dark-50">RM </span>{{ $expense->exp_amount }}</span>
                    </div>
                   
                    <div class="mr-12 d-flex flex-column mb-7">
                        <span class="d-block font-weight-bold mb-4">Payment method</span>
                        <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{ $expense->pay_name }}</span>
                    </div>

                </div>
                <!--end::Content-->
               
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer d-flex align-items-center">
                <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-primary mr-2"><i class="flaticon-edit"></i>Edit</a>
                <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger" type="submit"><i class="flaticon-delete"></i>Delete</button>
                </form>
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Card-->
    </div>
</div>
@endforeach

</div>