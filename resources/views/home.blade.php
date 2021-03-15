@extends('templates.main')

@section('content')

<h2> Hi {{ Auth::user()->name }}, your email address is {{ Auth::user()->email }} and userID is {{ Auth::user()->id }} </h2>

<div class="container" style="padding: 40px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Buy Something?</div> <!-- Form Name Here -->

                <div class="card-body">
                    <form method="POST" action="/order">
                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right"> Amount </label>
                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" name="amount" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ref" class="col-md-4 col-form-label text-md-right"> Reference </label>
                            <div class="col-md-6">
                                <input id="ref" type="text" class="form-control @error('ref') is-invalid @enderror"
                                    name="ref" required>
                            </div>
                        </div>

                        {{ csrf_field() }}
                        <!-- <input type="hidden" name="userID" value=" {{ Auth::user()->id }} " required >   -->

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

    @foreach($transactions as $transaction)

    <div class="container" style="padding: 5px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">Transaction ID: {{$transaction->id}}
                        <div style="float: right">{{ $transaction->created_at->format('H:i d/m/y') }}</div>
                        <div>{{ $transaction->created_at->diffForHumans() }}</div>
                        <!-- <a href="#" style='float: right'> X </a> -->
                    </div>

                    <div class="card-body">
                        Amount: {{$transaction->amount}}
                        <br>
                        Ref: {{$transaction->merchantTransactionId}}
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