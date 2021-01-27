@extends('master')

@section('content')
    <p>
        {{$memoria->nome_visitante}}
    </p>
    <p>
        {{$memoria->estatuto}}
    </p>
    <p>
        {{$memoria->faixa_etaria}}
    </p>
    <p>
        <img src="{{ asset($memoria->foto1_planta) }}" alt="ola">
    </p>

    <p>
        <img src="{{ asset($memoria->foto2_planta) }}" alt="ola">
    </p>
@endsection
