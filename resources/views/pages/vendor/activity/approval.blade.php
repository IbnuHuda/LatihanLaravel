<style>
    div.card div.card-body hr {
        width: 5%;
        border: 1px solid #000;
        margin-top: 0px;
    }
</style>

@extends('layouts.dashboard')

@section('content')
<div class="row">    
    <div class="flash-message col-lg-12">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg) 
            @if (Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }} w-100">{{ Session::get('alert-' . $msg) }} <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Approval Activity</h4>
                <hr class="float-left" />

                <div style="clear: both;"></div>
                
                
            </div>
        </div>
    </div>
</div>
@endsection