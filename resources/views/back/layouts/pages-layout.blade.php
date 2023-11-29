
<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @php
                  $setting = DB::table('settings')->where('id',1)->first();
                  @endphp 
                  <link rel="icon" type="image/x-icon" href="images/{{$setting->logo}}">
    <base href="/">
    <!-- CSS files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="back/dist/css/tabler.min.css?1684106062" rel="stylesheet"/>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />  
    <link href="back/dist/css/tabler-flags.min.css?1684106062" rel="stylesheet"/>
    <link href="back/dist/css/tabler-payments.min.css?1684106062" rel="stylesheet"/>
    <link href="back/dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet"/>
    <link rel="stylesheet" href="https://unpkg.com/cropperjs/dist/cropper.css">
<script src="https://unpkg.com/cropperjs/dist/cropper.js"></script>

    @stack('stylesheets')
    <link href="back/dist/css/demo.min.css?1684106062" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
      /* Hide the default file input */
  #myFileInput {
    display: none;
  }

  /* Style the custom button */
  .file-input-button {
    display: inline-block;
    padding: 8px 16px;
    color: white;
    cursor: pointer;
  }
  .nest{
    top:0 ;
    left:0;
    width:fit-content;
  

  }

    </style>
    
  </head>
  <body >
    <script src="back/dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page">
@include('back.layouts.inc.header')
    
      <div class="page-wrapper">
          <div class="container-xl">
           @yield('pageheader')
        </div>
        <!-- Page body -->
        <div class="page-body">
         <div class="container-xl">
            @yield('content')
         </div>
        </div>
        @include('back.layouts.inc.footer')
      </div>
    </div>
    <!-- Libs JS -->
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
    <script src="back/dist/libs/apexcharts/dist/apexcharts.min.js?1684106062" defer></script>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js" integrity="sha512-6Hh5t357FBmgv+xCBoaF9Gbk6sEF00WCH5wC8R1uieSL1R4pN2HFZx/cyE/TdfW+dxtOBWcHF1ZYdV8XLbpprA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Tabler Core -->
    <script src="back/dist/js/tabler.min.js?1684106062" defer></script>
    <script src="back/dist/js/script.js"></script>
    @stack('scripts')
   
  </body>
</html>