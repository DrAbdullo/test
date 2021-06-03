<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class SendMail extends Mailable
{
    use Queueable, SerializesModels;


    public  $mail, $name, $content, $id, $title, $date, $fileName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail, $name, $content, $id, $title, $date, $fileName)
    {
        $this->name = $name;
        $this->mail = $mail;
        $this->content = $content;
        $this->id = $id;
        $this->title = $title;
        $this->date = $date;
        $this->fileName = $fileName;
    }


    /**
     * build
     *
     * @return void
     */
    public function build()
    {
        return $this->from('mailer@mail.com')
            ->subject('New Request')
            ->view('mailtemp', (['name', 'title', 'content', 'mail', 'id', 'date', 'fileName']));
    }
}
