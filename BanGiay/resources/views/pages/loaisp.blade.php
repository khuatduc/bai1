@extends('layout.index')
@section('content')
  <!-- Page Content -->
    <div class="container cachrow">
        <div class="row">
        <div class="title1">{{$thloai->Ten}}</div>
         <hr class="ngan">
        @foreach($loaisp as $sp)
        @foreach($sp->chitiet as $ct)
        <div class="col-md-3">  
          <a href="chitiet/{{$ct->id}}/{TEN_KHONG_DAU}.html">
            <div class="card text-center">
                        <img class="card-img-top img-responsive" src="upload/chitiet/{{$ct->Hinh}}" alt="Card image cap" style="height: 300px;">
                        <div class="card-body">
                            <h4 class="card-title">{!!$ct->TomTat!!}</h4>
                        </div>
                    </div>     
          </a>      
          </div>  
           @endforeach
           @endforeach
        </div>
          

    </div>
@endsection