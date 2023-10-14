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
    
    <form action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
        @method ('PUT')
        @csrf
       <div class="mb-3">
           <label for="" class="form-label">Name</label>
              <input type="text" class="form-control" name="name" value={{"$product->name"}} >
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Detials</label>
              <textarea class="form-control" name="details" id="" rows="3">
                {{$product->details}}
              </textarea>
        </div>
        <div class="mb-3">

            <img src="/images/{{$product->image}}" width='200px' height="200px">
              <input type="file" class="form-control" name="image" >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection