<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomResetPasswordNotification extends Notification
{
    use Queueable;

    public function __construct(
        protected string $token
    ) {
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $resetUrl = route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ]);

        $expireMinutes = config('auth.passwords.' . config('auth.defaults.passwords') . '.expire');

        return (new MailMessage)
            ->subject('Reset Password Sistem Rekomendasi Cat')
            ->greeting('Halo,')
            ->line('Kami menerima permintaan untuk mengatur ulang password akun Anda.')
            ->action('Reset Password', $resetUrl)
            ->line("Link reset password ini berlaku selama {$expireMinutes} menit.")
            ->line('Jika Anda tidak merasa meminta reset password, abaikan email ini.');
    }
}
