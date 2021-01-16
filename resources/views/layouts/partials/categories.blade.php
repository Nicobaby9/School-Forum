<div class="col-md-3">
	<!-- SEARCH & CREATE POST -->
	<form method="get" action="/thread/search">
        <div class="form-group">
            <input type="text" name="query" class="form-control" placeholder="Search">
        </div>
		<a href="{{ route('forum.create') }}" class="btn btn-success form-control ">Posting Sesuatu</a>
		<br>
    </form>
    <!-- TAGS -->
	<ul class="list-group">
		<h4> Tags </h4>
		<a href="{{ route('forum.index') }}" class="list-group-item" style="border-bottom: solid 2px black; margin-bottom: 1px; border-radius: 4px;">
			Semua Postingan
			<span class="badge" style="float:right;">14</span>
		</a>
		@foreach($tags as $tag)
		<a href="{{ route('forum.index', ['tags' => $tag->name]) }}" class="list-group-item">
			{{ \Illuminate\Support\Str::title($tag->name) }}
			<span class="badge" style="float:right;">14</span>
		</a>
		@endforeach
	</ul>
</div>