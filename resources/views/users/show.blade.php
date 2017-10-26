@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card-box">
                    <form role="form" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="put"/>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" value="{{$user->user_email}}" name= "user_email" id="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Username">Username</label>
                            <input type="text" value="{{$user->user_name}}" id="Username" name="user_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Password">Password</label>
                            <input type="password" placeholder="6 - 15 Characters" id="Password" name="password" class="form-control">
                        </div>
                        <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Save</button>
                    </form>
                </div>
            </div>


            <div class="col-sm-6">
                <div class="text-center card-box">
                    <div class="member-card">
                        <div class="thumb-xl member-thumb m-b-10 center-block">
                            <img src="http://gravatar.com/avatar/{{md5($user->user_email)}}?d=mm" class="img-circle img-thumbnail" alt="profile-image">
                        </div>

                        <div class="">
                            <h4 class="m-b-5">{{$user->user_name}}</h4>
                            <p class="text-muted">{{$user->user_email}}</p>
                        </div>
                        <form method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="put"/>
                            @if($user->permission_level=='admin')
                                <button type="submit" class="btn btn-warning btn-sm w-sm waves-effect m-t-10 waves-light">Remove Admin</button>
                                <input type="hidden" name="permission_level" value="member"/>
                            @else
                                <input type="hidden" name="permission_level" value="admin"/>
                                <button type="submit" class="btn btn-primary btn-sm w-sm waves-effect m-t-10 waves-light">Make Admin</button>
                            @endif
                        </form>
                        <form method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="delete"/>
                            <button type="submit" class="btn btn-danger btn-sm w-sm waves-effect m-t-10 waves-light">Delete User</button    >
                        </form>




                    </div>
            </div>
        </div>
    </div>



@endsection