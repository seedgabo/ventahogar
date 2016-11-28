<div class="banner">
    <div id="kb" class="carousel kb_elastic animate_text kb_wrapper" data-ride="carousel" data-interval="6000" data-pause="hover">

        <!-- Wrapper-for-Slides -->
        <div class="carousel-inner" role="listbox">
            @forelse ($destacadas as $res)
            <div class="item  @if ($loop->first) active @endif">
            <a href="{{url('ver/'. $res->id)}}" title="">
                <img src="{{ $res->image->url or 'images/banner.jpg'}}" alt="" class="img-responsive" style="background-size: cover;" />
                <div class="carousel-caption kb_caption">
                        <h4 data-animation="animated flipInX">{!! $res->slogan !!}</h4>
                        <h3 data-animation="animated flipInX">{{$res->nombre}}</h3>
                </div>
            </a>
            </div>
            @empty
            @endforelse
        </div>
        
        <!-- Left-Button -->
        <a class="left carousel-control kb_control_left" href="#kb" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>

        <!-- Right-Button -->
        <a class="right carousel-control kb_control_right" href="#kb" role="button" data-slide="next">
            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
        
    </div>
</div>
