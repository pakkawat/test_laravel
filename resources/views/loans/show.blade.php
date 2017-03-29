@extends('layout')

@section('content')

<h1>show</h1>
{{ $loan->id }}<br>
{{ $loan->loan_amount }}<br>
{{ $loan->loan_term }}<br>
{{ $loan->interest_rate }}<br>
<a class="btn btn-default" href="/loans" role="button">Back</a>
<hr>
<div class="container">
  <h2>Repayment Schedules</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Payment No</th>
        <th>Date</th>
        <th>Payment Amount</th>
        <th>Principal</th>
        <th>Interest</th>
        <th>Balance</th>
      </tr>
    </thead>
    <tbody>
      @foreach($loan->repayment_schedules() as $repayment_schedule)
        <tr>
          <td>{{ $repayment_schedule->payment_no }}</td>
          <td>{{ $repayment_schedule->date }}</td>
          <td>{{ $repayment_schedule->payment_amount }}</td>
          <td>{{ $repayment_schedule->principal }}</td>
          <td>{{ $repayment_schedule->interest }}</td>
          <td>{{ $repayment_schedule->balance }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop
