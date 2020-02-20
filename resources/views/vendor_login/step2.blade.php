@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    
                        @foreach($data as $row)
                            @endforeach
                    <form method="POST" action="{{ route('vendor.login.step2.submit')}}">
                        @csrf

                                            
                         <input type="hidden" name="email" value="{{$row->email}}">
                          <input type="hidden" name="vendor_id" value="{{$row->vendor_id}}">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('OTP') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control"  name= "otp" required  autofocus>                   
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
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
