@extends('layouts.base')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="panel panel-default">
                    <div class="panel-heading">SIGN UP</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name" class="control-label">Name</label>

                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                       required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="email" class="form-control" id="email"
                                     required name="email" value="{{ old('email') }}">
                            </div>
                           

                            <div class="form-group">
                                <label for="password" class="control-label">Password</label>

                                <input id="password" type="password" class="form-control" name="password" required>

                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="control-label">Confirm Password</label>

                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
