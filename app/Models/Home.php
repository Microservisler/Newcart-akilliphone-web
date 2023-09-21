<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;
    public function get_section_category_data(){
        $data['title'] = "Öne Çıkan Kategoriler";
        $data['banner'] = './assets/images/vertical-banner.png';
        $data['items'] = [
            [
                'banner'=>'assets/images/product-category1.png',
                'product'=>[
                    "name"=>"1. Baseus SIMU S1 ANC TWS Bluetooth 5.1 Kulaklık DSP",
                    "url"=>"urun/1",
                    "image"=>"assets/images/product-images/1.png",
                    "price"=>"42.42TL",
                    "oldPrice"=>"52.42TL",
                ]
            ],
            [
                'banner'=>'assets/images/product-category2.png',
                'product'=>[
                    "name"=>"1. Baseus SIMU S1 ANC TWS Bluetooth 5.1 Kulaklık DSP",
                    "url"=>"urun/1",
                    "image"=>"assets/images/product-images/2.png",
                    "price"=>"42.42TL",
                    "oldPrice"=>"52.42TL",
                ]
            ],
            [
                'banner'=>'assets/images/product-category3.png',
                'product'=>[
                    "name"=>"1. Baseus SIMU S1 ANC TWS Bluetooth 5.1 Kulaklık DSP",
                    "url"=>"urun/1",
                    "image"=>"assets/images/product-images/3.png",
                    "price"=>"42.42TL",
                    "oldPrice"=>"52.42TL",
                ]
            ],
            [
                'banner'=>'assets/images/product-category4.png',
                'product'=>[
                    "name"=>"1. Baseus SIMU S1 ANC TWS Bluetooth 5.1 Kulaklık DSP",
                    "url"=>"urun/1",
                    "image"=>"assets/images/product-images/4.png",
                    "price"=>"42.42TL",
                    "oldPrice"=>"52.42TL",
                ]
            ]
        ];
        return $data;
    }
    public function get_section_image1_data(){
        $data['images'] = [
            [
                'desktop'=>'assets/images/banners/desktop-banner1.png',
                'mobile'=>'assets/images/banners/desktop-banner1.png',
            ]
        ];
        return $data;
    }
    public function get_section_image2_data(){
        $data['images'] = [
            [
                'desktop'=>'assets/images/banners/desktop-banner2.png',
                'mobile'=>'assets/images/banners/desktop-banner2.png',
            ]
        ];
        return $data;
    }
    public function get_section_firsat_data(){
        $data['title'] = "Sonbahar Fırsatı";
        $data['banner'] = './assets/images/vertical-banner.png';
        $data['products'] = [
            [
                "name"=>"1. Baseus SIMU S1 ANC TWS Bluetooth 5.1 Kulaklık DSP",
                "url"=>"urun/1",
                "image"=>"assets/images/product-images/1.png",
                "price"=>"42.42TL",
                "oldPrice"=>"52.42TL",
            ],
            [
                "name"=>"2. Baseus SIMU S1 ANC TWS Bluetooth 5.1 Kulaklık DSP",
                "url"=>"urun/1",
                "image"=>"assets/images/product-images/1.png",
                "price"=>"42.42TL",
                "oldPrice"=>"52.42TL",
            ],
            [
                "name"=>"3. Baseus SIMU S1 ANC TWS Bluetooth 5.1 Kulaklık DSP",
                "url"=>"urun/1",
                "image"=>"assets/images/product-images/1.png",
                "price"=>"42.42TL",
                "oldPrice"=>"52.42TL",
            ],
            [
                "name"=>"4. Baseus SIMU S1 ANC TWS Bluetooth 5.1 Kulaklık DSP",
                "url"=>"urun/1",
                "image"=>"assets/images/product-images/1.png",
                "price"=>"42.42TL",
                "oldPrice"=>"52.42TL",
            ],
            [
                "name"=>"5. Baseus SIMU S1 ANC TWS Bluetooth 5.1 Kulaklık DSP",
                "url"=>"urun/1",
                "image"=>"assets/images/product-images/1.png",
                "price"=>"42.42TL",
                "oldPrice"=>"52.42TL",
            ],
            [
                "name"=>"6. Baseus SIMU S1 ANC TWS Bluetooth 5.1 Kulaklık DSP",
                "url"=>"urun/1",
                "image"=>"assets/images/product-images/1.png",
                "price"=>"42.42TL",
                "oldPrice"=>"52.42TL",
            ],
            [
                "name"=>"7. Baseus SIMU S1 ANC TWS Bluetooth 5.1 Kulaklık DSP",
                "url"=>"urun/1",
                "image"=>"assets/images/product-images/1.png",
                "price"=>"42.42TL",
                "oldPrice"=>"52.42TL",
            ],
            [
                "name"=>"8. Baseus SIMU S1 ANC TWS Bluetooth 5.1 Kulaklık DSP",
                "url"=>"urun/1",
                "image"=>"assets/images/product-images/1.png",
                "price"=>"42.42TL",
                "oldPrice"=>"52.42TL",
            ],
            [
                "name"=>"9. Baseus SIMU S1 ANC TWS Bluetooth 5.1 Kulaklık DSP",
                "url"=>"urun/1",
                "image"=>"assets/images/product-images/1.png",
                "price"=>"42.42TL",
                "oldPrice"=>"52.42TL",
            ],
            [
                "name"=>"10. Baseus SIMU S1 ANC TWS Bluetooth 5.1 Kulaklık DSP",
                "url"=>"urun/1",
                "image"=>"assets/images/product-images/1.png",
                "price"=>"42.42TL",
                "oldPrice"=>"52.42TL",
            ]
        ];
        return $data;
    }

}
