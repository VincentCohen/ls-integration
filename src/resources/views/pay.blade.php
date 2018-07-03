
@extends('layout')

@section('title', 'Page Title')
@section('subtitle', 'So you want to pay huh?!')
@section('description', 'Give me teh moneyz')

@section('sidebar')
    @parent
@endsection

@section('content')

<h4 class="mb-3">You're about to lose your money brah</h4>
<hr class="mb-4">
<div class="row">
    <div class="col-sm">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Pay</button>
    </div>
    <div class="col-sm">
        <button class="btn btn-danger btn-lg btn-block" type="submit">Cancel</button>
    </div>
    <div class="col-sm">
        <button class="btn btn-warning btn-lg btn-block" type="submit">Fail</button>
    </div>
</div>
@endsection