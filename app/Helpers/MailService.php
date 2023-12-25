<?php
namespace Akilliphone;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
class MailService{
    static function yazGonder($to, $subject, $content){
        if($to){
            $data['subject']=$subject;
            $data['content']=$content;
            $data['hash_token']= _getHashToken($to);
            $body = view('emails.yaz-gonder', $data);
            self::sendEmail($to, $subject, $body);
        }
    }
    public static function resetPassword($email,$password){

        $data['email']=$email;
        $data['password']=$password;
        $to = $email;
        $body = view('emails.reset-password', $data);
        $subject = 'Akıllı Phone Yeni Şifre';
        $response = Http::withToken('token')->patch('https://api.duzzona.site/reset-password', [
            'UserName' =>$email,
            'NewPassword' =>  $password,
        ]);


        $responseData = json_decode($response->body(), true);

        if ($responseData['errors']==null){

            session()->flash('flash-success', ['Girmiş olduğunuz mail adresi sistemimizde kayıtlı ise şifreniz gönderilmiştir', 'Yönlendiriliyorsunuz.']);
            self::sendEmail($to, $subject, $body);
        }
        else{
            session()->flash('flash-error', ['Yeni Şifre Mailinize Gönderilemedi', 'Canlı destek ile irtibat kurabilirsiniz']);
        }





    }
    static function newOrder($data){
        if(isset($data['order']) && isset($data['order']['orderCustomer'])){
            $to = $data['order']['orderCustomer']['email'];
            $body = view('emails.new-order', $data);
            $subject = 'Siparişiniz Hakkında';
            self::sendEmail($to, $subject, $body);
            //self::sendEmail('balcioglualisahin@gmail.com', $subject, $body);
        }
    }
    private static function sendEmail($to, $subject, $body, $from=null) : bool
    {
        try {
            if(!$from){
                $from = env('MAIL_USERNAME');
            }
            $mailable = new AkilliEmail();

            $mailable
                ->from($from)
                ->to($to)
                ->subject($subject)
                ->html($body);

            $result = Mail::send($mailable);
            return true;
        } catch (\Symfony\Component\Mailer\Exception\TransportException $exception) {
            return false;
        }
    }
}

class AkilliEmail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return true;//$this->view('view.name');
    }
}
