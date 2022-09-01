<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

//use App\Actions\Fortify\CreateNewUser;

class CreateUserCommand extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'user:create {--u|username= : Username of the newly created user.} {--e|email= : E-Mail of the newly created user.}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Manually creates a new laravel user.';

	/**
	 * Execute the console command.
	 * https://laravel.com/docs/9.x/artisan
	 *
	 * @return int
	 */
	public function handle()
	{
		// Enter username, if not present via command line option
		$username = $this->option('username');
		if ($username === null)
		{
			$username = $this->ask('Please enter your username.');
		}

		// Enter email, if not present via command line option
		$email = $this->option('email');
		if ($email === null)
		{
			$email = $this->ask('Please enter your E-Mail.');
		}

		// Enter password from user input for more security.
		$password = $this->secret('Please enter a new password.');

		// Prepare input for the fortify user creation action
		$input = [
			'username'                  => $username,
			'email'                     => $email,
			'password'                  => bcrypt($password),
		];

		try
		{
			// Use fortify to create a new user.
			$new_user_action = new User();
			$user = $new_user_action->create($input);
		}
		catch (\Exception $e)
		{
			$this->error($e->getMessage());
			return;
		}
		// Success message
		$this->info('User created successfully!');
		$this->info('New user id: ' . $user->id);
	}
}
