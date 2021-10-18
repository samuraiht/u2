<form method="POST" action="/blogs/{{ $blog->id }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="title" value="{{ $blog->title }}">
    <input type="text" name="text" value="{{ $blog->text }}">
    <input type="text" name="link" value="{{ $blog->link }}">
    <div>現在のサムネイル<img src="{{ $blog->thumbs }}" alt="{{ $blog->title }}"></div>
    <input type="file" name="thumbs"><!-- 将来的には非同期通信でアップロードが理想 -->
    <input type="submit">
</form>