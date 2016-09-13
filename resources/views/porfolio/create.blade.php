@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        	
            <div class="panel panel-default">
                <div class="panel-heading">Создать портфолио</div>

                <div class="panel-body">
					{!! Form::open(['route' => 'porfolio.store', 'files' => true]) !!}
					    

					<div class="form-group">
					    {{ Form::label('Название') }}
					    {!! Form::text('name', '', ['class'=>'form-control']) !!}
					</div>

					<div class="form-group">
					    {{ Form::label('css_name') }}
					    {!! Form::text('css_name', '', ['class'=>'form-control']) !!}
					</div>
					
					<div class="form-group">
					    {{ Form::label('css_created_at') }}
					    {!! Form::text('css_created_at', '', ['class'=>'form-control']) !!}
					</div>


					<div class="form-group">
					    {{ Form::label('Описание') }}
					    {!! Form::textarea('description', '', ['class'=>'form-control', 'rows'=>'3']) !!}
					</div>
					<div class="form-group">
					    {{ Form::label('Содержание') }}
					    {!! Form::textarea('body', '', ['class'=>'form-control']) !!}
					</div>

					<div class="form-group">
					    {{ Form::label('Изображение') }}
					    {!! Form::file('images[]', ['multiple']) !!}
					</div>

					 {!! Form::submit('Создать', ['class'=>'btn btn-success']) !!}
					{!! Form::close() !!}
                </div>
            </div>


        </div>
    </div>
</div>
@endsection


