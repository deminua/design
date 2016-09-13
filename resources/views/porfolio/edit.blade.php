@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        	
            <div class="panel panel-default">
                <div class="panel-heading">Редактировать портфолио</div>

                <div class="panel-body">
					{!! Form::open(['route' => ['porfolio.update', $porfolio->id], 'files' => true]) !!}
					    

					<div class="form-group">
					    {{ Form::label('Название') }}
					    {!! Form::text('name', $porfolio->name, ['class'=>'form-control']) !!}
					</div>
					
					<div class="form-group">
					    {{ Form::label('css_name') }}
					    {!! Form::text('css_name', $porfolio->css_name, ['class'=>'form-control']) !!}
					</div>
					
					<div class="form-group">
					    {{ Form::label('css_created_at') }}
					    {!! Form::text('css_created_at', $porfolio->css_created_at, ['class'=>'form-control']) !!}
					</div>

					<div class="form-group">
					    {{ Form::label('Дата и время') }}
					    {!! Form::text('created_at', $porfolio->created_at, ['class'=>'form-control']) !!}
					</div>
					<div class="form-group">
					    {{ Form::label('Авторы, описание и прочее') }}
					    {!! Form::textarea('description', $porfolio->description, ['class'=>'form-control', 'rows'=>'3']) !!}
					</div>
					<div class="form-group">
					    {{ Form::label('Содержание') }}
					    {!! Form::textarea('body', $porfolio->body, ['class'=>'form-control']) !!}
					</div>

					<div class="row">
					<div class="form-group">
						@foreach($porfolio->files as $file)
						<div class="col-md-4" @if($file->avatar) style="background:#eee" @endif>
							<a href="{{ route('file.update', [$file->id, 'avatar']) }}"><img src="{{ route('imagecache', ['small', $file->filename]) }}"></a>
							<div><a href="{{ route('file.update', [$file->id, 'delete']) }}">Удалить</a></div>
						</div>
						@endforeach
					</div>

					</div>


					<div class="form-group">
					    {{ Form::label('Изображение') }}
					    {!! Form::file('images[]', ['multiple']) !!}
					</div>

					    {!! Form::submit('Обновить', ['class'=>'btn btn-success']) !!}
					{!! Form::close() !!}
                </div>
            </div>


        </div>
    </div>
</div>
@endsection


