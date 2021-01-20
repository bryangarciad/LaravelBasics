<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Company;


class AddCompanyCommand extends Command
{

    protected $signature = 'modelCompany:add {name} {phone="N/A"}'; //you can use ? mark after parameter to define it as optional

    protected $description = 'Command description';

    public function handle()
    {

        $name = $this->ask('companys name?'); 

        $company = Company::create([
            'name' => $this->argument('name'),
            'phone' =>  $this->argument('phone')
        ]);

        $this->info('infor string');
    }
}
