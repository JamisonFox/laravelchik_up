<?php

namespace App\Console\Commands;

use App\Mail\BingoMail;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmailCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:email {email=defaultemail@mail.ru} {text=defaulttextlol}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command sends email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //ask
        //confirm
        //
       // $answer =$this->ask('qwqwewq?');
       // $this->info('answer');
        $email = $this->argument('email');
        $text = $this->argument('text');

        Mail::to('2616220@gmail.com')
        ->send(new BingoMail($email,$text));

        return Command::SUCCESS;
    }
}
