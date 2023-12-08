<?php
namespace App\Http\Controllers;
use Akilliphone\MailService;
use App\Models\Contact;
use App\Models\Home;
use App\Models\NewsLetter;
use FastRoute\Route;
use Illuminate\Http\Request;
class ContactController extends Controller
{
    public function insert(Request $request)
    {
        $errors = [];
        $message = '';
        $html = '';
        $iletisim =  $request->input('iletisim', []);
        $email = isset($iletisim['email'])?$iletisim['email']:'';
        if($email){
            $name = isset($iletisim['name'])?$iletisim['name']:'';
            $message = isset($iletisim['message'])?$iletisim['message']:'';
            $contact = new Contact();
            $contact->name = $name;
            $contact->email = $email;
            $contact->message = $message;
            $contact->save();
            $body = 'akilliphone.com sitesinden yeni bir iletişim isteği alındı.<hr>Gönderen: '.$name.'<br>Eposta: '.$email.'<br>Konu: '.$message;
            MailService::yazGonder(env('CONTACT_EMAIL', 'info@akilliphone.com'), 'İletişim İsteği', $body);
            $message = 'İletişim isteğinizi aldık. Sizinle en kısa sürede iletişim kuracağız.';
            return _ReturnSucces($message, $html);
        } else {
            $message = 'İletişim isteğiniz alınamadı. Lütfen tekrar deneyiniz.';
        }
        return _ReturnError($message, $html, $errors);
    }

}
