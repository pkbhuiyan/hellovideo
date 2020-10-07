@extends('layouts.app')

@section('content')

    <div class="bg-col">
        <router-view :key="$route.fullPath"></router-view>
    
    </div>
                  
                
@endsection
