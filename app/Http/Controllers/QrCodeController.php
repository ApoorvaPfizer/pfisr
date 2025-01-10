<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Url;

class QrCodeController extends Controller
{
    public function generate(string $id)
    {
        $url = Url::find($id);
        //$qrCode = QrCode::size(300)->generate($url->url);
        $publicPath_350 = public_path('qrcodes/350' . $url->url . '.svg');
        $qrCodePath_350 =  'qrcodes/350' . $url->url . '.svg';
        $qrCode_350 = QrCode::size(350)->generate($url->url, $publicPath_350);

        $data = [
            'shortUrl' => $url->url,
            'qrCode_350' => $qrCode_350,
            'qrCodePath_350' => $qrCodePath_350,          
        ];
        return view('qrcode', $data);
     
    }
}
