@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg border-0 rounded-lg pl-4 pr-5 bg-white">
        <div class="row">
            <div class="col">
                <img src="{{ asset('images\register.png')}}" alt="login-image" class="rounded mx-auto d-block" style="width:500px;height:600px;">
            </div>
            <div class="col pt-5">
                <div class="d-flex flex-column">
                    <div class="">
                        <h1 style="font-family:'Dancing Script';" class="text-secondary text-center">
                            Sign-up With
                            <br>
                             <a  class="  w-50 text-center mt-4  btn btn-lg btn-social  btn-facebook text-white  shadow border-0" href="{{url('/facebook/redirect')}}">
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
                    <div class="">
                        <div class=""><h1 style="font-family:'Dancing Script';" class="text-secondary text-center">Create an account</h1>
                    </div>
                   <div class="p-2">
                    <div class="border-info">
                        <form  method="POST" action="{{ route('register') }}">
                            @csrf
    
                            <div class="form-row">
                                <div class="form-group col-md-6">
    
                                    <input id="first_name" type="text" class="form-control form-control-sm @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" placeholder="First name" autofocus>
    
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    <div class="form-group col-md-6">  
                                
                                    <input id="last_name" type="text" class="form-control form-control-sm @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="Last name" autofocus>
    
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col col-form-label text-secondary"><i class="far fa-envelope"></i></label>
    
                                <div class="col-sm-10">
                                    <input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="role" class="col col-form-label text-secondary"><i class="fas fa-user-tie"></i></label>
    
                                <div class="col-sm-10">
                                    <select name="role" id="role" class="form-control form-control-sm @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}">
                                        <option value="client">Client</option>
                                        <option value="jobber">Jobber</option>
                                      <!--  <option value="admin">Admin</option> !-->
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">  
                                    <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
    
                                    @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                </div>
                                    <div class="form-group col-md-6">
    
    
                                
                                    <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
    
                
                                    </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button style="font-family:'Dancing Script';" type="submit" class="btn btn-primary" style="">
                                        <i class="fas fa-user-plus"></i> &nbsp; Sign up
                                    </button>
                                </div>
                            </div>
                            <div class=" col text-center " >
                                        <a style="font-family: 'Quicksand'" class="btn btn-link" href="{{ url('/login') }}">
                                          Already have an account?
                                        </a>
                                   
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
