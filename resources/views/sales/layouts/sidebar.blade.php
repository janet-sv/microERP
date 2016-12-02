<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="/ventas/"><i class="fa fa-dashboard fa-fw"></i> Ventas</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> Clientes<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('customer.create') }}">Nuevo</a>
                    </li>
                    <li>
                        <a href="{{ route('customer.index') }}">Consultar</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-money fa-fw"></i> Precio de lista<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('listprice.create') }}">Nuevo</a>
                    </li>
                    <li>
                        <a href="{{ route('listprice.index') }}">Consultar</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-exclamation-circle fa-fw"></i> Condiciones de promociones<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('promocondition.create') }}">Nuevo</a>
                    </li>
                    <li>
                        <a href="{{ route('promocondition.index') }}">Consultar</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-star fa-fw"></i> Promociones<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Promoción por producto<span class="fa arrow"></span></a>                        
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="{{ route('promotionbyproduct.create') }}">Nuevo</a>
                            </li>
                            <li>
                                <a href="{{ route('promotionbyproduct.index') }}">Consultar</a>
                            </li>
                        </ul>                    
                    </li>
                    <li>
                        <a href="#">Promoción por agrupación de producto<span class="fa arrow"></span></a>  
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="{{route('promotionbygroup.create')}}">Nuevo</a>
                            </li>
                            <li>
                                <a href="{{route('promotionbygroup.index')}}">Consultar</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-file-o fa-fw"></i> Proforma<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('offer.create')}}">Nuevo</a>
                    </li>                    
                    <li>
                        <a href="#">Consultar</a>
                    </li>
                    
                    
                                        
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Pedido de venta<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Nuevo</a>
                    </li>                    
                    <li>
                        <a href="#">Consultar</a>
                    </li>                                    
                </ul>
            </li>            
        </ul>
    </div>
</div>