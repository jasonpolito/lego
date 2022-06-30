<?php

namespace App\Mail;

use App\Models\Form;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormSubmissionAutoresponder extends Mailable
{
    use Queueable, SerializesModels;

    protected $form;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Form $form, $data)
    {
        $this->form = $form;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.form.autoresponder')
            ->subject($this->form->autoresponder_subject)
            ->with([
                'form' => $this->form,
                'data' => $this->data,
            ]);
    }
}
