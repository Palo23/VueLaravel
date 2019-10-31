@extends('layouts.app')

@section('content')


                @if ( session('mensaje') )
                    <div class="alert alert-success">{{ session('mensaje') }}</div>
                @endif

    <div class="container">
        <tabla-componente></tabla-componente>
    </div>
    
@endsection