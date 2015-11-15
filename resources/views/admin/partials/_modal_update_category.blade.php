<div class="modal fade" id="modal_category_update" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>
                <h4 class="modal-title">Edit Category</h4>
            </div>

            <div class="modal-body">

                <div id="err"></div>


                {!! Form::open(array('url' => 'admin/category-update', 'class' => 'form-horizontal', 'role' => 'form')) !!}

                {!! Form::hidden('category_id') !!}
                @include('admin.partials._category_form')


                {!! Form::close() !!}


            </div>


        </div>
    </div>
</div>