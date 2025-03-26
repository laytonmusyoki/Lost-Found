<x-mail::message>
# Forgot password

<p>Use this link to change your password {{route('auth.reset',$token)}} </p>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
