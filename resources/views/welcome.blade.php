@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-4">
            <div class="card-body">
                <div class="card-header text-center">{{ __('Application Form') }}</div>
                <div id="app">
                
                <tab-component></tab-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
