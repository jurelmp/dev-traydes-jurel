<div class="modal fade" id="modal_category_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>
                <h4 class="modal-title">New Category</h4>
            </div>

            <div class="modal-body">

                <div id="err"></div>


                {!! Form::open(array('url' => 'admin/category-create', 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'category_new')) !!}

                @if(Request::has('id'))
                    {!! Form::hidden('parent_id', Request::get('id')) !!}
                @else
                    {!! Form::hidden('parent_id', 0) !!}
                @endif

                @include('admin.partials._category_form', ['test' => 'test value'])

                {!! Form::close() !!}


            </div>


        </div>
    </div>
</div>