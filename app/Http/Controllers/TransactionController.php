<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;



class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('transaction.index',compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Transaction\create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'type' => 'required',
            'month' => 'required'
        ]);

        $transaction = new Transaction([
            'amount' => $request->get('amount'),
            //'type' => $request->get('type')
            
        ]);

        $transaction->month = $request->get('month');
        $transaction->typeID = $request->get('type');
            
        $transaction->save();

        return redirect()->route('transaction.index')->with('success', 'Transaction Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::find($id);

        return view('transaction.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = Transaction::find($id);
         
        return view('transaction.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required',
            'type' => 'required',
            'month' => 'required'
        ]);

        $transaction = Transaction::find($id);
        $transaction->amount = $request->get('amount');
        $transaction->month = $request->get('month');
        $transaction->typeID = $request->get('type');
        $transaction->save();

        return redirect()->route('transaction.index')->with('success', 'Transaction Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();
        return redirect()->route('transaction.index')->with('success', 'Transaction Deleted');
    }

    public static function getAmountEarnedInTheMonth()
    {
        $transactions = Transaction::all();
        $total = 0;

        foreach($transactions as $transaction)
        {
            if($transaction->typeID == 1)
            {
                $total += $transaction->amount;
            }
            if($transaction->typeID == 2)
            {
                $total -= $transaction->amount;
            }
        }
        return $total;
    }
}
