<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>

<li><a href="{{ url('admin/residencia') }}"><i class="fa fa-home"></i> <span>Residencias </span></a></li>
<li><a href="{{ url('admin/contacto') }}"><i class="fa fa-users"></i> <span>Contactos </span></a></li>

<li class="header">Localidades</li>
<li><a href="{{ url('admin/ciudad') }}"><i class="fa fa-globe"></i> <span>Ciudades </span></a></li>
<li><a href="{{ url('admin/barrio') }}"><i class="fa fa-map-pin"></i> <span>Barrios </span></a></li>

<!-- ======================================= -->
<li class="header">{{ trans('backpack::base.user') }}</li>
<li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li>