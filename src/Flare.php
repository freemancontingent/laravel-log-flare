<?php

namespace Freemancontingent\Laravellogflare;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

use Log;
use Carbon\Carbon;
use Mail;

class Flare extends Model
{
    /**
     * The current date
     *
     * @var Carbon\Carbon
     */
    protected $today;

    /**
     * The file name
     *
     * @var mixed
     */
    protected $log_file;

    /**
     * Create a new class list instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->today = new Carbon();
        if(config('app.log')=='daily') {
            $this->log_file = File::get(base_path().'/storage/logs/laravel-'.$this->today->toDateString().'.log');
        }elseif(config('app.log')=='single') {
            $this->log_file = File::get(base_path().'/storage/logs/laravel.log');
        }else {
            $this->log_file = null;
        }
    }

    /**
     * Create a new class list instance.
     *
     * @return void
     */
    public function firing()
    {
        if(config('logflare.log'))
            Log::info('[LogFlare]:: Cheking daily logs!');
        $monolog = Log::getMonolog();
        $env = $monolog->getName();
        $error_codes = Array();
        foreach (config('logflare.level') as $level) {
            array_push($error_codes,$env.'.'.strtoupper($level).': ');
        }
        $message_lines = array();
        $counter = 1;

        if(!empty($this->log_file)){
            foreach(preg_split("/((\r?\n)|(\r\n?))/", $this->log_file) as $line){
                foreach ($error_codes as $code) {
                    if (strpos($line, $code) !== false) {
                        $message_lines[$counter] = mb_strimwidth($line, 0, 250, "...");
                    }
                }

                $counter++;
            }
        }else{
            Log::info('[LogFlare]:: There is no file to check!');
            return;
        }

        if(count($message_lines)>0) {
            $header = array(
                        'subject' => config('logflare.subject').' - #'.time(),
                        'to' => config('logflare.support_email'),
                        'toName' => config('logflare.support_email_name')
                    );
            if(config('logflare.custom_email_template')) {
                $template = 'freemancontingent.logflare.email';
            }else{
                $template = 'logflare::email';
            }

            Mail::send($template, ['data'=>$message_lines,'link'=>config('logflare.log_viewer_link')], function ($message) use ($header) {
                $message->to($header['to']);
                $message->subject($header['subject']);
            });
        };
        if(config('logflare.log'))
          Log::info('[LogFlare]:: Cheking daily logs finished!');

        return;
    }
}
