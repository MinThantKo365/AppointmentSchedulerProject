<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reset Your Password</title>
    {{-- bootstrap.css link --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div style="max-width: 600px; margin: 0 auto; font-family: Arial, sans-serif; background-color: #1A2226; color: #c7d5e0; border-radius: 8px; padding: 40px; text-align: center;">
  <!-- Logo centered -->
  {{-- <div style="text-align: center; margin-bottom: 10px;">
    <img src="/images/logo.png" alt="Mystic Nature Logo" style="max-width: 150px; display: block; margin: 0 auto;">
  </div> --}}

  <h1 style="font-size: 26px; color: #ffffff; margin-bottom: 20px;">Reminder Mail</h1>

  <p style="font-size: 16px; line-height: 1.6; color: #c7d5e0; margin-bottom: 30px;">
    You have the appointment in next 60 minutes(1 HOURS).
  </p>
  <p>{{ $applicant->title }}</p>


  <div style="border-top: 1px solid #2a475e; margin-top: 40px; padding-top: 20px; font-size: 12px; color: #708090;">
    &copy; {{ date('Y') }} Appointments Scheduler Project. All rights reserved.
  </div>
</div>
    {{-- bootstrap.js link--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
