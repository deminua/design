<div class="container">
    <div class="row">
        <div class="col-md-12">
			<ul class="nav nav-tabs">
			  <li {{ Request::route()->getName() == 'home' ? 'class=active' : '' }} role="menu"><a href="{{ route('home') }}">Каталог проектов</a></li>
			  <li {{ Request::route()->getName() == 'project' ? 'class=active' : '' }} role="menu"><a href="{{ route('project') }}">Создать проект</a></li>
			  <li {{ Request::route()->getName() == 'index_people' ? 'class=active' : '' }} role="menu"><a href="{{ route('index_people') }}">Персонализированный справочник</a></li>
			</ul>
        </div>
    </div>
</div>