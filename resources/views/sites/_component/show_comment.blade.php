<header class="comment-header">
    <p class="comment-author">
        <img src="{{ Auth::user()->avatar }}" class="img-circle img-comment">
    </p>
    <p>
        <a href="">{{ Auth::user()->full_name }}</a><span> {{ trans('site.say') }}:</span>
    </p>
    <p>{{ $time }}</p>
    <p>{{ $content }}</p>
</header>   
