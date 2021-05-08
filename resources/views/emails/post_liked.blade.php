@component('mail::message')
Your post liked

{{ $liker->username }} liked one of your post

@component('mail::button', ['url' => route('posts.show', $post)])
View post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
