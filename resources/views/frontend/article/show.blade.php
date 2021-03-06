@extends('landing-page.index')

@section('css')
<style type="text/css" media="screen">
	.card-comments img{width:4rem}
</style>
@endsection

@section('content')
<main class="mt-5 pt-5">
    <div class="container">

        <!--Section: Post-->
        <section class="mt-4">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-8 mb-4">

                	<div class="mb-4 wow fadeIn">
                        <div class="card-body text-center">
                        	<h3 class="h1 my-4">{{ $article->title }}</h3>
                            <hr>
                            @foreach($article->categories as $category)
                                <a href="{{ route('category.article', $category->name) }}" class="btn btn-xs btn-info" style="width: 11%;">  {{ \Illuminate\Support\Str::title($category->name) }} &nbsp; </a>
                            @endforeach
                    	</div>
                    </div>

                    <!--Featured Image-->
                    <div class="card mb-4 wow fadeIn">
                        <img src="{{ asset('article/'.$article->image) }}" class="img-fluid">
                    </div>
                    <!--/.Featured Image-->
                	<p class="float-right">Created : {{ \Carbon\Carbon::parse($article->created_at)->format('D, d-M-Y') }} &nbsp;</p>
                    <br><hr>
                    <!--Card-->
                    <div class="card mb-4 wow fadeIn">

                        <!--Card content-->
                        <div class="card-body text-center">

                            <div style="text-align: justify; text-justify: inter-word;">
                            	<p> {!! $article->content !!} </p>
                            </div>

                            <h5 class="my-4 float-right">
                                <strong>Created by : {{ $article->user->fullname }}</strong>
                            </h5>

                        </div>

                    </div>
                    <!--/.Card-->

                    <!--Card-->
                    <div class="card mb-4 wow fadeIn">

                        <div class="card-header font-weight-bold">
                            <span>About author</span>
                            <span class="pull-right">
                                <a href="">
                                    <i class="fab fa-facebook-f mr-2"></i>
                                </a>
                                <a href="">
                                    <i class="fab fa-twitter mr-2"></i>
                                </a>
                                <a href="">
                                    <i class="fab fa-instagram mr-2"></i>
                                </a>
                                <a href="">
                                    <i class="fab fa-linkedin-in mr-2"></i>
                                </a>
                            </span>
                        </div>

                        <!--Card content-->
                        <div class="card-body">

                            <div class="media d-block d-md-flex mt-3">
                                <img class="d-flex mb-3 mx-auto z-depth-1 rounded-circle" src="{{ asset('profile_images/'.$article->user->photo) }}" alt="Generic placeholder image"
                                    style="width: 100px;">
                                <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                    <a class="mt-0 font-weight-bold h4" href="{{ route('user_profile', $article->user->username) }}"> {{ \Illuminate\Support\Str::title($article->user->fullname) }} </a>
                                    <table>
                                        <tr>
                                            <th>Email </th>
                                            <th>&nbsp; : &nbsp;</th>
                                            <td> {{ $article->user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Username</th>
                                            <th>&nbsp; : &nbsp;</th>
                                            <td> {{ '@'.$article->user->username }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!--/.Card-->

                    <!--Card-->
                    <div class="card mb-4 wow fadeIn">

                        <!--Card content-->
                        <div class="card-body text-center">


                            <a class="btn btn-outline-success btn-primary" href="/galery" role="button" target="_blank" style="width: 100%;">Gallery</a>

                            <hr>

                            <!-- Logo carousel -->
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="1800">
                                <div class="carousel-inner">
                                    <!-- First slide -->
                                    <div class="carousel-item">
                                        <!--Grid row-->
                                        <div class="row">

                                            @foreach($galleries as $gallery)
                                            <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                                                <img src="{{ asset('gallery/'.$gallery->photo) }}" class="img-fluid px-6" style="height:100px; width: 120px; border-radius: 7px;">
                                            </div>
                                            @endforeach

                                        </div>
                                        <!--/Grid row-->
                                    </div>

                                    <!-- First slide -->

                                    <!-- Third slide -->
                                    <div class="carousel-item carousel-item-next carousel-item-right">
                                        <div class="row">

                                            @foreach($galleries as $gallery)
                                            <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                                                <img src="{{ asset('gallery/'.$gallery->photo) }}" class="img-fluid px-6" style="height:100px; width: 120px; border-radius: 7px;">
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <!-- Third slide -->

                                    <!-- Third slide -->
                                    <div class="carousel-item carousel-item-next carousel-item-left">
                                        <div class="row">

                                            @foreach($galleries as $gallery)
                                            <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                                                <img src="{{ asset('gallery/'.$gallery->photo) }}" class="img-fluid px-6" style="height:100px; width: 120px; border-radius: 7px;">
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <!-- Third slide -->
                                </div>
                            </div>
                            <!-- Logo carousel -->

                            <hr>

                        </div>

                    </div>
                    <!--/.Card-->

                    <!--Comments-->
                    <div class="card card-comments mb-3 wow fadeIn">
                        <div class="card-header font-weight-bold">All comments</div>
                        <div class="card-body">

                            @forelse($article->comments as $comment)    
                            <div class="media d-block d-md-flex mt-4">
                                <img class="d-flex mb-3 mx-auto rounded-circle" src="{{ asset('profile_images/'.$comment->user->photo) }}" alt="Generic placeholder image" width="35" height="35">
                                <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                    <h5 class="mt-0 font-weight-bold"> {{ $comment->user->fullname }}
                                        <a href="" class="pull-right">
                                            <i class="fas fa-reply"></i>
                                        </a>
                                         <p class="float-right">{{ \Carbon\Carbon::parse($comment->created_at)->diffForhumans() }}</p>
                                    </h5>
                                    {{ $comment->body }}
                                    <br>
                                    <!-- Button delete or edit -->
                                    @if(auth()->user()->id == $comment->user_id)
                                    <a href="#{{$comment->id}}" class="btn btn-primary btn-sm btn-xs" data-toggle="modal" data-target="#exampleModal{{ $comment->id }}">
                                        <i class="nav-icon far fa-edit"></i>
                                    </a>
                                    <form action="{{route('comment.destroy',$comment->id)}}" method="POST" class="float-left" style="margin-right: 4px;">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-sm btn-danger btn-xs" type="submit" value="Delete">
                                    </form>
                                    @endif
                                    <!--END Button delete or edit -->

                                    <button class="btn btn-xs btn-info float-right" onclick="toggleReply('{{ $comment->id }}')">Reply</button>
                                    <br>
                                    <!-- Reply FORM -->
                                    <div class="reply-form-{{ $comment->id }} hidden" style="margin-left: 40px;">
                                        <br>
                                        <form action="{{ route('replycomment.store', $comment->id) }}" method="post" accept-charset="utf-8" role="form">
                                            @csrf
                                            <div class="form-group-append">
                                                <label for="">Reply Comment</label>
                                                <input type="text" class="form-control" name="body" style="height: 30px; background-color: transparent;">
                                            </div>
                                            <button type="submit" class="btn btn-success" style="margin: 10px 0px 20px 0px;">Reply</button>
                                        </form>
                                    </div>
                                    <hr>
                                    @foreach($comment->comments as $reply)
                                    <div class="media d-block d-md-flex mt-3">
                                        <img class="d-flex mb-3 mx-auto rounded-circle" src="{{ asset('profile_images/'.$reply->user->photo) }}" alt="Generic placeholder image" style="width: 25px; height: 25px;">
                                        <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                            <h5 class="mt-0 font-weight-bold">{{ $reply->user->fullname }}
                                                <a href="" class="pull-right">
                                                    <i class="fas fa-reply"></i>
                                                </a>
                                            </h5>
                                            {{ $reply->body }}
                                            <!-- Button delete or edit -->
                                            @if(auth()->user()->id == $comment->user_id)
                                            <a href="#{{$reply->id}}" class="btn btn-primary btn-xs float-right" data-toggle="modal" data-target="#exampleModal{{ $reply->id }}">
                                                <i class="nav-icon far fa-edit"></i>
                                            </a>
                                            <form action="{{route('comment.destroy',$comment->id)}}" method="POST" class="float-right" style="margin-right: 4px;">
                                                @csrf
                                                @method('DELETE')
                                                <input class="btn btn-sm btn-danger btn-xs" type="submit" value="Delete">
                                            </form>
                                            @endif
                                            <!--END Button delete or edit -->
                                        </div>
                                    </div>
                                    <!-- REPLY FORM -->
                                    @if(auth()->user()->id == $reply->user_id)
                                    <div class="action">
                                        <!-- Modal -->
                                        <div class="modal text-dark" id="exampleModal{{ $reply->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-dark text-white">
                                                        <h4 class="modal-title" id="userCrudModal">Edit Komentar</h4>
                                                    </div>
                                                    <div class="modal-body col-md-12">
                                                        <form action="{{ route('comment.update', $reply->id) }}" method="post" accept-charset="utf-8" role="form">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group" class="col-md-12">
                                                                <textarea class="form-control text-dark " name="body" style="width: 100%; border: 1px solid black;">{{ $reply->body }}</textarea>
                                                            </div>
                                                            <button type="submit" style="background-color: blue; border-radius: 5px; color: black;">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                    @endforeach
                                </div>
                            </div>
                                <!--/.Comments-->
                                @if(auth()->user()->id == $comment->user_id)
                                <div class="action">
                                    <!-- Modal -->
                                    <div class="modal text-dark" id="exampleModal{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark text-white">
                                                    <h4 class="modal-title" id="userCrudModal">Edit Komentar</h4>
                                                </div>
                                                <div class="modal-body col-md-12">
                                                    <form action="{{ route('comment.update', $comment->id) }}" method="post" accept-charset="utf-8" role="form">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group" class="col-md-12">
                                                            <textarea class="form-control text-dark " name="body" style="width: 100%; border: 1px solid black;">{{ $comment->body }}</textarea>
                                                        </div>
                                                        <button type="submit" style="background-color: blue; border-radius: 5px; color: black;">Simpan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <!--/.Reply-->
                                
                            @empty
                            <p class="text-center">Belum ada komentar.</p>
                                
                            @endforelse
                        </div>
                    </div>




                    <!--Comment-->
                    <div class="card mb-3 wow fadeIn">
                        <div class="card-header font-weight-bold">Beri komentar</div>
                        <div class="card-body">

                            <!-- Default form reply -->
                            <form action="{{ route('articlecomment.store', $article->slug) }}" method="post" accept-charset="utf-8" role="form">
                                @csrf
                                <!-- Comment -->
                                <div class="form-group">
                                    <label for="replyFormComment">Komentar anda</label>
                                    <textarea class="form-control" id="replyFormComment" rows="5" name="body" placeholder="Isi Komentar ..."></textarea>
                                </div>

                                <div class="text-center mt-4">
                                    <button class="btn btn-info btn-md col-md-12" type="submit">Post</button>
                                </div>
                            </form>
                            <!-- Default form Comment -->

                        </div>
                    </div>
                    <!--/.Comment-->


                    <!--Card-->
                    <div class="card mb-4 wow fadeIn">

                        <!--Card content-->
                        <div class="card-body">
                            
                            <p class="mb-0">Latest Article</p>
                            <lead class="float-right">{{ \Carbon\Carbon::parse($article->created_at)->format('D, d-M-Y') }} &nbsp;</lead>
                            <p class="h3 my-4">{{ \Illuminate\Support\Str::title($latest_article->title) }}</p>

                                <img src="{{ asset('article/'.$latest_article->image) }}" class="card-img-top" height="320" style="border-radius: 4px;">

                            <p class="h5 my-4">
                                @foreach($latest_article->categories as $category)
                                    <a href="{{ route('category.article', $category->name) }}" class="btn btn-xs btn-info" style="width: 11%;">  {{ \Illuminate\Support\Str::title($category->name) }} &nbsp; </a>
                                @endforeach
                                <a href="" class="btn btn-sm btn-primary float-right">Lanjukan baca...</a>
                            </p>

                            <p>{!! Illuminate\Support\Str::words($article->content, 70) !!}</p>

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4 mb-4">

                    <!--Card-->
                    <div class="card mb-4 wow fadeIn">

                        <div class="card-header">Related articles</div>

                        <!--Card content-->
                        <div class="card-body">

                            <ul class="list-unstyled">
                            	@foreach($articles as $article)
                                <li class="media">
                                    <img class="d-flex mr-3" src="{{ asset('article/'.$article->image) }}" alt="Generic placeholder image" height="85" width="85">
                                    <div class="media-body">
                                        <a href="{{ route('front.article.show', $article->slug) }}">
                                            <h5 class="mt-0 mb-1 font-weight-bold">{{ $article->title }}</h5>
                                        </a>
                                        {!! Illuminate\Support\Str::limit($article->content, 45) !!}
                                    </div>
                                </li>
                            	@endforeach
                            </ul>

                        </div>

                    </div>
                    <!--/.Card-->

                    <!--Card-->
                    <div class="card mb-4 wow fadeIn">

                        <div class="card-header">Categories</div>

                        <!--Card content-->
                        <div class="card-body">

                            <ul class="list-unstyled">
                            	@foreach($categories as $category)
                                    <a href="{{ route('category.article', $category->name) }}" class="btn btn-xs btn-info" style="width: 100%;">  {{ \Illuminate\Support\Str::title($category->name) }} &nbsp; </a><br><br>
                                @endforeach
                            </ul>

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </section>
        <!--Section: Post-->

    </div>
</main>
@endsection

@section('js')
  <!-- Glyphicon -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
	new WOW().init();

    let id;
    $(this).data('id');

    $('#id').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus').show();
    })

    function toggleReply(commentId){
        $('.reply-form-'+commentId).toggleClass('hidden');
    }
</script>
@endsection