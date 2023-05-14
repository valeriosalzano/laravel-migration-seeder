@extends('layouts.app')

{{-- head --}}
@section('page-title', 'laravel-migration-seeder')

{{-- header --}}
@section('page-subtitle', 'Trains')

{{-- main --}}
@section('content')
    <main class="py-5">

        <div class="container">
            <table class="table table-light table-striped">
                <thead class="fs-5 fw-semibold">
                    <tr>
                        <th scope="col">Treno</th>
                        <th scope="col">Azienda</th>
                        <th scope="col">Carrozze</th>
                        <th scope="col">Stazione Partenza</th>
                        <th scope="col">Orario Partenza</th>
                        <th scope="col">Stazione Arrivo</th>
                        <th scope="col">Orario Arrivo</th>
                        <th scope="col">Stato</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trains as $train)
                        <tr>
                            <th scope="row">{{$train->code}}</th>
                            <td>{{$train->company}}</td>
                            <td>{{$train->wagons_number}}</td>
                            <td>{{$train->departure_station}}</td>
                            <td>{{ substr($train->departure_date, -8, 5)}}</td>
                            <td>{{$train->arrival_station}}</td>
                            <td>{{substr($train->arrival_date, -8, 5)}}</td>
                            <td>
                                @if ($train->on_time)
                                    @if ( $train->arrival_date < strlen(date(now())))
                                        <span class="badge text-bg-success">Arrivato</span>
                                    @else
                                        <span class="badge text-bg-success">In orario</span>
                                    @endif
                                @elseif ($train->cancelled)
                                    <span class="badge text-bg-danger">Cancellato</span>
                                @else
                                    <span class="badge text-bg-warning">In ritardo</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </main>
@endsection
