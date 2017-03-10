@extends('layouts.app')

@section('content')

@include('layouts.projects_menu')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-sm-offset-1">

                <h3>Каталог проектов</h3>

				<table class="table table-hover">
				<thead>
					  <tr>
				        <th>id</th>
				        <th>Код</th>
				        <th>Название</th>
				        <th>Инфо</th>
				        <th>Участники</th>
				        <th>Дизайнер</th>
				        <th>Поступил</th>
				        <th>Начат</th>
						<th>Изменен</th>
						<th>Срок</th>
						<th>Сдано</th>
					  </tr>
				</thead>
				<tbody>
				@foreach($projects as $p)
				  <tr>
				        <td><a href="{{ route('project', ['id'=>$p->id]) }}">{{ $p->id }}</a></td>
				        <td>{{ $p->code }}</td>
				        <td>{{ $p->name }}<br><small>{{ $p->path }}</small></td>
				        <td><a href="#" class="glyphicon glyphicon-home" data-toggle="tooltip" data-placement="top" title="{{ $p->address }}, {{ $p->district }}, {{ $p->city }}, {{ $p->phone }}"></a> 
				        <a href="#" class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="top" title="{{ $p->description }}"></a></td>
				        <td>
				        @if($p->customer)Заказчик: <a href="{{ route('index_people', ['id'=>$p->customer['id']]) }}" data-toggle="tooltip" data-placement="top" title="{{ $p->customer['phone'] }} ({{ $p->customer['city'] }})">{{ $p->customer['name'] }} {{ $p->customer['surname'] }} {{ $p->customer['patronymic'] }}</a><br>@endif
				        @if($p->director)Директор: <a href="{{ route('index_people', ['id'=>$p->director['id']]) }}" data-toggle="tooltip" data-placement="top" title="{{ $p->director['phone'] }} ({{ $p->director['city'] }})">{{ $p->director['name'] }} {{ $p->director['surname'] }} {{ $p->director['patronymic'] }}</a><br>@endif
				        @if($p->curator)Куратор: <a href="{{ route('index_people', ['id'=>$p->curator['id']]) }}" data-toggle="tooltip" data-placement="top" title="{{ $p->curator['phone'] }} ({{ $p->curator['city'] }})">{{ $p->curator['name'] }} {{ $p->curator['surname'] }} {{ $p->curator['patronymic'] }}</a><br>@endif
				        <td>{{ $p->designer['surname'] }}</td>
				        <td>@if($p->created_at){{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $p->created_at)->format('d.m.Y') }}@endif</td>
				        <td>@if($p->start_at){{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $p->start_at)->format('d.m.Y') }}@endif</td>
				        <td>@if($p->edit_at){{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $p->edit_at)->format('d.m.Y') }}@endif</td>
				        <td>@if($p->term_at){{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $p->term_at)->format('d.m.Y') }}@endif</td>
				        <td>@if($p->finish_at){{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $p->finish_at)->format('d.m.Y') }}@endif</td>
				  </tr>					
				@endforeach
				</tbody>
				</table>

        </div>
    </div>
</div>
@endsection
