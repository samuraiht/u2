<form method="POST" action="/blogs">
    {{ csrf_field() }}
    <input type="text" name="title">
    <input type="text" name="text">
    <input type="text" name="link">
    <input type="file" name="thumbs"><!-- 非同期通信でアップロードさせるのも一つの案としてあり -->
    <input type="submit">
</form>