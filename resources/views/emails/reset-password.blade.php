<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
</head>
<body style="margin:0; padding:24px; background-color:#f4f6f9; font-family:Arial, Helvetica, sans-serif; color:#2f3542;">
  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:680px; margin:0 auto;">
    <tr>
      <td style="text-align:center; padding:12px 0 24px 0;">
        @if($logoDataUri)
          <img src="{{ $logoDataUri }}" alt="PT Primantara Nusa Samasta" style="max-width:280px; width:100%; height:auto;">
        @else
          <div style="font-size:28px; font-weight:700; color:#1f3f68;">PT Primantara Nusa Samasta</div>
        @endif
      </td>
    </tr>
    <tr>
      <td style="background-color:#ffffff; border-radius:18px; padding:40px 34px; border-top:4px solid #ed5d17; border-bottom:4px solid #1f3f68; box-shadow:0 10px 30px rgba(31,63,104,0.08);">
        <div style="font-size:32px; font-weight:700; color:#1f3f68; margin-bottom:20px;">
          Halo{{ !empty($recipientName) ? ', ' . $recipientName : '' }}
        </div>
        <div style="font-size:18px; line-height:1.7; color:#4b5563; margin-bottom:26px;">
          Kami menerima permintaan untuk mengatur ulang password akun Anda.
        </div>

        <div style="text-align:center; margin:34px 0;">
          <a href="{{ $resetUrl }}" style="display:inline-block; background-color:#1f3f68; color:#ffffff; text-decoration:none; padding:14px 28px; border-radius:10px; font-weight:700;">
            Reset Password
          </a>
        </div>

        <div style="font-size:18px; line-height:1.7; color:#4b5563; margin-bottom:18px;">
          Link reset password ini berlaku selama {{ $expireMinutes }} menit.
        </div>
        <div style="font-size:18px; line-height:1.7; color:#4b5563; margin-bottom:24px;">
          Jika Anda tidak merasa meminta reset password, abaikan email ini.
        </div>

        <div style="font-size:18px; line-height:1.7; color:#4b5563; margin-bottom:28px;">
          Regards,<br>
          <strong>PT Primantara Nusa Samasta</strong>
        </div>

        <div style="border-top:1px solid #e5e7eb; padding-top:24px; font-size:14px; line-height:1.7; color:#6b7280; word-break:break-all;">
          Jika tombol "Reset Password" tidak bisa diklik, salin dan buka tautan berikut di browser Anda:<br>
          <a href="{{ $resetUrl }}" style="color:#1f3f68;">{{ $resetUrl }}</a>
        </div>
      </td>
    </tr>
  </table>
</body>
</html>
