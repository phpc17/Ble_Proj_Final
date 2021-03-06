@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->

<head>
    <meta http-equiv="refresh" content="20">
</head>
<h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1>

@if (session('status'))
<div class="alert alert-success border-left-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div>
    <legend><strong>Divisões</strong></legend>
</div>

<div class="row">

    @foreach($divisoes as $divisao)
    <div class="col-xl-3 col-md-6 mb-4">
        @if ($divisao->valor == 1)
        <div class="card border-left-success shadow h-100 py-2">
            @else
            <div class="card border-left-danger shadow h-100 py-2">
                @endif
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-sucess text-uppercase mb-1">
                                @if ($divisao->valor == 1)
                                Luz {{ $divisao->nome }} Ligada
                                @else
                                Luz {{ $divisao->nome }} Desligada
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div>
        <form method="GET" action="{{route('home')}}">
            <div class="form-group col-md-4">
                <label for="data">Data</label>
                <input type="date" class="form-control" name="data" id="data" />
                @if ($errors->has('data'))
                <em>{{ $errors->first('data') }}</em>
                @endif
            </div>
            <button class="btn btn-success" type="submit">Pesquisar</button>
            <a class="btn btn-primary" href="{{route('home')}}">Limpar</a>
        </form>
    </div>
    <div><strong>Tracking</strong> List</div>
    @if (count($equipamentos))
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
            @if($e->rssi>-70)
            <td>{{$divisao->nome}}</td>
            @elseif($divisao->id == 1)
            <td>Fora do quarto</td>
            @elseif($divisao->id == 2)
            <td>Fora da garagem</td>
            @endif
            @endif
            @endforeach


        </tr>
        @endforeach

    </table>
    @else
    <h2>Não foram encontrados registos</h2>
    @endif
</div>
<div class="pagination justify-content-center">{{$equipamentos->withQueryString()->links()}}</div>
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