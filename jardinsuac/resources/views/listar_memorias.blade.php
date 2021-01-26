@extends('master')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Vários testemunhos</h3>
        </div>
        <div id="errors">
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li style="color: red">
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table-import">
                    <tr>
                        <th>Numero</th>
                        <th>Nome</th>
                        <th>Faixa Etária</th>
                        <td>Estatuto</td>
                        <th>Classificação</th>
                    </tr>
                    @foreach($memorias as $memoria)
                        <tr>
                            <td><a href="{{route('memorias.show', $memoria->id)}}">Testemunho {{$memoria->id}}</a></td>
                            <td>{{$memoria->nome_visitante}}</td>
                            <td>{{$memoria->faixa_etaria}}</td>
                            <td>{{$memoria->estatuto}}</td>
                            <td>{{$memoria->classificacao}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <a href="{{route("criar.memoria")}}">Partilhar Testemunho</a>
@endsection
