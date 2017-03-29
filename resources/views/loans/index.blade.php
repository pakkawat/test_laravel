@extends('layout')

@section('content')
<div class="container">
  <h2>All Loans</h2>
  <a class="btn btn-primary" href="/loans/create" role="button">Add New Loan</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Loan Amount</th>
        <th>Loan Term</th>
        <th>Interest Rate</th>
        <th>Created at</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
      @foreach($loans as $loan)
        <tr>
          <td>{{ $loan->id }}</td>
          <td>{{ $loan->loan_amount }}</td>
          <td>{{ $loan->loan_term }}</td>
          <td>{{ $loan->interest_rate }}</td>
          <td>{{ $loan->created_at }}</td>
          <td>
            <a href="/loans/{{ $loan->id }}" class="btn btn-info">View</a>
            <a href="/loans/{{ $loan->id }}/edit" class="btn btn-success">Edit</a>
            <a href="/loans/{{ $loan->id }}/delete" class="btn btn-danger">Delete</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop
