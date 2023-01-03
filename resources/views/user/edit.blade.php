@extends('layout.main') @section('content')

@if(session()->has('not_permitted'))
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
@endif
<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4><?php echo e(trans('Actualizar Usuario')); ?></h4>
                    </div>
                    <div class="card-body">
                        <p class="italic"><small><?php echo e(trans('Las etiquetas de campo marcadas con * son campos de entrada obligatorios')); ?>.</small></p>
                        <?php echo Form::open(['route' => ['user.update', $lims_user_data->id], 'method' => 'put', 'files' => true]); ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><strong><?php echo e(trans('Nombre de usuario')); ?> *</strong> </label>
                                    <input type="text" name="name" required class="form-control" value="<?php echo e($lims_user_data->name); ?>">
                                    <?php if($errors->has('name')): ?>
                                    <span>
                                           <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label><strong><?php echo e(trans('Cambiar Contraseña')); ?></strong> </label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control">
                                        <!--                                            <div class="input-group-append">-->
                                        <!--                                                <button id="genbutton" type="button" class="btn btn-default">--><?php //echo e(trans('Generar')); ?><!--</button>-->
                                        <!--                                            </div>-->
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label><strong><?php echo e(trans('file.Email')); ?> *</strong></label>
                                    <input type="email" name="email" placeholder="example@example.com" required class="form-control" value="<?php echo e($lims_user_data->email); ?>">
                                    <?php if($errors->has('email')): ?>
                                    <span>
                                           <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label><strong><?php echo e(trans('Nombre de Funcionario')); ?> *</strong></label>
                                    <input type="text" name="full_name" required class="form-control" value="<?php echo e($lims_user_data->full_name); ?>">
                                </div>
                                <!--                                    <div class="form-group mt-3">-->
                                <!--                                        <label><strong>--><?php //echo e(trans('Numero de telefono')); ?><!-- *</strong></label>-->
                                <!--                                        <input type="text" name="phone" required class="form-control" value="--><?php //echo e($lims_user_data->phone); ?><!--">-->
                                <!--                                    </div>-->
                                <div class="form-group">
                                    <?php if($lims_user_data->is_active): ?>
                                    <input class="mt-2" type="checkbox" name="is_active" value="1" checked>
                                    <?php else: ?>
                                    <input class="mt-2" type="checkbox" name="is_active" value="1">
                                    <?php endif; ?>
                                    <label class="mt-2"><strong><?php echo e(trans('Activo')); ?></strong></label>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="<?php echo e(trans('Enviar')); ?>" class="btn btn-primary">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><strong><?php echo e(trans('Nombre de empresa')); ?></strong></label>
                                    <input type="text" name="company_name" class="form-control" value="<?php echo e($lims_user_data->company_name_id); ?>">
                                </div>
                                <div class="form-group">
                                    <label><strong><?php echo e(trans('file.Role')); ?> *</strong></label>
                                    <input type="hidden" name="role_id_hidden" value="<?php echo e($lims_user_data->role_id); ?>">
                                    <select name="role_id" required class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Seleccione Role...">
                                        <?php $__currentLoopData = $lims_role_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <!--                                    <div class="form-group" id="biller-id">-->
                                <!--                                        <label><strong>--><?php //echo e(trans('Area')); ?><!-- *</strong></label>-->
                                <!--                                        <input type="hidden" name="biller_id_hidden" value="--><?php //echo e($lims_user_data->biller_id); ?><!--">-->
                                <!--                                        <select name="biller_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select Biller...">-->
                                <!--                                          --><?php //$__currentLoopData = $lims_biller_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $biller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!--                                              <option value="--><?php //echo e($biller->id); ?><!--">--><?php //echo e($biller->name); ?><!--</option>-->
                                <!--                                          --><?php //endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <!--                                        </select>-->
                                <!--                                    </div>-->
                                <div class="form-group" id="warehouseId">
                                    <label><strong><?php echo e(trans('Bodega')); ?> *</strong></label>
                                    <input type="hidden" name="warehouse_id_hidden" value="<?php echo e($lims_user_data->warehouse_id); ?>">
                                    <select name="warehouse_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select Warehouse...">
                                        <?php $__currentLoopData = $lims_warehouse_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($warehouse->id); ?>"><?php echo e($warehouse->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $("ul#setting").siblings('a').attr('aria-expanded','true');
    $("ul#setting").addClass("show");
    $('#biller-id').hide();
    $('#warehouseId').hide();



    $('select[name=role_id]').val($("input[name='role_id_hidden']").val());
    if($('select[name=role_id]').val() > 2){
        $('#warehouseId').show();
        $('select[name=warehouse_id]').val($("input[name='warehouse_id_hidden']").val());
        $('#biller-id').show();
        $('select[name=biller_id]').val($("input[name='biller_id_hidden']").val());
    }
    $('.selectpicker').selectpicker('refresh');

    $('select[name="role_id"]').on('change', function() {
        if($(this).val() > 2){
            $('select[name="warehouse_id"]').prop('required',true);
            $('select[name="biller_id"]').prop('required',true);
            $('#biller-id').show();
            $('#warehouseId').show();
        }
        else{
            $('select[name="warehouse_id"]').prop('required',false);
            $('select[name="biller_id"]').prop('required',false);
            $('#biller-id').hide();
            $('#warehouseId').hide();
        }
    });

    $('#genbutton').on("click", function(){
        $.get('../genpass', function(data){
            $("input[name='password']").val(data);
        });
    });

</script>
@endsection
