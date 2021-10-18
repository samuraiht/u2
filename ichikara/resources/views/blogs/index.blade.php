<header>
	<h1>1から始める農業生活</h1>
	<p>言語検索:input:textを置く予定</p>
	<a href="/blogs/create">記事を書く</a>
</header>
<nav>ページ送りリンク</nav>
<section>
	<h1>ブログ記事が表示される部分</h1>
@foreach($blogs as $blog)
<!-- 工夫する余地あり -->
    <img src="{{ $blog->thumbs }}" alt="{{ $blog->title }}" width="48px" height="auto">
    <a href="/blogs/{{ $blog->id }}">{{ $blog->title }}</a>
    <a href="/blogs/{{ $blog->id }}/edit">編集</a>

    <form action="/blogs/{{ $blog->id }}" method="POST" onsubmit="return confirm('本当に削除しますか?');">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit">削除</button>
    </form>
@endforeach
</section>
<nav>ページ送りリンク</nav>
<section>
	<h1>年月別に記事を表示する部分</h1>
</section>