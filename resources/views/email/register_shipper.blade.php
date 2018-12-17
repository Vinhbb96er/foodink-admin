@component('mail::message')

{!! trans('lang.register_shipper_mail.content', [
    'email' => $email,
    'password' => $password,
]) !!}

@component('mail::button', ['url' => route('login')])
    @lang('lang.signin')
@endcomponent

@endcomponent
