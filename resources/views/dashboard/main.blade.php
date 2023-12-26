@extends('layouts.master')

@section('content')

    @livewire('dashboard-filter',['wire:emit' => 'selectedYearMonth'])


@endsection