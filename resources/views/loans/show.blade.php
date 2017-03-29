@extends('layout')

@section('content')
<div class="container">
<h1>Loan Details</h1>
  <table border="0">
    <tr>
      <th></th><th></th><th></th><th></th>
      <th></th>
    </tr>
    <tr>
      <td width="200px;">ID</td>
      <td></td><td></td><td></td>
      <td>{{ $loan->id }}</td>
    </tr>
    <tr>
      <td>Loan Amount</td>
      <td></td><td></td><td></td>
      <td>{{ $loan->loan_amount }}</td>
    </tr>
    <tr>
      <td>Loan Term</td>
      <td></td><td></td><td></td>
      <td>{{ $loan->loan_term }}</td>
    </tr>
    <tr>
      <td>Interest Rate</td>
      <td></td><td></td><td></td>
      <td>{{ $loan->interest_rate }}</td>
    </tr>
    <tr>
      <td>Created at</td>
      <td></td><td></td><td></td>
      <td>{{ $loan->date }}</td>
    </tr>
  </table>
  <br>
  <a class="btn btn-default" href="/loans" role="button">Back</a>
  <br>
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
      @foreach($loan->repayment_schedules as $repayment_schedule)
        <tr>
          <td>{{ $repayment_schedule->payment_no }}</td>
          <td>{{ date('M Y', strtotime($repayment_schedule->date)) }}</td>
          <td>{{ round($repayment_schedule->payment_amount, 2) }}</td>
          <td>{{ round($repayment_schedule->principal, 2) }}</td>
          <td>{{ round($repayment_schedule->interest, 2) }}</td>
          <td>{{ round($repayment_schedule->balance, 2) }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop
