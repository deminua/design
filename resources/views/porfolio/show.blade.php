@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        	
           
            <div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 text-center" style="margin-bottom:30px">
           		 <h1>{{ $porfolio->name }}</h1>
           		 <span class="label label-default" style="float:right; margin-top:-5px;">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $porfolio->created_at)->format('F Y') }}</span>
           		 @if($porfolio->body)<div class="well">{!! nl2br($porfolio->body) !!}</div>@endif
            </div>
            <div class="text-center">
						@foreach($porfolio->files as $file)
						<div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2" style="margin-bottom:30px">
							<img class="img-responsive" src="/uploads/{{ $file->filename }}">
						</div>
						@endforeach
			</div>
    </div>
</div>

<div class="container">
    <div class="row">
		<div class="col-md-6 col-lg-6 text-left" style="margin-bottom:30px">{!! nl2br($porfolio->description) !!}</div>
		<div class="col-md-6 col-lg-6 text-right" style="margin-bottom:30px">
			@if(!empty($back_next['back']->id))
				<a href="{{ route('porfolio.show', $back_next['back']->id) }}" class="btn btn-success"><span class="glyphicon glyphicon-chevron-left"></span> Back</a>
			@endif

			@if(!empty($back_next['next']->id))
				<a href="{{ route('porfolio.show', $back_next['next']->id) }}" class="btn btn-success">Next <span class="glyphicon glyphicon-chevron-right"></span></a>
			@endif
		</div>
    </div>
</div>


@endsection


