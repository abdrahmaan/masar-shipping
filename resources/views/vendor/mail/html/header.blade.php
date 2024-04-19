@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
<img src="https://ucarecdn.com/7ac7bd8f-fb2f-4b4c-8541-9d5c5e7d6cd0/-/preview/200x200/" class="logo" alt="Laravel Logo">
<h3>

أطلس الذهبية للمصاعد

</h3>
@endif
</a>
</td>
</tr>
