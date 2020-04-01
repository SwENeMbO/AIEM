@extends('layouts.template')

@section('title', 'Edit Transaction '.$transaction->id)

@section('extraHead')
    <link href="{{ asset('css/Transaction/edit.css') }}" rel="stylesheet">
@endsection

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{route('transaction.update', $transaction)}}">
@csrf
@method('PATCH')
    <div class="form-group">
        <label for="post-amount">Amount</label>
        <input class="form-control" type="text" name="amount" id="post-amount" placeholder="Actually ${{$transaction->amount}}">
    </div>
    <div class="form-group">
        <label for="post-type">Amount Type</label>
        <select class="form-control" name="type" id="post-type">
            <option value="1">Income</option>
            <option value="2">Expenditure</option>
        </select>
    </div>
    <div class="form-group">
        <label for="post-month">Month</label>
        <select class="form-control" name="month" id="post-month">
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary btn-update">Update Transaction Data</button>

    <a href="{{route('transaction.index')}}"><button type="button" class="btn btn-primary btn-back" id="backButton">Back to List of Amounts</button></a>
</form>

@endsection