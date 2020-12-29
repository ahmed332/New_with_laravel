@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href={{ route('categories.create') }}  class="btn btn-success ">Add category</a>


</div>
<div class="card card-default">
    <div class="card-header">
        categories
    </div>
   <div class="card-body">
       <table class="table">
           <thead>
               <th>name</th>
           </thead>
           <tbody>
               @foreach ($categories as $category )
               <tr>
                   <td>
                       {{ $category->name }}

                   </td>
                   <td>
                        <a href="{{ route('categories.edit',$category->id  ) }}" class="btn btn-info btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $category->id }})" >Delete</button>
                </td>
               </tr>

               @endforeach
           </tbody>
       </table>



<form action="" method="post" id="DeletCategoryForm">
    @csrf
    @method('DELETE')

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
           are you sure deleting this category
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-danger">yes</button>
        </div>
                </div>
            </div>
            </div>
            </div>
    </div>
</form>



@endsection
@section('scripts')
<script>
    function handleDelete(id){

        var form = document.getElementById('DeletCategoryForm');
        form.action ='/categories/'+id
        console.log('delete',form);
        $('#deleteModal').modal('show')
    }
</script>

@endsection
