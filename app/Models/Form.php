<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormSubmission;
use App\Mail\FormSubmissionAutoresponder;
use Illuminate\Http\Request;

class Form extends Model
{
    use HasBlocks, HasMedias, HasFiles, HasRevisions, HasSlug;

    protected $fillable = [
        'published',
        'title',
        'description',
        'recipients',
        'email_title',
        'email_content',
        'autoresponder_content',
        'autoresponder_title',
        'redirect_after_submit',
        'subject',
        'submit_text',
        'autoresponder_subject',
    ];

    public function getRecipients()
    {
        $recipients = \Str::of($this->recipients)->split('/[\s,]+/');
        return $recipients;
    }

    public function submit($data)
    {
        foreach ($this->getRecipients() as $recipient) {
            Mail::to($recipient)->send(new FormSubmission($this, $data));
        }
        if (isset($data['email'])) {
            Mail::to($data['email'])
                ->send(new FormSubmissionAutoresponder($this, $data));
        }
        if (isset($data['email_address'])) {
            Mail::to($data['email_address'])
                ->send(new FormSubmissionAutoresponder($this, $data));
        }
        return redirect()->to($this->redirect_after_submit);
    }

    public function rules()
    {
        $inputs = $this->blocks;
        $rules = [];
        foreach ($inputs as $input) {
            if ($input->input('required')) {
                $name = \Str::slug($input->input('name'), '_');
                $rules[$name] = 'bail|required';
                if ($input->input('text_type') == 'email') {
                    $rules[$name] = $rules[$name] . '|email';
                }
            }
        }
        return $rules;
    }

    public function validate(Request $request)
    {
        $validated = $request->validate($this->rules());
        return $validated;
    }
}
