<?php

namespace App\Http\Controllers;
use App\Loan;
use App\Repayment_schedule;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::all();
        return view('loans.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loan = new Loan;
        $month = "01";
        $year = "2017";
        return view('loans.create', compact('loan', 'month', 'year'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'loan_amount' => 'required|integer|min:1000|max:100000000',
          'loan_term' => 'required|integer|min:1|max:50',
          'interest_rate' => 'required|between:1.00,36.00',
        ]);
        $loan = Loan::create($request->all());
        $this->generate_repayment_schedule($request->year.'-'.$request->month, $loan);
        //$request->month
        //$request->year
        //$loan->repayment_schedules()->save(#repayment_schedule)
        //alert()->success('Loan has been added.');
        //return $request->all();
        return view('loans.show', compact('loan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        return view('loans.show', compact('loan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        $date = $loan->repayment_schedules->first()->date;
        $month = date('m', strtotime($date));
        $year = date('Y', strtotime($date));
        return view('loans.edit', compact('loan', 'month', 'year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loan $loan)
    {
        $loan->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();
        return back();
    }

    public function generate_repayment_schedule($date, Loan $loan)
    {
        $date = strtotime($date);
        for($i = 1; $i <= $loan->loan_term*12; $i++)
        {
            $repayment_schedule = new Repayment_schedule;
            $repayment_schedule->payment_no = $i;
            $repayment_schedule->date = date('Y-m-d H:i:s', $date);
            $repayment_schedule->payment_amount = $this->getPMT($loan);
            $repayment_schedule->interest = $this->getInterest($loan);
            $repayment_schedule->principal = $this->getPrincipal($repayment_schedule->payment_amount, $repayment_schedule->interest);
            $repayment_schedule->balance = $this->getBalance($loan, $repayment_schedule->principal);

            $loan->repayment_schedules()->save($repayment_schedule);
            $date = strtotime( "+1 month", $date );
        }
    }

    public function getPMT($loan)
    {
        $P = $loan->loan_amount;
        $r = $loan->interest_rate/100;
        $Y = $loan->loan_term*12;
        $base = 1+($r/12);
        $PMT = ($P*($r/12))/(1-pow($base, -$Y));
        return $PMT;
    }

    public function getInterest($loan)
    {
        $interest = 0;
        $r = $loan->interest_rate/100;
        $repayment_schedule = Repayment_schedule::where('loan_id',$loan->id)->orderBy('id', 'desc')->take(1)->get()->first();
        if($repayment_schedule == null )
        {
            $interest = ($r/12)*$loan->loan_amount;
        }
        else
        {
          $interest = ($r/12)*$repayment_schedule->balance;
        }
        return $interest;
    }

    public function getPrincipal($PMT, $interest)
    {
        return $PMT-$interest;
    }

    public function getBalance($loan, $principal)
    {
        $balance = 0;
        $repayment_schedule = Repayment_schedule::where('loan_id',$loan->id)->orderBy('id', 'desc')->take(1)->get()->first();
        if($repayment_schedule == null )
        {
            $balance = $loan->loan_amount - $principal;
        }
        else
        {
          $balance = $repayment_schedule->balance - $principal;
        }
        return $balance;
    }
}
