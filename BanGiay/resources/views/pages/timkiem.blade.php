@extends('layout.index')
@section('content')
  <!-- Page Content -->

  
    <div class="container cachrow">
        <div class="row">
          <?php 
  function doimau($str,$tukhoa){
      return str_replace($tukhoa, "<span style='color:red!important;'>$tukhoa</span>", $str);
  }
   ?>
        <div class="title1">Tìm:{{$tukhoa}}</div>
         <hr class="ngan">
        @foreach($chitiet as $ct)
        <div class="col-md-3">  
          <a href="chitiet/{{$ct->id}}/{TEN_KHONG_DAU}.html">
            <div class="card text-center">
                        <img class="card-img-top img-responsive" src="upload/chitiet/{{$ct->Hinh}}" alt="Card image cap" style="height: 300px;">
                        <div class="card-body">
                            <h4 class="card-title">{!!doimau($ct->TomTat,$tukhoa)!!}</h4>
                        </div>
                    </div>     
          </a>      
          </div>  
           @endforeach
        </div>
          

    </div>
@endsection