<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Storage;
use DateTime;
use File;

use App\Models\MAPIHitLog;

class AutoDeleteTicketCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto_delete_ticket:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto delete ticket file image';

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
        // in order to save storage on the server
        // automatic delete the ticket image and the qr code image if it is past the arrival date
        $get_today_date = date("dFY");
        $dir = public_path('eticket/customer_eticket');
        $files = scandir($dir);
        if(is_array($files)){
            foreach($files as $file) {
                if ($file != '.' && $file != '..') {
                    $cut_file_arrival_date_name = strrpos($file, '-');
                    $file_arrival_date_name = substr($file, 0, $cut_file_arrival_date_name);
                    $file_name = $file_arrival_date_name.'.png';

                    if ($file_arrival_date_name < $get_today_date) {
                        $image_path = public_path("eticket/customer_eticket/".$file);
                        if(File::exists($image_path)) {
                            File::delete($image_path);
                        }

                        $qr_image_path = public_path("eticket/customer_eticket_qr_code/".$file);  
                        if(File::exists($qr_image_path)) {
                            File::delete($qr_image_path);
                        }
                    }
                }
            }
        }
    }
}
