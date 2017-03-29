@if (count($errors))
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

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
        <option <?php if ($month == "01") echo 'selected' ; ?> value="01">January</option>
        <option <?php if ($month == "02") echo 'selected' ; ?> value="02">February</option>
        <option <?php if ($month == "03") echo 'selected' ; ?> value="03">March</option>
        <option <?php if ($month == "04") echo 'selected' ; ?> value="04">April</option>
        <option <?php if ($month == "05") echo 'selected' ; ?> value="05">May</option>
        <option <?php if ($month == "06") echo 'selected' ; ?> value="06">June</option>
        <option <?php if ($month == "07") echo 'selected' ; ?> value="07">July</option>
        <option <?php if ($month == "08") echo 'selected' ; ?> value="08">August</option>
        <option <?php if ($month == "09") echo 'selected' ; ?> value="09">September</option>
        <option <?php if ($month == "10") echo 'selected' ; ?> value="10">October</option>
        <option <?php if ($month == "11") echo 'selected' ; ?> value="11">November</option>
        <option <?php if ($month == "12") echo 'selected' ; ?> value="12">December</option>
      </select>
    </div>
  	<div class="col-sm-6">
      <select class="form-control" name="year" id="year">
        @for ($i = 2017; $i <= 2050; $i++)
          <option <?php if ($year == $i) echo 'selected' ; ?> value="{{ $i }}">{{ $i }}</option>
        @endfor
      </select>
    </div>
  </div>
</div>
