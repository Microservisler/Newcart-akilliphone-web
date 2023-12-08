<?php
namespace App\Http\Controllers;
use Akilliphone\MailService;
use App\Models\Home;
use App\Models\NewsLetter;
use FastRoute\Route;
use Illuminate\Http\Request;
class NewsLetterController extends Controller{
    public function insert(Request $request){
        $email = $request->input('email', null);
        $errors = [];
        $message = '';
        $html = '';
        if($email){
            $newsletter = NewsLetter::Where(['email'=>$email])->first();
            if(!$newsletter){
                $newsletter = new NewsLetter();
                $newsletter->email = $email;
                $newsletter->save();
            }
            MailService::newsLetterInsert($email);
            $message = 'Üyelik Kaydınız Gerçekleşti';
            return _ReturnSucces($message, $html);
        } else {
            $message = 'Email bilgisi alınamadı. Lütfen tekrar deneyiniz.';
        }
        return _ReturnError($message, $html, $errors);
    }
}
