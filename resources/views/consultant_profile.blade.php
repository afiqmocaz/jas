@extends('layouts.master_consultant')

@section('content')
<div class="container">

<!--  
    @if($category === "eia")
    
           <iframe src="/eiaprofiles/create" id="print" width="100%" height="1000" >
    
        <iframe src="/eiaapp/{{$user->id}}/edit" id="print" width="100%" height="1000" >
    @elseif($category === "iets")
         <iframe src="/ietsapp/{{$user->id}}/edit" id="print" width="100%" height="1000" >
    @elseif($category === "apcs")
         <iframe src="/apcsapp/{{$user->id}}/edit" id="print" width="100%" height="1000" >
    @endif-->
    
    
    @if($category === "eia")
        <iframe src="/eiaprofiles/create" id="print" width="100%" height="1000" >
    @elseif($category === "iets")
        <iframe src="/ietsprofiles/create" id="print" width="100%" height="1000" >
    @elseif($category === "apcs")
         <iframe src="/apcsprofiles/create" id="print" width="100%" height="1000" >
    @endif

</div>
@endsection
