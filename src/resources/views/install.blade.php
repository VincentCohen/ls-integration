
@extends('layout')

@section('title', 'Page Title')
@section('subtitle', 'Install our Coin integration to your shop!')
@section('description', 'Install and gain money. Money means power')


@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="row">
        <div class="col-sm"></div>
        <div class="col-sm">
            <a href="add-integration" class="d-block mx-auto btn btn-sq-lg btn-secondary">

                <strong>Install</strong>
            </a>
        </div>
        <div class="col-sm"></div>
    </div>
@endsection