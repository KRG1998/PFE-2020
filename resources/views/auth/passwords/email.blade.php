@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg border-0 rounded-lg pt-4   bg-white">
        <div class="row">
            <div class="col">
                <img src="{{ asset('images\password.png')}}" alt="login-image" class="rounded mx-auto d-block h-100 w-100" >
            </div>
            <div class="col pt-5 mt-5 ">
                <div class="d-flex flex-column mt-5">
                    <div class="p-2 mt-5"><h1 style="font-family: 'Quicksand'" class="text-secondary text-center">Enter Your E-mail</h1></div>
                    
                   <div class="p-2">
                    <div class="">
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
        
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInputGroup">Email</label>
                                    <div class="input-group mb-2">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                      </div>
                                      <input id="email" type="email" value="{{ old('email') }}" class="form-control-sm form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-mail">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                  </div>
                           
        
                                <div class="form-group row mb-0">
                                    <div class=" col text-center" >
                                        <button style="font-family: 'Quicksand'" type="submit" class="btn btn-info text-white font-weight-bold">
                                            Send
                                        </button>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                   </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection
