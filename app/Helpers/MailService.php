<?php
namespace Akilliphone;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
class MailService{
    static function newOrder($data){
        $body = view('emails.new-order', $data);
        $subject = 'Siparişiniz Hakkında';
        self::sendEmail('ahmethamdibayrak@mailinator.com', $subject, $body);
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
