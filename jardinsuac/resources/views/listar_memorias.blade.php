@extends('master')

@section('content')
    <div >
        <div >
            <h1 class="text-primary text-center">Testemunhos feitos por clientes</h1>
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
        <a class="btn btn-primary" href="{{route("testemunhos.create")}}" role="button" style="margin-left: 40%">Partilhar Testemunho</a>

        <div class="row">
            @foreach($memorias as $memoria)
                <div class="col-md-3 offset-md-1">
                    <a href="{{route('testemunhos.show', $memoria->id)}}" style="text-decoration: none; font-weight: bold;">Testemunho {{$memoria->id}}</a>
                    <div >
                        {{$memoria->nome_visitante}}
                    </div>
                    <div >
                        Avaliação: {{$memoria->classificacao}}/5<img style="width: 3%" src="{{asset('images/star.png')}}"/>
                    </div>
                        {{$memoria->created_at}}
                </div>
            @endforeach
            </table>
        </div>

    </div>


@endsection
