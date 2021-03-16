@extends('templates.main')

<?php

//replace with session ID
$decodedData = json_decode(Session('responseData'), true);
$checkoutId = $decodedData['id'];

?>

@section('content')

<div class="container" style="padding-top: 40px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">Payment Details for order: {{$checkoutId}}</div>
                <div class="card-body">


                    <div class="form-group row">
                        <label for="ref" class="col-md-4 col-form-label text-md-right">Amount: </label>
                        <div class="col-md-6">
                            <div class="form-control">
                                {{Session('amount')}}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ref" class="col-md-4 col-form-label text-md-right">Ref:</label>
                        <div class="col-md-6">
                            <div class="form-control">
                                {{Session('merchantTransactionId')}}
                            </div>
                        </div>
                    </div>

                    <script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId={{$checkoutId}}"></script>
                    <form action="/completeOrder" class="paymentWidgets" data-brands="VISA MASTER AMEX">                    
                    {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection