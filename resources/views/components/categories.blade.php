@if (!$result->isEmpty())
    <ul class="navbar-nav mr-auto">
        @foreach ($result as $item)
        <li class="nav-item"><a class="nav-link" href="/blog/catagory/{{$item->slug}}">{{$item->title}}</a></li>
        @endforeach  
    </ul>
@endif

