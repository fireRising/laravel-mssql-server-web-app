@extends('layouts.master')

@section('contents')
    <div class="col-sm-8 blog-main">

        <form method="post" action="/services">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

            @include('layouts.errors')

        </form>

    </div><!-- /.blog-main -->

@endsection