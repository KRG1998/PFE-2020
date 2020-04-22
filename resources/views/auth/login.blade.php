@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg border-0 rounded-lg  w-100 pr-5 pt-5  bg-white">
        <div class="row">
            <div class="col">
                <img src="{{ asset('images\login.png')}}" alt="login-image" class="rounded mx-auto d-block" style="width:500px;height:600px">
            </div>
            <div class="col   ">
                <div class="d-flex flex-column">
                    <div class="m-2">
                        <h1 style="font-family:'Dancing Script';" class="text-secondary text-center">
                            Log-in With 
                            <br>
                             <a  class=" mt-4 w-50 text-center m-2 btn btn-lg btn-social  btn-facebook text-white  shadow border-0" href="{{url('/facebook/redirect')}}">
                        <i class="fab fa-facebook-square"></i>Sign in with Facebook
                    </a>
                    
                    <div class="row ">
                        <div class="col">
                            <a class="btn  btn-lg btn-social btn-google text-white w-100 m-2 shadow border-0" href="{{url('/google/redirect')}}" >
                                <i class="fab fa-google"></i> Sign in with Google
                              </a>
                        </div>
                          
                          <div class="col">
                            <a  class="btn btn-lg btn-social btn-linkedin m-2 text-white w-100 shadow border-0" href="{{url('/linkedin/redirect')}}">
                                <i class="fab fa-linkedin"></i> Sign in with LinkedIn
                              </a>
                          </div>
                    </div>
                </h1>
            </div>
                        
                              
                                
                             
                                
                            
                       

                   
                    <div class="p-2">
                        <div class=""><h1 style="font-family:'Dancing Script';" class="text-secondary text-center">Or</h1>
                    </div>
                   <div class="p-2">
                    <div class="">
                        <form  method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="email" class="col col-form-label text-secondary"><i class="fas fa-envelope"></i></label>                        
                                <div class="col-sm-10">
                                    <input id="email" type="email" class="form-control-sm form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-mail">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col text-secondary"><i class="fas fa-lock"></i></label>                        
                                <div class="col-sm-10">
                                    <input id="password" type="password" class="form-control-sm form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus placeholder="Password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check ml-4">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label  class="form-check-label text-secondary " for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group row ">
                                <div class=" col-md-8 offset-md-4" >
                                    <button style="font-family:'Dancing Script';" type="submit" class="btn btn-primary ml-5">
                                        <i class="fas fa-sign-in-alt"></i>&nbsp;Login
                                    </button>
                                </div>
                                @if (Route::has('password.request'))
                                <div class=" col-md-8 offset-md-4 " >
                                        <a style="font-family: 'Quicksand'" class="btn btn-link text-center" href="{{ route('password.request') }}">
                                          Forgot Your Password?
                                        </a>
                                        <a style="font-family: 'Quicksand'" class="btn btn-link text-center" href="{{ url('/register') }}">
                                            Create a new account
                                        </a>
                                </div>
                              
                                    @endif
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
@endsection
