@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg border-0 rounded-lg w-100 h-100 pl-4 pr-5 bg-white">
        <div class="row">
            <div class="col mt-5 w-50">
                <img src="{{ asset('images\register.png')}}" alt="login-image" class="rounded mx-auto d-block w-100 h-100">
            </div>
            <div class="col pt-5">
                <div class="d-flex flex-column">
                    <div class="text-center">
                        <h1 style="font-family: 'Quicksand'" class="text-secondary text-center">
                            Sign-up With
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
                    <div class="">
                        <div class=""><h1 style="font-family: 'Quicksand'" class="text-secondary text-center">Create an account</h1>
                    </div>
                   <div class="p-2">
                    <div class="border-info">
                        <form  method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                  </span>
                                </div>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" placeholder="First name" autofocus>         
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="Last name" autofocus>
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                           
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-envelope"></i>
                              </span>
                            </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-user-tie"></i>
                              </span>
                            </div>

                                <select name="role" id="role" class="form-control  @error('role') is-invalid @enderror" name="role" required value="{{ old('role') }}">
                                    <option value="">You are ...</option>
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
                             <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                     <span class="input-group-text "  id="">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                                <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                 <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                            </div>                     
                            <div class="form-group row mb-0">
                                <div class="col text-center">
                                    <button style="font-family: 'Quicksand'" type="submit" class="btn btn-info text-white font-weight-bold">
                                        Sign up
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
