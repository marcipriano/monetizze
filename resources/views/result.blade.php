@extends('layout.master')

@section('content')
    <div class="bg-light mt-3 p-5">
        @include('includes.drawForm')
    </div>

    <div class="mt-4">
        <h3>
            Resultado do Sorteio
        </h3>

        {!! $games->showTables() !!}
    </div>
@endsection
