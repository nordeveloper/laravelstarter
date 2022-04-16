<P>News feed</P>
<div class="row">
    @foreach ($result as $item)
    <div class="col-md-12 blog-small">
        <div class="blog-title">
            <h3><a href="/blog/{{$item->id}}">{{$item->title}}</a></h3>
        </div>
        <p>{{$item->created_at}}</p>
    </div>
    @endforeach
</div>