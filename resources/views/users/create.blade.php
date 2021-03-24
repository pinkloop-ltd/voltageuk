@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create User</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('users.store') }}" method="post">
                      {{ csrf_field() }}
                      <div class="form-row">
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="name" name="name" class="form-control" id="name"/>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="email">eMail</label>
                          <input type="email" name="email" class="form-control" id="email"/>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="initials">Unique Initials</label>
                          <input type="string" name="initials" class="form-control" id="initials"/>
                        </div>
                      </div>

                      <input type="hidden" name="password" value="Password1"/>
                      <input type="submit" value="Save" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
