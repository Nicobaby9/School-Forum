@extends('layouts.admin')

@section('content')
<div class="container">
	<a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Create New Category</a>
	 <div class="row">
	 	<div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
	 		<div class="card-body">
	            <div class="tab-content">
	                <div class="collapse multi-collapse" id="multiCollapseExample1">
	                	<form role="form" action="{{ route('books-category.store') }}" method="post">
					        @csrf
					        <div class="form-group">
					            <label>Name</label>
					            <input name="title" type="text" class="form-control" placeholder="Name" required>
					        </div>
					        <input type="submit" class="btn btn-info" value="Save">
					        <input type="reset" class="btn btn-danger" value="Reset">
					    </form>
	                </div>
	            </div>
	        </div>
	 		<div class="card" style="margin-top: 15px;">
 				<table class="table">
 					<thead class="thead-dark">
 						<tr>
	 						<th scope="col">No.</th>
							<th scope="col">Name</th>
							<th scope="col">Created at</th>
							<th scope="col">Action</th>
						</tr>
 					</thead>

 					<tbody>
			 		@forelse($categories as $key => $category)
 						<tr>
 							<td>{{ $key+=1 }}</td>
							<td>{{ \Illuminate\Support\Str::ucfirst($category->title) }}</td>
							<td>{{ \Carbon\Carbon::parse($category->created_at)->format('d-M-Y') }}</td>
				            <td>
				                <a href="{{ route('books-category.edit', $category->id) }}" class="btn btn-info btn-sm" style="float: left; margin-right: 5px;">Edit</a>
								<button class="btn btn-danger btn-flat btn-sm remove-category" data-id="{{ $category->id }}" data-action="{{ route('books-category.destroy',$category->id) }}"> Delete</button>
				            </td>
						</tr>
				 		@empty
			 				<td>There is no data.</td>
					 	@endforelse
 					</tbody>
 				</table>
	 		</div>
 		</div>
	 </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
  $("body").on("click",".remove-category",function(){
    var current_object = $(this);
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "error",
        showCancelButton: true,
        dangerMode: true,
        cancelButtonClass: '#DD6B55',
        confirmButtonColor: '#dc3545',
        confirmButtonText: 'Delete!',
    },function (result) {
        if (result) {
            var action = current_object.attr('data-action');
            var token = jQuery('meta[name="csrf-token"]').attr('content');
            var id = current_object.attr('data-id');

            $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
            $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
            $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
            $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
            $('body').find('.remove-form').submit();
        }
    });
});
</script>
@endsection