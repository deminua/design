@extends('layouts.app')

@section('content')

@include('layouts.projects_menu')

<div class="container">
    <div class="row">
        <div class="col-md-12">
                <h3>{{ $project->name or 'Добавить новый проект' }}</h3>
<hr>
					{!! Form::model($project, ['route' => ['update_project', 'id'=>$project->id], 'class' => 'form-horizontal']) !!}


					<div class="form-group">
					    <div class="col-sm-3">
					    	<label>Начат</label>
							{{ Form::date('start_at', $project->start_at, ['class'=>'form-control', 'placeholder'=>date('d.m.Y')]) }}
					    </div>
					    <div class="col-sm-3">
					    	<label>Изменен</label>
							{{ Form::date('edit_at', $project->edit_at, ['class'=>'form-control', 'placeholder'=>date('d.m.Y')]) }}
					    </div>
					    <div class="col-sm-3">
					    	<label>Срок</label>
							{{ Form::date('term_at', $project->term_at, ['class'=>'form-control', 'placeholder'=>date('d.m.Y')]) }}
					    </div>
					    <div class="col-sm-3">
					    	<label>Сдано</label>
							{{ Form::date('finish_at', $project->finish_at, ['class'=>'form-control', 'placeholder'=>date('d.m.Y')]) }}
					    </div>
					</div>


					<div class="form-group">
					    <label class="col-sm-2 control-label" for="code">Код</label>
					    <div class="col-sm-10">
					    {!! Form::text('code', $project->code, ['class'=>'form-control', 'id'=>'code', 'placeholder'=>'Код']) !!}
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-2 control-label" for="name">Название</label>
					    <div class="col-sm-10">
					    {!! Form::text('name', $project->name, ['class'=>'form-control', 'id'=>'name', 'placeholder'=>'Название']) !!}
					    </div>
					</div>

					<div class="form-group">
					    <label class="col-sm-2 control-label" for="path">Путь</label>
					    <div class="col-sm-10">
					    {!! Form::text('path', $project->path, ['class'=>'form-control', 'id'=>'path', 'placeholder'=>'Путь']) !!}
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-2 control-label" for="city">Город</label>
					    <div class="col-sm-10">
					    {!! Form::text('city', $project->city, ['class'=>'form-control', 'id'=>'city', 'placeholder'=>'Город']) !!}
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-2 control-label" for="district">Район</label>
					    <div class="col-sm-10">
					    {!! Form::text('district', $project->district, ['class'=>'form-control', 'id'=>'district', 'placeholder'=>'Район']) !!}
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-2 control-label" for="address">Адрес</label>
					    <div class="col-sm-10">
					    {!! Form::text('address', $project->address, ['class'=>'form-control', 'id'=>'address', 'placeholder'=>'Адрес']) !!}
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-2 control-label" for="phone">Телефон</label>
					    <div class="col-sm-10">
					    {!! Form::text('phone', $project->phone, ['class'=>'form-control', 'id'=>'phone', 'placeholder'=>'Телефон']) !!}
					    </div>
					</div>

					<div class="form-group">
					    <label class="col-sm-2 control-label" for="customer_id">Заказчик</label>
					    <div class="col-sm-10">
							{{ Form::select('customer_id', $peoples, $project->customer_id, ['class'=>'form-control', 'id'=>'customer_id']) }}
					    </div>
					</div>

					<div class="form-group">
					    <label class="col-sm-2 control-label" for="director_id">Директор</label>
					    <div class="col-sm-10">
							{{ Form::select('director_id', $peoples, $project->director_id, ['class'=>'form-control', 'id'=>'Директор']) }}
					    </div>
					</div>

					<div class="form-group">
					    <label class="col-sm-2 control-label" for="curator_id">Куратор</label>
					    <div class="col-sm-10">
							{{ Form::select('curator_id', $peoples, $project->curator_id, ['class'=>'form-control', 'id'=>'Куратор']) }}
					    </div>
					</div>

					<div class="form-group">
					    <label class="col-sm-2 control-label" for="designer_id">Дизайнер</label>
					    <div class="col-sm-10">
							{{ Form::select('designer_id', $peoples, $project->designer_id, ['class'=>'form-control', 'id'=>'Дизайнер']) }}
					    </div>
					</div>

					<div class="form-group">
					    <label class="col-sm-2 control-label" for="description">Описание</label>
					    <div class="col-sm-10">
					    {!! Form::textarea('description', $project->description, ['class'=>'form-control', 'rows'=>'2', 'id'=>'description', 'placeholder'=>'Описание']) !!}
					    </div>
					</div>

					
					<center>
						{!! Form::submit('Сохранить', ['class'=>'btn btn-success']) !!}
					</center>
					{!! Form::close() !!}

<hr>


        </div>
    </div>
</div>
@endsection
