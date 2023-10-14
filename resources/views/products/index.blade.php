@extends('products.layout')

@section('contant')

<br>
@if ($message=Session::get('success'))
<div class="alert alert-success" role="alert">
    {{$message}}
  </div>
@endif
<div class="table-responsive">
    <table class="table table-striped
    table-hover	
    table-borderless
    table-primary
    align-middle">
        <thead class="table-light">
            
            <tr>
                <th>ID</th>  
                <th>Image</th>
                <th> Name</th>
                <th> Detials</th>
                <th width='200px'> Actions</th>
            </tr>
       </thead>
            <tbody class="table-group-divider">
                @foreach ($products as $item)
                <tr class="table-primary" >
                    <td>{{$item->id}}</td>
                    <td><img src="/images/{{$item->image}}" width='200px' height="200px"></td>
                    
                    <td>{{$item->name}}</td>
                    <td>{{$item->details}}</td>
                    <td>
                     
                         
                       
                    <form  action="{{route('products.destroy', $item->id)}}" method="post" class="d-flex justify-content-between flex-wrap" >
                        @auth
                        @csrf
                        @method ('DELETE')
                        <button type="submit" class="btn btn-danger" style="width: 50px;" >
                            
                            <img src="https://img.icons8.com/ios/452/delete-sign.png" alt="Delete Icon" width="20" height="20">
                            </button>
                    
                    <a class="btn btn-primary" href="{{route('products.edit', $item->id)}}">
                        <img src="https://img.icons8.com/ios/452/edit--v1.png" alt="Edit Icon" width="20" height="20">
                         </a>
                         @endauth
                    <a class="btn btn-info" href="{{route('products.show', $item->id)}}">
                        <img src="https://img.icons8.com/ios/452/visible.png" alt="Edit Icon" width="20" height="20">
                        </a>
                    </form>
                    </td>
                </tr>
                @endforeach
                
                
            </tbody>
            <tfoot>
                
            </tfoot>
    </table>
    {!!   $products -> links()  !!}
</div>

@endsection