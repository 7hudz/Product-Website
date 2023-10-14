@extends ('products.layout')

@section ('contant')
</div>
   
</div>
<br>
<div class='container' p-5>
    
    
        
       <div class="mb-3">
           
             <h3>Name : {{"$product->name"}}</h3> 
        </div>
        <div class="mb-3">
            {{$product->details}}
        </div>
        <div class="mb-3">

            <img src="/images/{{$product->image}}" width='200px' height="200px">
              
        </div>
        
    
</div>

@endsection