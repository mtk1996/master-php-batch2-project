@extends('layout.master')

@section('content')
{{-- Course Container --}}
<div class="container">

    <div class="row mt-1">

        <div class="col-md-12">
            <div class="card p-5  text-center">

                <div class="card-body">
                    <h4>Enroll History</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Plan</th>
                                <th>Remain Learn Date</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enroll as $e)
                            <tr>
                                <td>
                                    {{$e->pricing->title}}
                                </td>
                                <td>
                                    {{Illuminate\Support\Carbon::parse(date('Y-m-d'))->diffInDays($e->expire_date)}}
                                </td>
                                <td>
                                    {{$e->start_date}}
                                </td>
                                <td>
                                    {{$e->end_date}}
                                </td>
                                <td>
                                    @if($e->type==='pending')
                                    <span class="badge badge-primary">
                                        {{$e->type}}
                                    </span>

                                    @elseif ($e->type==='active')
                                    <span class="badge badge-success">
                                        {{$e->type}}
                                    </span>

                                    @else
                                    <span class="badge badge-danger">
                                        {{$e->type}}
                                    </span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection
