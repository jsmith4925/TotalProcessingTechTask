@extends('templates.main')

@section('content')

<div class="container" style="padding: 40px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Buy Menu</div>

                <div class="card-body">
                    <form method="POST" action="/submitOrder">
                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right"> Amount </label>
                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" name="amount" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ref" class="col-md-4 col-form-label text-md-right"> Reference </label>
                            <div class="col-md-6">
                                <input id="merchantTransactionId" type="text" class="form-control @error('ref') is-invalid @enderror"
                                    name="merchantTransactionId" required>
                            </div>
                        </div>

                        {{ csrf_field() }}

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Proceed to Payment
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div>

    <h2 style="padding-bottom: 40px">Recent Transactions:</h2>

    @foreach( $transactions as $transaction)

    <!-- Add in 'succesful / failed' indicator -->

    <div class="container" style="padding: 5px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">Transaction ID: {{$transaction->id}}
                        <div style="float: right">{{ $transaction->created_at->format('H:i d/m/y') }}</div>
                        <div>{{ $transaction->created_at->diffForHumans() }}</div>
                    </div>

                    <div class="card-body">
                        Amount: {{$transaction->amount}}
                        <br>
                        Ref: {{$transaction->merchantTransactionId}}
                        <br>
                        Checkout Id: {{$transaction->checkoutID}} 
                        <br>
                        Result Code: {{$transaction->resultCode}} 
                        <br>
                        Description: {{$transaction->description}} 
                                                             
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>

</div>


@endsection