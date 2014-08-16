@extends('layout.master')

@section('content')
    <div class="starter-template clearfix">
        <div class="col-md-12">
            <h1>Register</h1>
            <hr/>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum in leo leo. Integer ac semper justo. 
            Aenean dapibus in lorem a ullamcorper. Quisque accumsan erat diam, eu posuere turpis fringilla nec. 
            Etiam dapibus blandit sagittis. Quisque sollicitudin, augue at tempor lobortis, ipsum neque pulvinar orci, 
            id auctor sapien nisi quis ligula. Nam id ultrices erat.</p>
            <hr/>

            @if(count($errors))
            <div class="alert alert-danger" role="alert">
                <h4>Sorry, there were errors!</h4>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif
        </div>

    	<div class="col-md-6">

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
                    <div class="form-group">
                        {{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder'=>'Confirm Password')) }}
                    </div>
                    <button class="btn btn-sm btn-primary">Register</button>
                </fieldset>
            {{ Form::close() }}
        </div>
    </div>
@stop