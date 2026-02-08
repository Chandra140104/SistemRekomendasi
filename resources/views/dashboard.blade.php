<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

@if(session('login_success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Login Berhasil',
    text: 'Selamat datang',
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif

<h1>DASHBOARD</h1>
<p>Ini dashboard sementara</p>

</body>
</html>
