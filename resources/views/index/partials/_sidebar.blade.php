
@include('partials.search')


{{--filter by categories--}}
<div class="panel panel-default">
    <div class="panel-heading">Filter by Category</div>

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

</div>


{{--filter by states--}}
{{--
<div class="panel panel-default">
    <div class="panel-heading">Filter by Area</div>

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="list-group">

            <div role="tab" id="headingOne">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="list-group-item">San Francisco</a>
                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="list-group">
                        <a href="#" class="list-group-item">Test 1</a>
                        <a href="#" class="list-group-item">Test 2</a>
                        <a href="#" class="list-group-item">Test 3</a>
                        <a href="#" class="list-group-item">Test 4</a>
                    </div>
                </div>
            </div>

            <div role="tab" id="headingTwo">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" class="list-group-item">San Francisco</a>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="list-group">
                        <a href="#" class="list-group-item">Test 1</a>
                        <a href="#" class="list-group-item">Test 2</a>
                        <a href="#" class="list-group-item">Test 3</a>
                        <a href="#" class="list-group-item">Test 4</a>
                    </div>
                </div>
            </div>

            <div role="tab" id="headingThree">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree" class="list-group-item">San Francisco</a>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="list-group">
                        <a href="#" class="list-group-item">Test 1</a>
                        <a href="#" class="list-group-item">Test 2</a>
                        <a href="#" class="list-group-item">Test 3</a>
                        <a href="#" class="list-group-item">Test 4</a>
                    </div>
                </div>
            </div>

            <div role="tab" id="headingFour">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour" class="list-group-item">San Francisco</a>
                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                    <div class="list-group">
                        <a href="#" class="list-group-item">Test 1</a>
                        <a href="#" class="list-group-item">Test 2</a>
                        <a href="#" class="list-group-item">Test 3</a>
                        <a href="#" class="list-group-item">Test 4</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>--}}



{{--filter by area--}}
<div class="panel panel-default">
    <div class="panel-heading">Filter by Area</div>

    @if(!empty($states))

        <ul class="metismenu" id="menu">
            {{--<li>
                <a href="#" aria-expanded="false">Menu 1 <span class="fa arrow"></span></a>

                <ul aria-expanded="false">
                    <li><a href="#">Sub Menu 1</a></li>
                </ul>
            </li>

            <li>
                <a href="#" aria-expanded="false">Menu 2 <span class="fa arrow"></span></a>
                <ul aria-expanded="false">
                    <li><a href="#">Sub Menu 2</a></li>
                </ul>
            </li>

            <li>
                <a href="#" aria-expanded="false">Menu 3 <span class="fa arrow"></span></a>
                <ul aria-expanded="false">
                    <li><a href="#">Sub Menu 3</a></li>
                </ul>
            </li>

            <li>
                <a href="#" aria-expanded="false">Menu 4 <span class="fa arrow"></span></a>
                <ul aria-expanded="false">
                    <li><a href="#">Sub Menu 4</a></li>
                </ul>
            </li>--}}

            @foreach($states as $state)

                <li>
                    <a href="#" aria-expanded="false">{{ $state->state }} <span class="fa arrow"></span></a>

                    @if(!empty($state->cities->toArray()))

                        <ul aria-expanded="false">

                            @foreach($state->cities as $city)
                                <li><a href="#">{{ $city->city }}</a></li>
                            @endforeach

                        </ul>

                    @endif
                </li>

            @endforeach

            <li>
                <a href="#" aria-expanded="false">Menu 4 <span class="fa
                 arrow"></span></a>
                <ul aria-expanded="false" class="collapse">
                    <li>
                        <a href="#">Sub Menu 4 <span class="fa arrow"></span></a>

                        <ul aria-expanded="false" class="collapse">
                            <li><a href="#">Sub Sub Menu 4</a></li>
                            <li><a href="#">Sub Sub Menu 4</a></li>
                            <li><a href="#">Sub Sub Menu 4</a></li>
                        </ul>

                    </li>

                </ul>
            </li>

        </ul>

    @endif
</div>
