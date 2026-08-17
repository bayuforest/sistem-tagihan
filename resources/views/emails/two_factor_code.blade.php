<!DOCTYPE html>
<html>
<head>
    <title>Kode Verifikasi 2FA</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #334155; padding: 20px; max-width: 600px; margin: 0 auto;">
    <h2 style="color: #0f172a;">Halo!</h2>
    <p>Anda mencoba untuk masuk ke Dashboard Admin Antapani City Mas.</p>
    <p>Untuk memastikan bahwa ini memang Anda, silakan masukkan kode verifikasi 6-digit berikut pada halaman login. Kode ini hanya berlaku selama <strong>10 menit</strong>.</p>
    
    <div style="background-color: #f1f5f9; padding: 20px; text-align: center; font-size: 32px; font-weight: bold; letter-spacing: 8px; color: #EAA315; border-radius: 8px; margin: 30px 0; border: 1px solid #e2e8f0;">
        {{ $token }}
    </div>
    
    <p>Jika Anda tidak merasa sedang mencoba masuk ke sistem, harap abaikan email ini atau segera hubungi Administrator dan ubah kata sandi Anda demi keamanan.</p>
    <br>
    <p>Salam hangat,<br><strong>Sistem Informasi Antapani City Mas</strong></p>
</body>
</html>
