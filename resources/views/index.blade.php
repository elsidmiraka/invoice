@extends('components.master')
@section('content')
    @include('components.messages')
    <div class="container text-center">
        <a href="{{ route('invoice.create') }}" type="button" class="btn btn-success mt-4">+ Create New Invoice</a>
    </div>
@endsection
