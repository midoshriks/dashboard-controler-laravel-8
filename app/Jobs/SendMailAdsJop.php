<?php

namespace App\Jobs;

use App\Models\User;
use App\Mail\SendMailAds;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendMailAdsJop implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $emails;

    public $title;
    public $body;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($emails, $title, $body)
    {
        $this->emails = $emails;

        $this->title = $title;
        $this->body = $body;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // dd(
        //     $this->title,
        //     $this->body,
        //     $this->emails,
        // );

        $emails = [];
        $emails = $this->emails;


        // Mail::to($this->emails) //midoshriks36@gmail.com
        //     ->send(new SendMailAds(
        //         '$this->emails',
        //         $this->title,
        //         $this->body,
        //         // 'send',
        //         // 'test',
        //     ));

        // dd('success');

        foreach ($emails as $key => $email) {
            // dd($email);
            Mail::to($email) //midoshriks36@gmail.com
                ->send(new SendMailAds(
                    $email,
                    $this->title,
                    $this->body,
                    // 'send',
                    // 'test',
                ));
        }

        dd('success');

    }
}
