@extends('layout')

@section('content')
<div class="container">
  <h2>Edit Loan</h2>
  <form class="form-horizontal" method="POST" action="/loans/{{ $loan->id }}">
    {!! method_field('PUT') !!}
    @include('loans.form')
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn-default" href="/loans" role="button">Back</a>
      </div>
    </div>
  </form>
</div>
@stop
