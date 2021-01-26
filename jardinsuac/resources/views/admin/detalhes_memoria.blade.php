@extends('admin.master')

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
@endsection
