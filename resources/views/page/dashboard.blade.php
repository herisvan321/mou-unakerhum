@extends('page.template')
@section('home')
<div class="card card-primary card-tabs">
 @if(Auth::user()->level == 0)
 @include("include.admin")
 @elseif(Auth::user()->level == 1)
  @include("include.client")
 @endif
</div>

@endsection