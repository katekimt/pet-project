<?php

namespace App\Jobs;

use App\Mail\WeatherMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class WeatherMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected  $email;

    protected  $data;

    protected  $city;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $data, $city)
    {
        $this->email = $email;
        $this->data = $data;
        $this->city = $city;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new WeatherMail($this->email, $this->data, $this->city));
    }
}
