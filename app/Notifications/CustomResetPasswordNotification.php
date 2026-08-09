<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\File;

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
        $logoPath = public_path('images/Logo/Primary-Logo-12-2048x615.png');
        $logoDataUri = null;

        if (File::exists($logoPath)) {
            $logoMime = File::mimeType($logoPath) ?: 'image/png';
            $logoBase64 = base64_encode(File::get($logoPath));
            $logoDataUri = "data:{$logoMime};base64,{$logoBase64}";
        }

        return (new MailMessage)
            ->subject('Reset Password Sistem Rekomendasi Cat')
            ->view('emails.reset-password', [
                'resetUrl' => $resetUrl,
                'expireMinutes' => $expireMinutes,
                'logoDataUri' => $logoDataUri,
                'recipientName' => $notifiable->name,
            ]);
    }
}
