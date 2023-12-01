@extends('layouts.master')

@section('content')

<div class="card card-custom gutter-b">
    <!--begin::Body-->
    <div class="card-body d-flex align-items-center justify-content-between flex-wrap py-3">
        <!--begin::Info-->
        <div class="d-flex align-items-center mr-2 py-2">
            <!--begin::Title-->
            <h3 class="font-weight-bold mb-0 mr-10">Expenses</h3>
            <!--end::Title-->
        </div>
        <!--end::Info-->
        <!--begin::Users-->
        <div class="symbol-group symbol-hover py-2">
            <!--begin::Button-->
            <a href="{{ route('expenses.create') }}" class="btn btn-primary font-weight-bolder">
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
                </span>New Record</a>
                <!--end::Button-->
        </div>
        <!--end::Users-->
    </div>
    <!--end::Body-->
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

@endsection