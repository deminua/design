@extends('layouts.app')

@section('content')

@include('layouts.projects_menu')

<div class="container">
    <div class="row">
        <div class="col-md-12">
                <h3>Персонализированный справочник</h3>
<hr>
					{!! Form::model($people, ['route' => ['update_people', 'id'=>$people->id], 'class' => 'form-horizontal']) !!}
					    
					<div class="form-group">
					    <label class="col-sm-2 control-label" for="name">Имя</label>
					    <div class="col-sm-10">
					    {!! Form::text('name', $people->name, ['class'=>'form-control', 'id'=>'name', 'placeholder'=>'Имя']) !!}
					    </div>
					</div>

					<div class="form-group">
					    <label class="col-sm-2 control-label" for="surname">Фамилия</label>
					    <div class="col-sm-10">
					    {!! Form::text('surname', $people->surname, ['class'=>'form-control', 'id'=>'surname', 'placeholder'=>'Фамилия']) !!}
					    </div>
					</div>

					<div class="form-group">
					    <label class="col-sm-2 control-label" for="patronymic">Отчество</label>
					    <div class="col-sm-10">
					    {!! Form::text('patronymic', $people->patronymic, ['class'=>'form-control', 'id'=>'patronymic', 'placeholder'=>'Отчество']) !!}
					    </div>
					</div>

					<div class="form-group">
					    <label class="col-sm-2 control-label" for="phone">Телефон</label>
					    <div class="col-sm-10">
					    {!! Form::text('phone', $people->phone, ['class'=>'form-control', 'id'=>'phone', 'placeholder'=>'Телефон']) !!}
					    </div>
					</div>

					<div class="form-group">
					    <label class="col-sm-2 control-label" for="city">Город</label>
					    <div class="col-sm-10">
					    {!! Form::text('city', $people->city, ['class'=>'form-control', 'id'=>'city', 'placeholder'=>'Город']) !!}
					    </div>
					</div>

					<div class="form-group">
					    <label class="col-sm-2 control-label" for="description">Описание</label>
					    <div class="col-sm-10">
					    {!! Form::textarea('description', $people->description, ['class'=>'form-control', 'rows'=>'1', 'id'=>'description', 'placeholder'=>'Описание']) !!}
					    </div>
					</div>

					<center>
						{!! Form::submit('Сохранить', ['class'=>'btn btn-success']) !!}
					</center>
					{!! Form::close() !!}

<hr>

				<table class="table table-hover">
				<thead>
					  <tr>
					    <th>Имя</th>
					    <th>Фамилия</th>
					    <th>Отчество</th>
					    <th>Телефон</th>
					    <th>Город</th>
					  </tr>
				</thead>
				<tbody>
				@foreach($peoples as $p)
				  <tr>
				    <td><a href="{{ route('index_people', ['id'=>$p->id]) }}">{{ $p->name }}</a></td>
				    <td>{{ $p->surname }}</td>
				    <td>{{ $p->patronymic }}</td>
				    <td>{{ $p->phone }}</td>
				    <td>{{ $p->city }}</td>
				  </tr>					
				@endforeach
				</tbody>
				</table>
        </div>
    </div>
</div>
@endsection
