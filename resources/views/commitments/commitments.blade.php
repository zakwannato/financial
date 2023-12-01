@extends('layouts.master')

@section('content')

<div class="card card-custom gutter-b">
    <!--begin::Body-->
    <div class="card-body d-flex align-items-center justify-content-between flex-wrap py-3">
        <!--begin::Info-->
        <div class="d-flex align-items-center mr-2 py-2">
            <!--begin::Title-->
            <h3 class="font-weight-bold mb-0 mr-10">Commitments</h3>
            <!--end::Title-->
        </div>
        <!--end::Info-->
    </div>
    <!--end::Body-->
</div>


@foreach($commitments as $commitment )
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
                        <a href="#" class="card-title text-hover-primary font-weight-bolder font-size-h5 text-dark mb-1">{{ $commitment->com_name }}</a>
                        <span class="text-muted font-weight-bold">{{ $commitment->com_YM}}</span>
                        <!--end::Title-->
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Section-->
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer d-flex align-items-center">
                <a href="{{ route('commitments.edit', $commitment->id) }}" class="btn btn-primary mr-2"><i class="flaticon-edit"></i>Edit</a>
                {{-- <form action="{{ route('commitments.destroy', $commitment->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger" type="submit"><i class="flaticon-delete"></i>Delete</button>
                </form> --}}
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Card-->
    </div>
</div>
@endforeach

<div class="card card-custom gutter-b">
    <!--begin::Body-->
    <div class="card-body d-flex align-items-center justify-content-between flex-wrap py-3">
        <!--begin::Info-->
        <div class="d-flex align-items-center mr-2 py-2">
            <!--begin::Title-->
            <h3 class="font-weight-bold mb-0 mr-10">Paid Commitments</h3>
            <!--end::Title-->
        </div>
        <!--end::Info-->
    </div>
    <!--end::Body-->
</div>

@foreach($paids as $paid )
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
                        <a href="#" class="card-title text-hover-primary font-weight-bolder font-size-h5 text-dark mb-1">{{ $paid->com_name }}</a>
                        <span class="text-muted font-weight-bold">{{ $paid->com_YM}}</span>
                        <!--end::Title-->
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Section-->

                 <!--begin::Text-->
                 <p class="mb-7 mt-3">{{ $paid->com_remarks }}</p>
                 <!--end::Text-->

                <!--begin::Content-->
                <div class="d-flex flex-wrap mt-14">

                    <div class="mr-12 d-flex flex-column mb-7">
                        <span class="d-block font-weight-bold mb-4">Paid by</span>
                        <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{ $paid->name }}</span>
                    </div>

                    <div class="mr-12 d-flex flex-column mb-7">
                        <span class="d-block font-weight-bold mb-4">Date</span>
                        <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{ $paid->com_pay_date }}</span>
                    </div>

                    <div class="mr-12 d-flex flex-column mb-7">
                        <span class="font-weight-bolder mb-4">Amount</span>
                        <span class="font-weight-bolder font-size-h5 pt-1">
                        <span class="font-weight-bold text-dark-50">RM </span>{{ $paid->com_amount }}</span>
                    </div>
                   
                    <div class="mr-12 d-flex flex-column mb-7">
                        <span class="d-block font-weight-bold mb-4">Payment method</span>
                        <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{ $paid->pay_name }}</span>
                    </div>

                </div>
                <!--end::Content-->
               
            </div>
            <!--end::Body-->
        </div>
        <!--end::Card-->
    </div>
</div>
@endforeach

@endsection