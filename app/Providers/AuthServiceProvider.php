<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // VerifyEmail::toMailUsing(function ($mail, $url){
        //     return (new MailMessage)->subject('Verifikasi Email Anda')
        //     ->line('Tekan tombol di bawah ini untuk verifikasi alamat email anda.')
        //     ->action('Verifikasi Alamat Email', $url)
        //     ->line('Jika anda tidak membuat akun, anda bisa mengabaikan email ini.');
        // });
    }
}
