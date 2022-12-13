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
                        <h4><?php echo e(trans('Agregar Proveedor')); ?></h4>
                    </div>
                    <div class="card-body">
                        <p class="italic"><small><?php echo e(trans('Las etiquetas de campo marcadas con * son campos de entrada obligatorios')); ?>.</small></p>
                        <?php echo Form::open(['route' => 'supplier.store', 'method' => 'post', 'files' => true]); ?>

                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <label><h5> <?php echo e(trans('Información Proveedor - Tributaria')); ?></h5></label>
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
                                    <label><?php echo e(trans('Nombre de Empresa')); ?> *</label>
                                    <input type="text" name="company_name" required class="form-control">
                                    <?php if($errors->has('company_name')): ?>
                                    <span>
                                       <strong><?php echo e($errors->first('company_name')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('Razón Social')); ?></label>
                                    <input type="text" name="name"  class="form-control">
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
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="ruc" class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('Ruc')); ?>*</label>
                                    <input type="text" name="vat_number"  placeholder="1111111111001" class="form-control ">
                                </div>
                            </div>
                            <div id="identity_card" class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('Cedula')); ?>*</label>
                                    <input type="text" name="type_id"  placeholder="1111111111" class="form-control ">
                                </div>
                            </div>
                            <div id="passport" class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('Pasaporte')); ?>*</label>
                                    <input type="text" name="type_passport"  placeholder="A1111111111001A" class="form-control ">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('file.Email')); ?> *</label>
                                    <input type="email" name="email" placeholder="example@example.com" required class="form-control">
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
                                    <input type="text" name="phone_number" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label><h5> <?php echo e(trans('Datos de Contacto')); ?></h5></label>
                                <hr/>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('Nombre Contacto')); ?> *</label>
                                    <input type="text" name="contact_name" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('Email Contacto')); ?> *</label>
                                    <input type="email" name="contact_email" placeholder="example@example.com" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label><h5> <?php echo e(trans('Datos de Ubicación')); ?></h5></label>
                                <hr/>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('Dirección')); ?> *</label>
                                    <input type="text" name="address" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('Ciudad')); ?></label>
                                    <input type="text" name="city" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('Provincia')); ?></label>
                                    <input type="text" name="state" class="form-control">
                                    <input type="hidden" name="locate" value="Local" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('Codigo postal')); ?></label>
                                    <input type="text" name="postal_code" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('Pais')); ?></label>
                                    <input type="text" name="country" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mt-3">
                                    <input type="checkbox" name="special_taxpayer" value="1">&nbsp;
                                    <label><?php echo e(trans('Contribuyente Especial')); ?></label>
                                    <!--                                    <p class="italic">--><?php //echo e(trans('El producto destacado se mostrará en POS')); ?><!--</p>-->
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label><h5> <?php echo e(trans('Credito')); ?></h5></label>
                                <hr/>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('Metodo de Pago')); ?>*</label>
                                    <div class="input-group">
                                        <select name="way_payment" required class="form-control selectpicker" id="type">
                                            <option value="credit">Crédito</option>
                                            <option value="cash">Contado</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="credit" class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo e(trans('Plazo')); ?>*</label>
                                    <input type="text" name="payment_deadline"  placeholder="Ingresar valores en días" class="form-control ">
                                </div>
                            </div>


                            <div class="col-md-12 mt-3">
                                <label><h5> <?php echo e(trans('Datos Bancarios')); ?></h5></label>
                                <hr/>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <!--                                        <div class="col-md-4" id="">-->
                                    <!--                                            <label>--><?php //echo e(trans('Banco')); ?><!--*</strong></label>-->
                                    <!--                                            <div class="input-group">-->
                                    <!--                                                <select name="bank" required class="form-control selectpicker" id="type">-->
                                    <!--                                                    <option value="Banco Pichincha">Banco Pichincha</option>-->
                                    <!--                                                </select>-->
                                    <!--                                            </div>-->
                                    <!--                                        </div>-->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><?php echo e(trans('Banco')); ?>*</strong> </label>
                                            <div class="input-group">
                                                <select name="bank_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Seleccionar banco...">
                                                    <?php $__currentLoopData = $lims_bank_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($bank->id); ?>"><?php echo e($bank->name_bank); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
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
                                        <input type="text" name="account_number" class="form-control" />
                                    </div>
                                    <div class="col-md-4" id="">
                                        <label><?php echo e(trans(' Nombre Titular')); ?>*</strong></label>
                                        <input type="text" name="name_owner" class="form-control" />
                                    </div>
                                    <div class="col-md-4" id="">
                                        <label><?php echo e(trans('RUC/Ced')); ?>*</strong></label>
                                        <input type="text" name="ruc_ced" class="form-control" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mt-4">
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
    $("ul#purchase #supplier-create-menu").addClass("active");

    $("#identity_card").hide();
    $("#passport").hide();
    $("#payment_deadline").hide();
    var ruc = $('input[name="type_ruc"]').val();
    var id = $('input[name="type_id"]').val();

    // supplier type selection

    $('select[name="type"]').on('change', function() {
        if($(this).val() == 'identity_card'){
            hide();
            $("#identity_card").show(300);
            $("#passport").hide(300);
            $("input[name='vat_number']").val(id).prop('required',false);
        }
        else if($(this).val() == 'passport'){
            hide();
            $("#passport").show(300);
            $("#identity_card").hide(300);
            $("input[name='']").prop('required',true);

        }
        else if($(this).val() == 'ruc'){
            hide();
            $("#ruc").show(300);
            $("#identity_card").hide(300);
            $("#passport").hide(300);
            $("input[name='vat_number']").val(ruc).prop('required',true);


        }
    });

    // select credit

    $('select[name="way_payment"]').on('change', function() {
        if($(this).val() == 'credit'){
            hide();
            $("#credit").show(300);
            $("input[name='payment_deadline']").prop('required',true);
        }
        else if($(this).val() == 'cash'){
            hide();
            $("#credit").hide(300);
        }
    });
    function hide() {
        $("#ruc").hide(300);
        $("#pasaport").hide(300);
        $("#identification_card").hide(300);
        $("#payment_deadline").hide(300);
    }
</script>
@endsection
