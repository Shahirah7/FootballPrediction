@extends('layout.master')

@section('content')
    <div class="starter-template clearfix">
    	<div class="col-md-6">
            <h1>Register</h3>
            {{ Form::open(array('action' => 'UserController@doRegister')) }}
                <fieldset>
                    <div class="form-group">
                        {{ Form::text('name', null, array('class' => 'form-control', 'placeholder'=>'Name')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::text('username', null, array('class' => 'form-control', 'placeholder'=>'Username')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::text('email', null, array('class' => 'form-control', 'placeholder'=>'Email')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::password('password', array('class' => 'form-control', 'placeholder'=>'Password')) }}
                    </div>
                    <button class="btn btn-sm btn-success">Register</button>
                </fieldset>
            {{ Form::close() }}
        </div>
    </div>
@stop