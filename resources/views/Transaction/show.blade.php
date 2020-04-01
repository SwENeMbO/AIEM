@extends('layouts.template')

@section('title', 'Show Transaction '.$transaction->id)

@section('extraHead')
<link href="{{ asset('css/Transaction/table.css') }}" rel="stylesheet">
<link href="{{ asset('css/Transaction/show.css') }}" rel="stylesheet">
@endsection

@section('content')

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
						</tr>
					</thead>
					<tbody>
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
							</tr>
					</tbody>
                </table>
                <a href="{{route('transaction.index')}}"><button type="button" class="btn btn-primary" id="backButton">Back to List of Amounts</button></a>
            </div>
		</div>
	</div>
</div>

@endsection