
      
                <ul class="list-group" id="menu">
                    <li href="#" class="list-group-item menu1 active">
                        DANH MỤC SẢN PHẨM
                    </li>
                    @foreach($theloai as $tl)
                    @if(count($tl->loaisp)>0)
                    <li href="#" class="list-group-item menu1">
                        {{$tl->Ten}}
                    </li>
                    <ul>
                        @foreach($tl->loaisp as $lt)
                        <li class="list-group-item">
                            <a href="loaisp/{{$lt->id}}/{{$lt->TenKhongDau}}.html">{{$lt->Ten}}</a>
                        </li>
                        @endforeach
                    </ul>
                   @endif
                  @endforeach
                </ul>
          
  