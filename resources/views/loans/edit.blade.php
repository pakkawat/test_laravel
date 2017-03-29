@extends('layout')

@section('content')
<div class="container">
  <h2>Edit Loan</h2>
  <form class="form-horizontal" method="POST" action="/loans/{{ loan->id }}">
    @include('loans.form')
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </form>
</div>
@stop
