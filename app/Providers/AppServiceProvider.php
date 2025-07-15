<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
      VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
        return (new MailMessage())
          ->subject('🔐 Please Verify Your Email Address')
          ->greeting('Hello ' . $notifiable->name . ' 👋')
          ->line('Thank you for signing up! Before you can access all features, we need to confirm your email address.')
          ->line('Just click the button below to verify your email.')
          ->action('✅ Verify Email Now', $url)
          ->line("Didn't request this email? You can safely ignore it.")
          ->salutation('Best regards,')
          ->salutation(config('app.name') . ' Team');
      });
    }
}
