<legend>Select a Category</legend>

@include('partials.errors')
@include('partials.success')

<?php
//$offset = config('traydes.categories_per_page');
//$offset = round($categories->count() / 3);
$offset = 3;
$i = 1;
?>

@foreach($categories as $category)




    <li><a href="{{ url('user/new?c='.$category->id) }}">{{ $category->name }}</a></li>



    <?php $i++; ?>

@endforeach