@component('mail::message')
# Welcome

Welcome aboard to a very fun ride.

@component('mail::button', ['url' => ''])
Sure np
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
