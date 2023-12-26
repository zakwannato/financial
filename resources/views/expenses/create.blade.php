@extends('layouts.master')

@section('content')

<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Input Expenses
            <span class="d-block text-muted pt-2 font-size-sm">Datatable initialized from budgets table</span></h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Button-->
            <a href="{{ route('expenses.index') }}" class="btn btn-primary font-weight-bolder float-right">
            <span class="svg-icon svg-icon-md">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <circle fill="#000000" cx="9" cy="15" r="6" />
                        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>Back</a>
            <!--end::Button-->
        </div>
    </div>

    <div class="card-body">
        <!--begin: Input-->
        <form action="{{ route('expenses.store') }}" method="POST">
            @csrf

            <div class="card-body">

                <div class="form-group">
                    <label>Description :</label>
                    <input class="form-control" name="exp_description" />
                </div>

                <div class="form-group">
                    <label>Date :</label>
                    <input class="form-control" type="date" name="exp_date" />
                </div>

                <div class="form-group">
                    <label>Amount :</label>
                    <input class="form-control" type="number" step=".01" name="exp_amount" />
                </div>

                @livewire('select-credit-card')

                <div class="form-group">
                    <label>Remarks :</label>
                    <textarea class="form-control" name="exp_remarks" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label>Zakwan :</label>
                    <input class="form-control" value="50" name="exp_zakwan" />
                </div>

                <div class="form-group">
                    <label>Rashidah :</label>
                    <input class="form-control" value="50" name="exp_rashidah" />
                </div>

            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-10">
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
            </div>
        </form>
        <!--end: Input-->
    </div>
</div>
<!--end::Card-->

@endsection

