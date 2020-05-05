@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg border-0 rounded-lg  w-100 h-100 pr-5 pt-5  bg-white">
        <div class="row">
            <div class="col w-50">
                <img src="{{ asset('images\login.png')}}" alt="login-image" class="rounded mx-auto d-block w-100 h-100">
            </div>
            <div class="col   ">
                <div class="d-flex flex-column">
                    <div class="m-2 text-center">
                        <h1 style="font-family: 'Quicksand'"  class="text-secondary text-center">
                            Log-in With 
                        </h1>
                        <div class="list-inline m-4">
                            
                            <a class="list-inline-item mr-4 ml-4"  href="{{url('/facebook/redirect')}}">               
                            <img src="{{ asset('images\facebook.png')}}" alt="login-image" class="rounded mx-auto d-block" style="width:50px;height:50px;">
                            </a>
                        
                             
                            <a class="list-inline-item mr-4 ml-4"  href="{{url('/google/redirect')}}" >      
                            <img src="{{ asset('images\google.png')}}" alt="login-image" class="rounded mx-auto d-block" style="width:50px;height:50px;">
                            </a>
                        
                           
                            <a class="list-inline-item mr-4 ml-4"  href="{{url('/google/linkedin')}}" >              
                            <img src="{{ asset('images\linkedin.png')}}" alt="login-image" class="rounded mx-auto d-block" style="width:50px;height:50px;">
                            </a>
                        
                    </div>
            </div>
                        
                              
                                
                             
                                
                            
                       

                   
                    <div class="p-2">
                        <div class=""><h1 style="font-family: 'Quicksand'" class="text-secondary text-center">Or</h1>
                    </div>
                   <div class="p-2">
                    <div class="">
                        <form  method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="col-auto">
                                <label class="sr-only" for="inlineFormInputGroup">Email</label>
                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                  </div>
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-mail">
                                  @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                              </div>
                              <div class="col-auto">
                                <label class="sr-only" for="inlineFormInputGroup">Password</label>
                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                  </div>
                                  <input  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus placeholder="Password"  >
                                  @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                              </div>
                              <div class="col-auto">
                                <label class="sr-only" for="inlineFormInputGroup">Password</label>
                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text bg-white border-0">
                                        <input type="checkbox" aria-label="Checkbox for following text input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    </div>
                                  </div>
                                  <label  class="form-check-label text-secondary " for="remember">
                                    {{ __('Remember me') }}
                                </label>
                                </div>
                              </div>    
                            <div class="form-group row ">
                                <div class=" col-md-8 offset-md-4" >
                                    <button style="font-family: 'Quicksand'" type="submit" class="btn btn-info text-white ml-5 font-weight-bold">
                                       Login
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
