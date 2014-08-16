@extends('layout.master')

@section('content')
    <div class="starter-template clearfix">
        <div class="col-md-12">
            <h1>Login</h1>
            <hr/>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum in leo leo.</p>
            <hr/>
            
            @if(count($errors))
            <div class="alert alert-danger" role="alert">
                <h4>Sorry, there were errors!</h4>
                <ul>
                    <li>{{ $errors }}</li>
                </ul>
            </div>
            @endif
        </div>
    	<div class="col-md-6">
            {{ Form::open(array('action' => 'UserController@doLogin')) }}
                <fieldset>
                    <div class="form-group">
                        {{ Form::text('email', null, array('class' => 'form-control', 'placeholder'=>'Email')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::password('password', array('class' => 'form-control', 'placeholder'=>'Password')) }}
                    </div>
                    <button class="btn btn-sm btn-primary">Login</button>
                </fieldset>
            {{ Form::close() }}
        </div>
    </div>
@stop
   