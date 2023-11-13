<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
        <!-- Theme style -->
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js','resources/sass/app.scss'])
        <style>
          @media print {
            .noPrint {
              display: none;
            }
          }
          @keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <livewire:layout.navigation />

            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="{{asset('css/all.min.js')}}"></script>
        <script src="{{asset('css/jquery.min.js')}}"></script>
        <script src="{{asset('css/bootstrap.bundle.min.js')}}"></script>
        <script>
           function closeAlert(){
            var aler = document.querySelector('.alertSession');
                aler.parentNode.removeChild(aler);
            };

             // calcuate change
   $(document).on('input','#recievedAmount',function(){
    var totalAmount = $(".btn-payment").attr('data-totalAmount');
    var recievedAmount = $(this).val();
    var total_price = $('#total_price').val();
    var changeAmount = recievedAmount - total_price;
    $(".changeAmount").html("Total Change: $" + changeAmount);

    //check if cashier enter the right amount, then enable or disable save payment button

    if(changeAmount >= 0){
      $('.btn-save-payment').prop('disabled', false);
    }else{
      $('.btn-save-payment').prop('disabled', true);
    }

  });
        </script>
    </body>
</html>
