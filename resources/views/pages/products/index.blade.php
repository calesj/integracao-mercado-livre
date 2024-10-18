@extends('layouts.master')

@section('content')
    <div class="container-fluid mt-3">
        <div class="row g-4">
            @foreach($publisheds as $publish)
                <div class="col-md-4">
                    <div class="card card-primary card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">{{ @$publish['title'] }}</div>
                        </div>
                        <div class="card-body">
                            <img src="{{ @$publish['thumbnail'] }}" width="350px" alt="">
                            <ul>
                                <li>
                                    <strong>ID:</strong>
                                </li>
                                <li>
                                    <strong>Preço:</strong> {{ @$publish['price'] }}
                                </li>
                                <li>
                                    <a href="{{ @$publish['permalink'] }}" target="_blank">Ver Mais</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
