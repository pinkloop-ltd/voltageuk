@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($users) > 0)
       @foreach($users as $user)
           <div class="well">
               <div class="row">

                   <div class="col-md-8 col-sm-8">
                       <a href="/users/{{$user->id}}/edit">{{$user->name}}</a>

                   </div>
               </div>
           </div>
       @endforeach

   @else
       <p>No users found</p>
   @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
