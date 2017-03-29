@extends('layout')

@section('content')

<h1>show</h1>
{{ $loan->id }}<br>
{{ $loan->loan_amount }}<br>
{{ $loan->loan_term }}<br>
{{ $loan->interest_rate }}<br>
<a class="btn btn-default" href="/loans" role="button">Back</a>
@stop
