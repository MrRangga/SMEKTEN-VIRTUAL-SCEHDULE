<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href={{asset('css/style.css')}} crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    {{-- navigation--}}
    @include('temp/nav')
    
    {{-- your template --}} 
    
    <div class="container">
    
        {{-- content of your blog --}}
    
        @yield('content')
    
        {{-- footer --}}
    
        
    
        {{-- end of your template --}}
    
    </div>
    @include('temp/footer')
    <!-- Optional JavaScript -->
      <script src="{{asset('js/jquery.min.js')}}"></script>
      <script src="{{asset('js/script.js')}}"></script>

  </body>
</html>