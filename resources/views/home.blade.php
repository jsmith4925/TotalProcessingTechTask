@extends('templates.main')

@section('content')

<h2> Hi {{ Auth::user()->name }}, your email address is {{ Auth::user()->email }} </h2>

<div class="container" style="padding-top: 40px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Buy Something?</div> <!-- Form Name Here -->

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        <!-- Define Form -->

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"> Amount </label>
                            <!-- Amount field -->

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <!-- Amount Box -->

                                <!-- @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror -->

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"> Reference </label>
                            <!-- reference field -->

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">
                                <!-- reference Box -->

                                <!-- @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror -->

                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                    <!-- Submit -->
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection