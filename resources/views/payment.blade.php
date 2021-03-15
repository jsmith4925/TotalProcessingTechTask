@extends('templates.main')

@section('content')

<h2> Hi {{ Auth::user()->name }}, your email address is {{ Auth::user()->email }} </h2>
<h2> Your Amount for this session is --Ammount-- and your Reference is --Reference--</h2>

<div class="container" style="padding-top: 40px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Buy Something?</div> <!-- Form Name Here -->

                <div class="card-body">
                    <div id="card_220921339056" class="wpwl-container wpwl-container-card">
                        <form class="wpwl-form wpwl-form-card wpwl-clearfix"
                            action="https://test.oppwa.com/v1/checkouts/{checkoutId}/payment" method="POST"
                            target="cnpIframe" lang="en">
                            <div class="wpwl-group wpwl-group-brand wpwl-clearfix">
                                <div class="wpwl-label wpwl-label-brand">Brand</div>
                                <div class="wpwl-wrapper wpwl-wrapper-brand">
                                    <select class="wpwl-control wpwl-control-brand" name="paymentBrand">
                                        <option value="MASTER">Mastercard</option>
                                        <option value="VISA">Visa</option>
                                    </select>
                                </div>
                                <div class="wpwl-brand wpwl-brand-card wpwl-brand-MASTER"></div>
                            </div>
                            <div class="wpwl-group wpwl-group-cardNumber wpwl-clearfix">
                                <div class="wpwl-label wpwl-label-cardNumber">Card Number</div>
                                <div class="wpwl-wrapper wpwl-wrapper-cardNumber">
                                    <input autocomplete="off" type="tel" name="card.number"
                                        class="wpwl-control wpwl-control-cardNumber" placeholder="Card Number">
                                </div>a
                            </div>
                            <div class="wpwl-group wpwl-group-expiry wpwl-clearfix">
                                <div class="wpwl-label wpwl-label-expiry">Expiry Date</div>
                                <div class="wpwl-wrapper wpwl-wrapper-expiry">
                                    <input autocomplete="off" type="tel" name="card.expiry" b
                                        class="wpwl-control wpwl-control-expiry" placeholder="MM / YY">
                                </div>
                            </div>
                            <div class="wpwl-group wpwl-group-cardHolder wpwl-clearfix">
                                <div class="wpwl-label wpwl-label-cardHolder">Card holder</div>
                                <div class="wpwl-wrapper wpwl-wrapper-cardHolder">
                                    <input autocomplete="off" type="text" name="card.holder"
                                        class="wpwl-control wpwl-control-cardHolder" placeholder="Card holder">
                                </div>
                            </div>
                            <div class="wpwl-group wpwl-group-cvv wpwl-clearfix">
                                <div class="wpwl-label wpwl-label-cvv">CVV</div>
                                <div class="wpwl-wrapper wpwl-wrapper-cvv">
                                    <input autocomplete="off" type="tel" name="card.cvv"
                                        class="wpwl-control wpwl-control-cvv" placeholder="CVV">
                                </div>
                            </div>
                            <div class="wpwl-group wpwl-group-submit wpwl-clearfix">
                                <div class="wpwl-wrapper wpwl-wrapper-submit">
                                    <button type="submit" name="pay" class="wpwl-button wpwl-button-pay">Pay
                                        now</button>
                                </div>
                            </div>
                            <input type="hidden" name="shopperResultUrl"
                                value="https://test.oppwa.com/v1/checkouts/{checkoutId}/payment">
                            <input type="hidden" name="card.expiryMonth" value="">
                            <input type="hidden" name="card.expiryYear" value="">
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection