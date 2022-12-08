<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailAgendamentoCliente extends Mailable
{
    use Queueable, SerializesModels;

     /**
     * Create a new message instance.
     *
     * @return void
     */
    public $nome;

    public function __construct($nome)
    {
        $this->nome = $nome;
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
        ->view('mail.retorno_agendamento_cliente')
        ->with([
            'nome' => $this->nome
        ]);
    }
}
