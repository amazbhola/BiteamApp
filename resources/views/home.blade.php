<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Twitter Bootstrap shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <link href="{{ asset('assets/frontend/css/bootstrap.css') }}" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet"/>
    <!-- font awesome styles -->
	<link href="{{ asset('assets/frontend/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/frontend/ico/favicon.ico') }}">
  </head>
<body>
  <style>
    [class*="span"] {
  float: left;
  min-height: 1px;
  margin-left: 0px;
}
.thumbnails > li {
    float: left;
    margin-bottom: 20px;
    margin-left: 26px;
}
#singlepage {
    margin-left: 40px;
}
   
            .thumbnail img {
            max-width: 100%;
            min-height: 200px;
            max-height: 200px;
        }
        
  </style>

    <div id="vueApp">
       
    </div>



        <!-- Placed at the end of the document so the pages load faster -->
        <script src="{{ asset('assets/frontend/js/jquery.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/jquery.easing-1.3.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/jquery.scrollTo-1.4.3.1-min.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/shop.js') }}"></script>
        <script src="{{ mix('js/vue-app/main.js') }}"></script>
      </body>
    </html>
