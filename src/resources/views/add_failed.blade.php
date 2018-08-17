
@extends('layout')

@section('title', 'Page Title')
@section('subtitle', 'Oops!')
@section('description', 'We have a problem..')


@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="row">
        <div class="col-sm"></div>
        <div class="col-sm">
            <p>Something went wrong adding the integration, perhaps it already exists?</p>

            <a href="add-integration" class="d-block mx-auto btn btn-sq-lg btn-secondary">
                <strong>Install</strong>
            </a>
        </div>
        <div class="col-sm"></div>
    </div>
@endsection