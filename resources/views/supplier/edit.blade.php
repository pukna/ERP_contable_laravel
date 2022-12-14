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
                        <h4><?php echo e(trans('Actualizar Proveedor')); ?></h4>
                    </div>
                    <div class="card-body">
                        <p class="italic"><small><?php echo e(trans('Las etiquetas de campo marcadas con * son campos de entrada obligatorios')); ?>.</small></p>
                        <?php echo Form::open(['route' => ['supplier.update', $lims_supplier_data->id], 'method' => 'put', 'files' => true]); ?>
                        <input type="hidden" name="id" value="<?php echo e($lims_supplier_data->id); ?>" />
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <label><h5> <?php echo e(trans('Datos Empresa')); ?></h5></label>
                                <hr/>
                            </div>
                            <!--                            <div class="col-md-6">-->
                            <!--                                <div class="form-group">-->
                            <!--                                    <label>--><?php //echo e(trans('Imagen')); ?><!--</label>-->
                            <!--                                    <input type="file" name="image" class="form-control">-->
                            <!--                                    --><?php //if($errors->has('image')): ?>
                        <!--                                   <span>-->
                            <!--                                       <strong>--><?php //echo e($errors->first('image')); ?><!--</strong>-->
                            <!--                                    </span>-->
                            <!--                                    --><?php //endif; ?>
                        <!--                                </div>-->
                            <!--                            </div>-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('Nombre de empresa')); ?> *</label>
                                    <input type="text" name="company_name" value="<?php echo e($lims_supplier_data->company_name); ?>" required class="form-control">
                                    <?php if($errors->has('company_name')): ?>
                                    <span>
                                       <strong><?php echo e($errors->first('company_name')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('Razón Social')); ?> *</strong> </label>
                                    <input type="text" name="name" value="<?php echo e($lims_supplier_data->name); ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('Tipo de Identificación')); ?></label>
                                    <div class="input-group">
                                        <select name="type" required class="form-control selectpicker" id="type">
                                            <option value="ruc">RUC</option>
                                            <option value="identity_card">Cedula</option>
                                            <option value="passport">Pasaporte</option>
                                            <input type="hidden" name="type_hidden" value="<?php echo e($lims_supplier_data->type); ?>">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--                            <div class="col-md-6">-->
                            <!--                                <div class="form-group">-->
                            <!--                                    <label>--><?php //echo e(trans('RUC')); ?><!--</label>-->
                            <!--                                    <input type="text" name="vat_number" value="--><?php //echo e($lims_supplier_data->vat_number); ?><!--" class="form-control">-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                            <div id="ruc" class="col-md-6">-->
                            <!--                                <div class="form-group">-->
                            <!--                                    <label>--><?php //echo e(trans('RUC')); ?><!--*</strong></label>-->
                            <!--                                    <input type="text" name="vat_number" placeholder="1111111111001" value="--><?php //echo e($lims_supplier_data->vat_number); ?><!--" class="form-control">-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                            <div id="identity_card" class="col-md-6">-->
                            <!--                                <div class="form-group">-->
                            <!--                                    <label>--><?php //echo e(trans('Cedula')); ?><!--*</strong></label>-->
                            <!--                                    <input type="text" name="vat_number" placeholder="1111111111" value="--><?php //echo e($lims_supplier_data->vat_number); ?><!--"  class="form-control">-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                            <div id="passport" class="col-md-6">-->
                            <!--                                <div class="form-group">-->
                            <!--                                    <label>--><?php //echo e(trans('Pasaporte')); ?><!--*</strong></label>-->
                            <!--                                    <input type="text" name="vat_number" placeholder="A1111111111A" value="--><?php //echo e($lims_supplier_data->vat_number); ?><!--"  class="form-control">-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                            <div id="ruc1" class="col-md-6">-->
                            <!--                                <div class="form-group">-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <div id="ruc1" class="col-md-6">
                                <div class="form-group">
                                </div>
                            </div>
                            <div id="ruc1" class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="vat_number" value="<?php echo e($lims_supplier_data->vat_number); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label><h5> <?php echo e(trans('Datos de Contacto')); ?></h5></label>
                                <hr/>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('file.Email')); ?> *</label>
                                    <input type="email" name="email" value="<?php echo e($lims_supplier_data->email); ?>" required class="form-control">
                                    <?php if($errors->has('email')): ?>
                                    <span>
                                       <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('Numero de telefono')); ?> *</label>
                                    <input type="text" name="phone_number" value="<?php echo e($lims_supplier_data->phone_number); ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('Diereccion')); ?> *</label>
                                    <input type="text" name="address" value="<?php echo e($lims_supplier_data->address); ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('Ciudad')); ?> *</label>
                                    <input type="text" name="city"  value="<?php echo e($lims_supplier_data->city); ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('Provincia')); ?></label>
                                    <input type="text" name="state" value="<?php echo e($lims_supplier_data->state); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('Codigo postal')); ?></label>
                                    <input type="text" name="postal_code" value="<?php echo e($lims_supplier_data->postal_code); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('Pais')); ?></label>
                                    <input type="text" name="country" value="<?php echo e($lims_supplier_data->country); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label><h5> <?php echo e(trans('Datos Bancarios')); ?></h5></label>
                                <hr/>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4" id="">
                                        <label><?php echo e(trans('Banco')); ?>*</strong></label>
                                        <div class="input-group">
                                            <select name="bank" required class="form-control selectpicker" id="type">
                                                <option value="Banco Pichincha">Banco Pichincha</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="">
                                        <label><?php echo e(trans('Tipo de Cuenta')); ?>*</strong></label>
                                        <div class="input-group">
                                            <select name="bank_type" required class="form-control selectpicker" id="bank">
                                                <option value="current">Corriente</option>
                                                <option value="savings">Ahorros</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="">
                                        <label><?php echo e(trans('Numero de cuenta')); ?>*</strong></label>
                                        <input type="text" name="account_number" value="<?php echo e($lims_supplier_data->account_number); ?>" class="form-control" />
                                    </div>
                                    <div class="col-md-4" id="">
                                        <label><?php echo e(trans(' Nombre Titular')); ?>*</strong></label>
                                        <input type="text" name="name_owner" value="<?php echo e($lims_supplier_data->name_owner); ?>" class="form-control" />
                                    </div>
                                    <div class="col-md-4" id="">
                                        <label><?php echo e(trans('RUC/Ced')); ?>*</strong></label>
                                        <input type="text" name="ruc_ced" value="<?php echo e($lims_supplier_data->ruc_ced); ?>" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mt-3">
                                    <input type="submit" value="<?php echo e(trans('Enviar')); ?>" class="btn btn-primary">
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
    $("ul#purchase").siblings('a').attr('aria-expanded','true');
    $("ul#purchase").addClass("show");

    $("#identity_card").hide();
    $("#passport").hide();
    $("select[name='type']").val($("input[name='type_hidden']").val());

    // update supplier type selection
    if($("input[name='type_hidden']").val() == "passport"){
        hide();
        $("#passport").show();
    }
    else if($("input[name='type_hidden']").val() == "identity_card"){
        hide();
        $("#identity_card").show();
    }

    $('select[name="type"]').on('change', function() {
        if($(this).val() == 'identity_card'){
            hide();
            $("#identity_card").show(300);
            $("#passport").hide(300);
            $("input[name='vat_number']").prop('required',true);
        }
        else if($(this).val() == 'passport'){
            hide();
            $("#passport").show(300);
            $("#identity_card").hide(300);
            $("input[name='vat_number']").prop('required',true);

        }
        else if($(this).val() == 'ruc'){
            hide();
            $("#ruc").show(300);
            $("#identity_card").hide(300);
            $("#passport").hide(300);
            $("input[name='vat_number']").prop('required',true);


        }
    });
    function hide() {
        $("#ruc").hide(300);
        $("#pasaport").hide(300);
        $("#identification_card").hide(300);
    }
</script>
@endsection
