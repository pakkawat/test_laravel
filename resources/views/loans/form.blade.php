{!! csrf_field() !!}
<div class="form-group">
  <label class="control-label col-sm-2">Loan Amount:</label>
  <div class="col-sm-5">
    <div class="input-group">
      <input type="text" class="form-control" name="loan_amount" id="loan_amount" value="{{ $loan->loan_amount }}">
      <div class="input-group-addon">฿</div>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2">Loan Term:</label>
  <div class="col-sm-5">
    <div class="input-group">
      <input type="text" class="form-control" name="loan_term" id="loan_term" value="{{ $loan->loan_term }}">
      <div class="input-group-addon">Years</div>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2">Interest Rate:</label>
  <div class="col-sm-5">
    <div class="input-group">
      <input type="text" class="form-control" name="interest_rate" id="interest_rate" value="{{ $loan->interest_rate }}">
      <div class="input-group-addon">%</div>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2">Start Date:</label>
  <div class="col-sm-5">
  	<div class="col-sm-6">
      <select class="form-control" name="month" id="month">
          <option value="01">January</option>
          <option value="02">February</option>
          <option value="03">March</option>
          <option value="04">April</option>
          <option value="05">May</option>
          <option value="06">June</option>
          <option value="07">July</option>
          <option value="08">August</option>
          <option value="09">September</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option>
      </select>
    </div>
  	<div class="col-sm-6">
      <select class="form-control" name="year" id="year">
        @for ($i = 2017; $i <= 2050; $i++)
          <option value="{{ $i }}">{{ $i }}</option>
        @endfor
      </select>
    </div>
  </div>
</div>
