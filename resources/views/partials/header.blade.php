<!-- header -->
    <div class="header">
        <div class="container">
            <div class="w3l_header_left">
                <ul>
                    <li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <a href="mailto:info@example.com">tienda@eycproveedores.com</a></li>
                    <li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> (010) 221 918 811</li>
                    @if (Auth::check())
                    <li>
                        Bienvenido, {{Auth::user()->name}}    
                    </li>
                    <li>
                        <a href="{{url('logout')}}">Logout</a>
                    </li>
                    @else
                        <li><a data-toggle="modal" href='#modal-login'>Login</a></li>
                    @endif
                </ul>
            </div>
            <div class="w3l_header_right">
                <ul class="social-icons">
                    <li><a href="#" class="icon icon-border facebook"></a></li>
                    <li><a href="#" class="icon icon-border twitter"></a></li>
                    <li><a href="#" class="icon icon-border instagram"></a></li>
                    <li><a href="#" class="icon icon-border pinterest"></a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <nav class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                    <div class="logo">
                        <h1><a class="navbar-brand" href="{{url('')}}"><span>Ventas</span> Hogar</a></h1>
                    </div>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                    <nav class="cl-effect-1" id="cl-effect-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="{{url('')}}">Home</a></li>
                            <li><a href="{{url('busqueda?tipo_venta=Venta')}}" class="hvr-bounce-to-bottom">Ventas</a></li>
                            <li><a href="{{url('busqueda?tipo_venta=Arriendo')}}" class="hvr-bounce-to-bottom">Arriendos</a></li>
                            <li><a href="{{url('contact')}}" class="hvr-bounce-to-bottom">Contacto</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
            <div class="w3ls_search">
                <div class="cd-main-header">
                    <ul class="cd-header-buttons">
                        <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
                    </ul> <!-- cd-header-buttons -->
                </div>
                <div id="cd-search" class="cd-search">
                    <form action="{{url('busqueda')}}" method="GET">
                        <input name="search" type="search" placeholder="Buscar tu casa ideal...">
                        <select name="ciudad_id" placeholder="Lugar">
                            <option value="" disabled="disabled" selected=""> Lugar </option>
                            @forelse (\App\Models\Ciudad::all() as $ciudad)
                                <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                            @empty
                                {{-- empty expr --}}
                            @endforelse
                        </select>
                        <select name="tipo_venta">
                            <option value="" disabled="disabled" selected=""> Arrriendo o Venta </option>
                            <option value="Arriendo"> Arriendo</option>
                            <option value="Venta"> Venta</option>
                        </select>
                        <select name="tipo">
                            <option value="" disabled="disabled" selected=""> Tipo </option>
                            <option value="Casa"> Casa</option>
                            <option value="Apartamento"> Apartamento</option>
                            <option value="Oficina"> Oficina</option>
                            <option value="Bodega"> Bodega</option>
                            <option value="Local"> Local</option>
                            <option value="Lote"> Lote</option>
                            <option value="Finca"> Finca</option>
                            <option value="Edifico"> Edifico</option>
                        </select>
                        <input type="submit" name="" value="Buscar">
                    </form>
                </div>
            </div>
            <!-- search-jQuery -->
                <script src="{{asset('js/main.js')}}"></script>
            <!-- //search-jQuery -->
        </div>
    </div>

    <div class="modal fade" id="modal-login">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Iniciar Sesión</h4>
                </div>
                <div class="modal-body">
                {!! Form::open(['method' => 'POST', 'url' => url('login'), 'class' => 'form-horizontal']) !!}
                
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']) !!}
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        {!! Form::label('password', 'Password') !!}
                        {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('password') }}</small>
                    </div>
                
                    <div class="btn-group">    
                        {!! Form::submit("Login", ['class' => 'btn btn-success']) !!}
                    </div>
                
                {!! Form::close() !!}
                    
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="{{url('contact')}}">Registrate</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<!-- //header -->