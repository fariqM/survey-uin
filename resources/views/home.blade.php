@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('submit') }}" method="post">
                    @csrf
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($survey)
                        @include('survey::standard', ['survey' => $survey])
                    @else
                        <div class="alert alert-warning text-center" role="alert">
                            <b>NO SURVEY !</b>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
