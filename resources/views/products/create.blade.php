@extends ('products.layout')

@section ('contant')
 
</div>
@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $item)
       <li>{{$item}}</li>
        @endforeach
    </ul>
@endif
 
   
</div>
<br>
<div class='container' p-5>
    
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">

        @csrf
       <div class="mb-3">
           <label for="" class="form-label">Name</label>
              <input type="text" class="form-control" name="name" >
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Detials</label>
              <textarea class="form-control" name="details" id="" rows="3"></textarea>
        </div>
        <div class="mb-3">
           <label for="" class="form-label">Image</label>
              <input type="file" class="form-control" name="image" >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection