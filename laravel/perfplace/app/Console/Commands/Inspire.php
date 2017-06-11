<?php
 
namespace App\Console\Commands;
 
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
use App\Twitt;
use Thujohn\Twitter\Facades\Twitter;
 
 class Inspire extends Command
 {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inspire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display an inspiring quote';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // $this->comment(PHP_EOL.Inspiring::quote().PHP_EOL);

        $twittData = array();
        $twittData['type'] = "SMOG";
        $twittData['text'] = "Aleea Frumoasa, nr 1234";
        $newTwitt = Twitt::create($twittData); 
        $this->comment($newTwitt); // nu se salveaza in baza de date
    }
}