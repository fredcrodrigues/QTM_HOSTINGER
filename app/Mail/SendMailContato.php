<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Contato;

class SendMailContato extends Mailable
{
    use Queueable, SerializesModels;

    public $contato;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contato $contato)
    {
        $this->contato = $contato;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('QTM Healthtech')
        ->from('contato@qtmhealthtech.com.br','QTM Healthtech')
        ->view('mail.contato')
        ->with([
            'contato' => $this->contato,
        ]);
    }
}
