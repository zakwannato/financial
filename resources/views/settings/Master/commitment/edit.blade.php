@extends('layouts.master')

@section('content')

<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Master Commitment
            <span class="d-block text-muted pt-2 font-size-sm">Datatable initialized from Master Commitment table</span></h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Button-->
            <a href="{{ route('m_commitment.index') }}" class="btn btn-primary font-weight-bolder float-right">
                Back</a>
            <!--end::Button-->
        </div>
    </div>

    <div class="card-body">
        <!--begin: Input-->
        <form action="{{ route('m_commitment.update', $m_commitment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">

                <div class="form-group">
                    <label>Commitment name :</label>
                    <input class="form-control" name="com_name" value="{{ $m_commitment->com_name }}"/>
                </div>

                <div class="form-group">
                    <div class="row">
                    <label class="col-2 col-form-label">Active Flag :</label>
                    <div class="col-1">
                        <span class="switch switch-outline switch-icon switch-success">
                            <label>
                                <input type="checkbox" {{ $m_commitment->active_flag == 1 ? 'checked' : '' }} name="active_flag" value="{{ $m_commitment->active_flag }}" />
                                <span></span>
                            </label>
                        </span>
                    </div>
                    </div>
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

