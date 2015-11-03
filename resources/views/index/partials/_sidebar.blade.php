<div class="list-group">

    <?php $categories = \Traydes\Category::where('parent_id', 0)->get(); ?>
    @if(!empty($categories))
        @foreach($categories as $category)
            <a href="{{ url('t/view/'.$category->id) }}" class="list-group-item @if(Request::is('t/view/'.$category->id)) active @endif">{{ $category->name }}</a>

            @if(!empty($category->subCategories()) && Request::is('t/view/'.$category->id))
                @foreach($category->subCategories as $sub)
                        <a href="{{ url('t/view/'.$sub->id) }}" class="list-group-item @if(Request::is('t/view/'.$sub->id)) active @endif">{{ $sub->name }}</a>
                @endforeach
            @endif
        @endforeach
    @endif

</div>