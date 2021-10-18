    @if (session('message'))
        {{ session('message') }}
    @endif

    <article>
	    <h1>{{ $blog->title }}</h1>
	    <p>{{ $blog->link }}</p>
	    <p><img src="{{ $blog->thumbs }}" alt="{{ $blog->title }}"></p>
	    <p>{{ $blog->text }}</p>
    </article>