<!--agregar proveedor -->
<?php $__env->startSection('content'); ?>
<?php if(session()->has('not_permitted')): ?>
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('not_permitted')); ?></div>
<?php endif; ?>
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
                            <div id="ruc1" class="col-md-6">
                                <div class="form-group">
                                </div>
                            </div>
                            <div id="ruc1" class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="type_ruc"   class="form-control ">
                                </div>
                            </div>
<!--                            <div id="identity_card" class="col-md-6">-->
<!--                                <div class="form-group">-->
<!--                                    <label>--><?php //echo e(trans('Cedula')); ?><!--*</strong></label>-->
<!--                                    <input type="text" name="type_ced" placeholder="1111111111"  class="form-control">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div id="passport" class="col-md-6">-->
<!--                                <div class="form-group">-->
<!--                                    <label>--><?php //echo e(trans('Pasaporte')); ?><!--*</strong></label>-->
<!--                                    <input type="text" name="" placeholder="A1111111111A"  class="form-control">-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="col-md-12 mt-3">
                                <label><h5> <?php echo e(trans('Datos de Contacto')); ?></h5></label>
                                <hr/>
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
                                    <label><?php echo e(trans('Ciudad')); ?> *</label>
                                    <input type="text" name="city" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('Provincia')); ?></label>
                                    <input type="text" name="state" class="form-control">
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
    var id_card = 0;

    $('input[name="price"]').val(price);


    // supplier type selection

    // $('select[name="type"]').on('change', function() {
    //     if($(this).val() == 'identity_card'){
    //         hide();
    //         $("#identity_card").show(300);
    //         $("#passport").hide(300);
    //         $("input[name='vat_number']").prop('required',false);
    //     }
    //     else if($(this).val() == 'passport'){
    //         hide();
    //         $("#passport").show(300);
    //         $("#identity_card").hide(300);
    //         $("input[name='']").prop('required',true);
    //
    //     }
    //     else if($(this).val() == 'ruc'){
    //         hide();
    //         $("#ruc").show(300);
    //         $("#identity_card").hide(300);
    //         $("#passport").hide(300);
    //         $("input[name='vat_number']").prop('required',true);
    //
    //
    //     }
    // });
    function hide() {
        $("#ruc").hide(300);
        $("#pasaport").hide(300);
        $("#identification_card").hide(300);
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mario Montero\ERP_contable_laravel\resources\views/supplier/create.blade.php ENDPATH**/ ?>
