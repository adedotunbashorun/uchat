@section('page-breadcrumbs')
    <li>
        <a href="{{route('admin.users.index')}}">Users</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="javascript:;">Edit User</a>
    </li>
@stop
{!! form_start($form,['class'=>'']) !!}
@include('core::admin._buttons-form',['top'=>true])
<div class="form-body">
    <div class="tabbable-custom">
        <ul class="nav nav-tabs ">
            <li class="active">
                <a href="#tab_1" data-toggle="tab">
                    Basic </a>
            </li>
            <li>
                <a href="#tab_2" data-toggle="tab">
                    Roles </a>
            </li>
            <li>
                <a href="#tab_3" data-toggle="tab">
                    Permissions </a>
            </li>
            <li>
                <a href="#tab_4" data-toggle="tab">
                    New Password </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <div class="row">
                    <div class="col-md-6">
                        {!! form_row($form->first_name) !!}
                    </div>
                    <div class="col-md-6">
                        {!! form_row($form->last_name) !!}
                    </div>
                    <div class="col-md-12">
                        {!! form_row($form->email) !!}
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_2">
                <div class="form-group">
                    <label>Select one or more roles</label>

                        <select multiple="" class="form-control" name="roles[]">
                            <?php foreach ($roles as $role): ?>
                            <option value="{{ $role->id }}" <?php echo $model->hasRoleId($role->id) ? 'selected' : '' ?>>{{ $role->name }}</option>
                            <?php endforeach; ?>
                        </select>
                </div>
            </div>
            <div class="tab-pane" id="tab_3">
                    @include('users::admin._permissions', ['model' => $model])
            </div>
            <div class="tab-pane" id="tab_4">
                    <div class="row">
                        <div class="col-md-6">
                            {!! form_row($form->password) !!}
                        </div>
                        <div class="col-md-6">
                            {!! form_row($form->confirm_password) !!}
                        </div>
                    </div>
            </div>

        </div>
    </div>
    {!! form_rest($form) !!}
</div>
@include('core::admin._buttons-form')
{!! form_end($form,false) !!}