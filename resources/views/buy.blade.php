@extends('layouts.master')

@section('title')
	Buy Book
@endsection

@section('content')
	@include('layouts.navbar-bookreader')
    
    <table class="table table-hover" style="margin-top:180px;">
        
        <tr>
        <th>Shop Name</th>
        <th>Address</th>
        <th>Email</th>
        <th>Hotline</th>
        <th>Website</th>
        </tr>
        
        @foreach($shops as $shop)
        <tr>
        <td>{{ $shop->name }}</td>
        <td>{{ $shop->address }}</td>
        <td>{{ $shop->email }}</td>
        <td>{{ $shop->telephone }}</td>
        <td><a href="https://{{$shop->website}}" target="_blank">{{ $shop->website }}</a></td>
        </tr>
        @endforeach
        
    </table>
    
   
    
    
@endsection