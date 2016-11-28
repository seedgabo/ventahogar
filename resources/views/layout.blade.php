<!DOCTYPE html>
<html>
<head>
<title>VentasHogar .com</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Ventas Hogar" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
 @yield('before_styles')
<!-- //for-mobile-apps -->
<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="{{asset('css/ken-burns.css')}}" type="text/css" media="all" />
<link rel="stylesheet" href="{{asset('css/animate.min.css')}}" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{asset('js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('js/easing.js')}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){     
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<!-- start-smoth-scrolling -->
</head>

	<body>
		@yield('content')

	    <script src="{{asset('js/bootstrap.js')}}"></script>

	    <script type="text/javascript">
	        $(document).ready(function() {
	            
	                var defaults = {
	                containerID: 'toTop', // fading element id
	                containerHoverID: 'toTopHover', // fading element hover id
	                scrollSpeed: 1200,
	                easingType: 'linear' 
	                };
	            
	                                
	            $().UItoTop({ easingType: 'easeOutQuart' });
	                                
	            });
	    </script>
	    {{-- <script src="{{asset('js/custom.js')}}"></script> --}}
	    @yield('after_scripts')
	</body>
</html>