<p>Hello {{ $admin->name }},</p>

<p>We received a request to reset the password for your admin account. If you did not request a password reset, please ignore this email.</p>

<p>To reset your password, click on the following link:</p>

<p><a href="{{ url('admin/reset-password', $token) }}">{{ url('admin/reset-password', $token) }}</a></p>

<p>The link will expire in 1 hour.</p>

<p>Thanks,<br>
Your App Name</p>
