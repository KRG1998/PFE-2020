@extends('layouts.app')

@section('content')
 <!-- <App :user="{{ auth()->user() }}"></App> !-->
 <div>
   @if(Auth::check())
    <App :user="{{ auth()->user() }}"></App>
    @else
    <home/>
   @endif
 </div>

 @endsection
