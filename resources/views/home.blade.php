@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('submit') }}" method="post">
                    @csrf
                    @if (session('success'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @include('survey::standard', ['survey' => $survey])
                </form>
            </div>
        </div>
    </div>
@endsection
