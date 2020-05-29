@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->

<head>
    <meta http-equiv="refresh" content="20">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1>

@if (session('status'))
<div class="alert alert-success border-left-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div><legend><strong>Divisões</strong></legend></div>

<div class="row">

    @foreach($divisoes as $divisao)
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-sucess text-uppercase mb-1">{{ $divisao->nome}}</div>
                        <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">ºC</div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
<div><strong>Equipamentos</strong> List</div>
<table id="reads-table" class="table table-responsive-lg" style="width:100%;">
    <thead>
        <tr>
            <th>Nome</th>
            <th>MAC Address</th>
            <th>RSSI</th>
            <th>Distância</th>
            <th>Data e Hora</th>
            <th>Bulb</th>
            <th>Divisao</th>
        </tr>
    </thead>
    @foreach($equipamentos as $e)
    <tr>
        <td>{{ $e->nome }}</td>
        <td>{{ $e->mac_address }}</td>
        <td>{{ $e->rssi }}</td>
        <td>{{ $e->distancia }}</td>
        <td>{{ $e->time_stamp }}</td>
        @if($e->luz == 1)
        <td>Ligou</td>
        @else
        <td>Não Ligou</td>
        @endif
        @foreach($divisoes as $divisao)
        @if($e->id_divisao == $divisao->id)
        <td>{{$divisao->nome}}</td>
        @endif
        @endforeach
    </tr>
    @endforeach
</table>
@endsection

<style type="text/css">
    .td {
        text-align: right
    }

    .box-success {
        background-color: #1cc88a;
        color: #fff;
        margin-top: 5px;
        margin-bottom: 5px;
        border-radius: 50px;
        text-align: center;
        float: left;
        padding-right: 9px;
    }

    .box-warning {
        background-color: #f6c23e;
        color: #fff;
        margin-top: 5px;
        margin-bottom: 5px;
        border-radius: 50px;
        text-align: center;
        float: left;
        padding-right: 9px;
    }

    .box-danger {
        background-color: #e74a3b;
        color: #fff;
        margin-top: 5px;
        margin-bottom: 5px;
        border-radius: 50px;
        text-align: center;
        float: left;
        padding-right: 9px;
    }
</style>