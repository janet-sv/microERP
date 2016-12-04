@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <ul>
                <a href="{{ route('logistic.home') }}"><li>Logistica</li></a>
                <a href=""><li>Contabilidad</li></a>
                <a href=""><li>Ventas</li></a>
            </ul>
        </div>
    </div>
</div>
@endsection
