@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-sm-12">
        <h1>Address</h1>
		<div class="jumbotron">
		<p>50000, Ukraine, Kriviy Rih, Nimezka Street, 7</p>
			<p><a href="tel:+380679999957"><span class="glyphicon glyphicon-phone"></span> +380 67 9999 957</a></p>
			<p><a href="mailto:led@krost.com.ua"><span class="glyphicon glyphicon-envelope"></span> led@krost.com.ua</a></p>
		</div>


        </div>

	</div>
</div>


<div class="container-fluid">
    <div class="row">

		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2674.571559144727!2d33.34303641564093!3d47.90597727920574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40dad8ad560f7d3d%3A0x6bd124796b4c500!2z0LLRg9C70LjRhtGPINCd0ZbQvNC10YbRjNC60LAsIDcsINCa0YDQuNCy0LjQuSDQoNGW0LMsINCU0L3RltC_0YDQvtC_0LXRgtGA0L7QstGB0YzQutCwINC-0LHQu9Cw0YHRgtGMLCA1MDAwMA!5e0!3m2!1sru!2sua!4v1473762734339" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
</div>



<div class="container">
    <div class="row">

        <div class="col-sm-12">
	       <center><a href="{{ url('http://www.design.krost.com.ua') }}">www.design.krost.com.ua</a></center>
	    </div>

	</div>
</div>

@endsection


