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
          <option value="01" @php ($month == "01") ? 'selected' : ''; @endphp >January</option>
          <option value="02" @php ($month == "02") ? 'selected' : ''; @endphp >February</option>
          <option value="03" @php ($month == "03") ? 'selected' : ''; @endphp >March</option>
          <option value="04" @php ($month == "04") ? 'selected' : ''; @endphp >April</option>
          <option value="05" @php ($month == "05") ? 'selected' : ''; @endphp >May</option>
          <option value="06" @php ($month == "06") ? 'selected' : ''; @endphp >June</option>
          <option value="07" @php ($month == "07") ? 'selected' : ''; @endphp >July</option>
          <option value="08" @php ($month == "08") ? 'selected' : ''; @endphp >August</option>
          <option value="09" @php ($month == "09") ? 'selected' : ''; @endphp >September</option>
          <option value="10" @php ($month == "10") ? 'selected' : ''; @endphp >October</option>
          <option value="11" @php ($month == "11") ? 'selected' : ''; @endphp >November</option>
          <option value="12" @php ($month == "12") ? 'selected' : ''; @endphp >December</option>
      </select>
    </div>
  	<div class="col-sm-6">
      <select class="form-control" name="year" id="year">
        @for ($i = 2017; $i <= 2050; $i++)
          <option value="{{ $i }}" @php ($year == $i) ? 'selected' : ''; @endphp >{{ $i }}</option>
        @endfor
      </select>
    </div>
  </div>
</div>
