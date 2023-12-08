<?php
namespace App\Http\Controllers;
use Akilliphone\MailService;
use App\Models\Home;
use App\Models\NewsLetter;
use FastRoute\Route;
use Illuminate\Http\Request;
class NewsLetterController extends Controller
{
    public function insert(Request $request)
    {
        $email = $request->input('email', null);
        $errors = [];
        $message = '';
        $html = '';
        if ($email) {
            $newsletter = NewsLetter::Where(['email' => $email])->first();
            if (!$newsletter) {
                $newsletter = new NewsLetter();
                $newsletter->email = $email;
                $newsletter->save();
            }
            $confirm_link =  '<br><a href="'.route('newsletter.confirm', ['email'=>$email, 'hash_token'=>_getHashToken($email)]) .'">Üyeliğinizi tamamlamak için tıklayınız</a>';
            $message = 'Bülten Üyelik kaydınız gerçekleşti. Üyeliğinizin aktif olması için gereken onay linkini email olarak gönderdik.'.$confirm_link;
            MailService::yazGonder($email, 'Bülten Üyeliği', $message);
            return _ReturnSucces($message, $html);
        } else {
            $message = 'Email bilgisi alınamadı. Lütfen tekrar deneyiniz.';
        }
        return _ReturnError($message, $html, $errors);
    }

    public function confirm(Request $request)
    {
        $email = $request->input('email', null);
        $hash_token = $request->input('hash_token', null);
        if(_verifyHashToken($email, $hash_token)){
            $newsletter = NewsLetter::Where(['email' => $email])->first();
            if ($newsletter) {
                $newsletter->email_verified_at = date('Y-m-d H:i:s');
                $newsletter->save();
                $request->session()->flash('flash-success', ['Tebrikler.', 'Bülten üyeliğiniz tamamlandı']);
                MailService::yazGonder($email, 'Tebrikler', 'Bülten üyeliğiniz tamamlandı');
            } else {
                $request->session()->flash('flash-error', ['Üzgünüz.', 'Bülten üyelik talebiniz bulunamadı']);
            }
        } else {
            $request->session()->flash('flash-error', ['Üzgünüz.', 'Bülten üyelik isteğiniz doğrulanamadı']);
        }
        return redirect()->route('index');
    }
}
