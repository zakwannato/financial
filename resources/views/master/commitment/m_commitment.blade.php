@extends('layouts.master')

@section('content')

<div class="card card-custom gutter-b">
    <!--begin::Body-->
    <div class="card-body d-flex align-items-center justify-content-between flex-wrap py-3">
        <!--begin::Info-->
        <div class="d-flex align-items-center mr-2 py-2">
            <!--begin::Title-->
            <h3 class="font-weight-bold mb-0 mr-10">Master Commitment</h3>
            <!--end::Title-->
        </div>
        <!--end::Info-->
        <!--begin::Users-->
        <div class="symbol-group symbol-hover py-2">
            <!--begin::Button-->
            <a href="{{ route('m_commitment.create') }}" class="btn btn-primary font-weight-bolder">
                </span>New Record
            </a>
            <!--end::Button-->
        </div>
        <!--end::Users-->
    </div>
    <!--end::Body-->
</div>

@foreach($m_commitments as $m_commitment )
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
                        <a href="#" class="card-title text-hover-primary font-weight-bolder font-size-h5 text-dark mb-1">{{ $m_commitment->com_name }}</a>
                        <span class="text-muted font-weight-bold">{{ $m_commitment->active_flag == 1 ? 'Active' : 'Non Active' }}</span>
                        <!--end::Title-->
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Section-->

                 <!--begin::Text-->
                 <p class="mb-7 mt-3">{{ $m_commitment->com_name }}</p>
                 <!--end::Text-->
               
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer d-flex align-items-center">
                <a href="{{ route('m_commitment.edit', $m_commitment->id) }}" class="btn btn-primary mr-2"><i class="flaticon-edit"></i>Edit</a>
                <form action="{{ route('m_commitment.destroy', $m_commitment->id) }}" method="POST">
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