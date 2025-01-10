
@include('layouts.header')

</style>
<main>
  <div class="container py-4">

    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
   
      <div class='qrcodes'>
      <img src="{{ Url('/') }}/{{ $qrCodePath_350 }}" alt="QR Code" class="qr-code " />
                <div class="mt-6">
                    <a href="{{ Url('/') }}/{{ $qrCodePath_350 }}" download="350_{{ $shortUrl }}.svg" class="mt-6">Download SVG QR Code</a>
                </div>
            </div>
    </div>
    </div>
  </div>
</main>
 
 
  @include('layouts.footer')

