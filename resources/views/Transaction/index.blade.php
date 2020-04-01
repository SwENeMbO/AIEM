@extends('layouts.template')

@section('title', 'Transactions')

@section('extraHead')
    <link href="{{ asset('css/Transaction/table.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Transaction/index.css') }}" rel="stylesheet">
@endsection

@section('content')

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<div class="limiter">
	<div class="container-table100">
		<div class="wrap-table100">
			<div class="table100">
				<table>
					<thead>
						<tr class="table100-head">
							<th class="column1">ID</th>
							<th class="column2">Amount</th>
                            <th class="column3">Type</th>
                            <th class="column4">Month</th>
                            <th class="column5">Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($transactions as $transaction)
							<tr>
								<td class="column1">
                                    {{$transaction->id}}
                                </td>
								<td class="column2">${{$transaction->amount}}</td>
								<td class="column3">
                                    @if($transaction->typeID == 1)
                                        Income
                                    @endif
                                    @if($transaction->typeID == 2)
                                        Expenditure
                                    @endif
                                </td>
                                <td class="column4">
                                @php
                                    $monthNum  = $transaction->month;
                                    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                                    $monthName = $dateObj->format('F');
                                @endphp
                                {{$monthName}}</td>
                                <td class="column5">

                                    <a href="{{route('transaction.show', $transaction)}}" class="btn btn-success btn-sm">
                                        <i class="fas fa-eye"></i>   
                                    </a>

                                    <a href="{{route('transaction.edit', $transaction)}}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>     
                                    </a>


                                    <form method="POST" action="{{route('transaction.destroy', $transaction)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>     
                                    </button>
                                    </form>

                                </td>
							</tr>
                        @endforeach
                        
					</tbody>
                </table>

                <?php $test = \App\Http\Controllers\TransactionController::getAmountEarnedInTheMonth() ?>
                <p style="margin-top: 40px">Money earned in the last month: {{$test}}</p>

                <a href="{{route('transaction.create')}}" class="btn btn-primary">Add Transaction</a>

            </div>
		</div>
	</div>
</div>
@endsection