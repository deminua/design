@extends('layouts.app')

@section('content')


<div class="container-fluid">
<div class="row">

            @foreach($porfolios as $porfolio)


                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 portfolio-col">
                <style type="text/css">
                        .portfolio-name{{ $porfolio->id }} strong { {{ $porfolio->css_name }} }
                        .portfolio-name{{ $porfolio->id }} date { {{ $porfolio->css_created_at }} }
                </style>

                @if (!Auth::guest())
                    <div class="admin_menu"><a class="btn btn-success" title="edit" href="{{ route('porfolio.edit', $porfolio->id) }}"><span class="glyphicon glyphicon-pencil"></span></a></div>
                @endif

                <span class="portfolio-name portfolio-name portfolio-name{{ $porfolio->id }}"><a href="{{ route('porfolio.show', $porfolio->id) }}"><strong>{{ $porfolio->name }}</strong></a>
                <span class="portfolio-clearfix"></span>
                <date>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $porfolio->created_at)->format('F Y') }}</date></span>
                    @foreach($porfolio->avatar as $file)
                        <a href="{{ route('porfolio.show', $porfolio->id) }}"><img class="img-responsive" src="{{ route('imagecache', ['medium', $file->filename]) }}"></a>
                    @endforeach
                 </div>
            @endforeach


</div>  
</div>

    <center>{{ $porfolios->links() }}</center>


@endsection
