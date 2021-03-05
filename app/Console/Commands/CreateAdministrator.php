<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Actions\Fortify\CreateNewUser;

class CreateAdministrator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command creates user with administrator privilegies.';

    /**
     * Create a new command instance.
     *
     * @param CreateNewUser $createNewUser
     */
    public function __construct(CreateNewUser $createNewUser)
    {
        parent::__construct();
        $this->createNewUser = $createNewUser;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->createNewUser->create([
            'name' => 'Valentin Raguž',
            'email' => 'procelnik@opcina-velika.hr',
            'password' => 'lozinka1234',
            'password_confirmation' => 'lozinka1234',
            'is_admin' => true
        ]);

        $this->info('Administrator account created');
    }
}
