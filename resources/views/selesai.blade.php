@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="d-flex justify-content-center">
                    <a href="https://ctrl.uinsby.ac.id/index/portal" class="btn btn-success">
                        Kembali ke My-UINSA
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
