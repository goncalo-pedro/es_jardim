@extends('admin.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Memorias</h3>
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
                        <th>Nome</th>
                        <th>Faixa Etária</th>
                        <td>Estatuto</td>
                        <th>Classificação</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection
