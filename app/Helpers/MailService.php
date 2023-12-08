<?php
namespace Akilliphone;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
class MailService{
    static function newsLetterInsert($to){
        if($to){
            $data['email']=$to;
            $body = view('emails.news-letter-insert', $data);
            $subject = 'Akıllı Phone Bülten Kaydı';
            self::sendEmail($to, $subject, $body);
        }
    }
    static function resetPassword($email,$password){
        $data['email']=$email;
        $data['password']=$password;
        if(isset($email)){
            $to = $email;
            $body = view('emails.reset-password', $data);
            $subject = 'Akıllı Phone Yeni Şifre';
            self::sendEmail($to, $subject, $body);
        }
    }
    static function newOrder($data){
        if(isset($data['order']) && isset($data['order']['orderCustomer'])){
            $to = $data['order']['orderCustomer']['email'];
            $body = view('emails.new-order', $data);
            $subject = 'Siparişiniz Hakkında';
            self::sendEmail($to, $subject, $body);
            self::sendEmail('balcioglualisahin@gmail.com', $subject, $body);
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
