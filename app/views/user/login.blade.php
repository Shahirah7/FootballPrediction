@extends('layout.master')

@section('content')
    <div class="starter-template clearfix">
    	<div class="col-md-6">
            <h1>Sign In</h3>
            {{ Form::open(array('action' => 'UserController@doLogin')) }}
                <fieldset>
                    <div class="form-group">
                        {{ Form::text('email', null, array('class' => 'form-control', 'placeholder'=>'Email')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::password('password', array('class' => 'form-control', 'placeholder'=>'Password')) }}
                    </div>
    
                    <!-- Change this to a button or input when using this as a form -->
                    <button class="btn btn-sm btn-success">Login</button>
                </fieldset>
            {{ Form::close() }}
        </div>
    </div>
@stop
   