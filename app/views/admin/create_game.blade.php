@extends('layout.master')

@section('content')
    <div class="starter-template clearfix">
        <div class="col-md-12">
            <h1>Create Game</h1>
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
            {{ Form::open(array('action' => 'AdminController@doCreateGame')) }}
                <fieldset>
                    <div class="form-group">
                        {{ Form::text('game_name', null, array('class' => 'form-control', 'placeholder'=>'Game Name (e.g. 1)')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::text('starting_round', null, array('class' => 'form-control', 'placeholder'=>'Starting Round (1-38)')) }}
                    </div>
                    <button class="btn btn-sm btn-primary">Create</button>
                </fieldset>
            {{ Form::close() }}
        </div>
    </div>
@stop
   