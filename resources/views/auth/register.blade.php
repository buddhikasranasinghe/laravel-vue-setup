@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="accont-type" class="col-md-4 col-form-label text-md-right">{{ __('User Account Type') }}</label>
                            <div class="col-md-6">
                                <select name="account_type" id="account-type" class="form-control" onchange="changeAccountType()">
                                    <option value="1">Customer</option>
                                    <option value="2">Vendor</option>
                                    <option value="3">Rider</option>
                                </select>
                            </div>
                        </div> --}}

                        {{-- <div class="row" style="display: none" id="pharmacy_details_panel">
                            <h5 class="text-center">Pharmacy Details</h5>
                            <div class="form-group row">
                                <label for="pharmacy-name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="pharmacy-name" type="text" class="form-control" name="pharmacy_name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="pharmacy-email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                                <div class="col-md-6">
                                    <input id="pharmacy-email" type="text" class="form-control" name="pharmacy_email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="pharmacy-contact-number" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>
                                <div class="col-md-6">
                                    <input id="pharmacy-contact-number" type="text" class="form-control" name="pharmacy_contact_number">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="pharmacy-address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                                <div class="col-md-6">
                                    <textarea id="pharmacy-address" type="text" class="form-control" name="pharmacy_address">
                                    </textarea>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function changeAccountType() {
            let account_type = document.getElementById('account-type').value
            console.log('change account type : ' + account_type)
            if (account_type == 2) {
                document.getElementById('pharmacy_details_panel').style.display = 'block'
            } else {
                document.getElementById('pharmacy_details_panel').style.display = 'none'
            }
            
        }
    </script>
</div>
@endsection
