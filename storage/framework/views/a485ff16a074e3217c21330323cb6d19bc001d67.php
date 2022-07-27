<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--    <link rel="icon" type="image/png" href="--><?php //echo e(url('public/logo', $general_setting->site_logo)); ?><!--" />-->
      <link rel="icon" type="image/png" href="<?php echo asset('images/login/LogoTactotal.png') ?>" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!--    <title>--><?php //echo e($general_setting->site_title); ?><!--</title>-->
      <title>Factura Tectotal</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <style type="text/css">
        * {
            font-size: 14px;
            line-height: 24px;
            font-family: 'Ubuntu', sans-serif;
            text-transform: capitalize;
        }
        .btn {
            padding: 7px 10px;
            text-decoration: none;
            border: none;
            display: block;
            text-align: center;
            margin: 7px;
            cursor:pointer;
        }

        .btn-info {
            background-color: #999;
            color: #FFF;
        }

        .btn-primary {
            background-color: #6449e7;
            color: #FFF;
            width: 100%;
        }
        td,
        th,
        tr,
        table {
            border-collapse: collapse;
        }
        tr {border-bottom: 1px dotted #ddd;}
        td,th {padding: 7px 0;width: 50%;}

        table {width: 100%;}
        tfoot tr th:first-child {text-align: left;}

        .centered {
            text-align: center;
            align-content: center;
        }
        small{font-size:11px;}

        @media  print {
            * {
                font-size:12px;
                line-height: 20px;
            }
            td,th {padding: 5px 0;}
            .hidden-print {
                display: none !important;
            }
            @page  { margin: 0; } body { margin: 0.5cm; margin-bottom:1.6cm; }
        }
    </style>
  </head>
<body>
<div>
    <div class="col-6 col-md-10"><div style="max-width:1000px;margin:0 auto">
            <?php if(preg_match('~[0-9]~', url()->previous())): ?>
                <?php $url = '../../sales'; ?>
            <?php else: ?>
                <?php $url = url()->previous(); ?>
            <?php endif; ?>
            <div class="hidden-print">
                <table>
                    <tr>
                        <td><a href="<?php echo e($url); ?>" class="btn btn-info"><i class="fa fa-arrow-left"></i> <?php echo e(trans('Regreso')); ?></a> </td>
                        <td><button onclick="window.print();" class="btn btn-primary"><i class="dripicons-print"></i> <?php echo e(trans('Imprimir')); ?></button></td>
                    </tr>
                </table>
                <br>
            </div>
</div>
<div class="row g-0 text-center">
    <div class="col-sm-6 col-md-2">.col-sm-6 .col-md-8</div>


            <div id="receipt-data">
                <div>
                    <img src="<?php echo asset('images/login/LogoTactotal.png') ?>" height="150" width="200"><br>
                    <h4 style="padding: 0; margin: 0">TECNOLOGIA TOTAL TECTOTAL CIA.LTDA</h4><br>
                    RUC: 1791265416001<br>
                    AV. AMAZONAS N38-42 Y VILLALENGUA<br>
                    <?php echo e(trans('Dirección Bodega')); ?>: <?php echo e($lims_warehouse_data->address); ?>
                    <br><?php echo e(trans('Numero de telefono bodega')); ?>: <?php echo e($lims_warehouse_data->phone); ?>
                    <br>Contribuyente Especial <N>0115</N>
                    <br>Obligado a llevar Contabilidad:<N>si</N>

                </div>
                <div>
                    <?php echo e(trans('Fecha')); ?>: <?php echo e($lims_sale_data->created_at); ?><br>
                    <?php echo e(trans('Referencia')); ?>: <?php echo e($lims_sale_data->reference_no); ?><br>
                    <?php echo e(trans('Cliente')); ?>: <?php echo e($lims_customer_data->name); ?>
                </div>
                <table>
                    <tbody>
                    <?php $__currentLoopData = $lims_product_sale_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_sale_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $lims_product_data = \App\Product::find($product_sale_data->product_id);
                        if($product_sale_data->variant_id) {
                            $variant_data = \App\Variant::find($product_sale_data->variant_id);
                            $product_name = $lims_product_data->name.' ['.$variant_data->name.']';
                        }
                        else
                            $product_name = $lims_product_data->name;
                        ?>
                        <tr><td colspan="2"><?php echo e($product_name); ?><br><?php echo e($product_sale_data->qty); ?> x <?php echo e(number_format((float)($product_sale_data->total / $product_sale_data->qty), 2, '.', '')); ?></td>
                            <td style="text-align:right;vertical-align:bottom"><?php echo e(number_format((float)$product_sale_data->total, 2, '.', '')); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th colspan="2"><?php echo e(trans('Sub Total')); ?></th>
                        <th style="text-align:right"><?php echo e(number_format((float)$lims_sale_data->total_price, 2, '.', '')); ?></th>
                    </tr>
                    <?php if($lims_sale_data->order_tax): ?>
                        <tr>
                            <th colspan="2"><?php echo e(trans('Impuesto')); ?></th>
                            <th style="text-align:right"><?php echo e(number_format((float)$lims_sale_data->order_tax, 2, '.', '')); ?></th>
                        </tr>
                    <?php endif; ?>
                    <?php if($lims_sale_data->order_discount): ?>
                        <tr>
                            <th colspan="2"><?php echo e(trans('Descuento')); ?></th>
                            <th style="text-align:right"><?php echo e(number_format((float)$lims_sale_data->order_discount, 2, '.', '')); ?></th>
                        </tr>
                    <?php endif; ?>
                    <?php if($lims_sale_data->coupon_discount): ?>
                        <tr>
                            <!--                    <th colspan="2">--><?php //echo e(trans('file.Coupon Discount')); ?><!--</th>-->
                            <!--                    <th style="text-align:right">--><?php //echo e(number_format((float)$lims_sale_data->coupon_discount, 2, '.', '')); ?><!--</th>-->
                        </tr>
                    <?php endif; ?>
                    <?php if($lims_sale_data->shipping_cost): ?>
                        <tr>
                            <th colspan="2"><?php echo e(trans('Costo de Envio')); ?></th>
                            <th style="text-align:right"><?php echo e(number_format((float)$lims_sale_data->shipping_cost, 2, '.', '')); ?></th>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <th colspan="2"><?php echo e(trans('Total')); ?></th>
                        <th style="text-align:right"><?php echo e(number_format((float)$lims_sale_data->grand_total, 2, '.', '')); ?></th>
                    </tr>
                    <!--                <tr>-->
                    <!--                    --><?php //if($general_setting->currency_position == 'prefix'): ?>
                    <!--                    <th class="centered" colspan="3">--><?php //echo e(trans('file.In Words')); ?><!--: <span>--><?php //echo e($general_setting->currency); ?><!--</span> <span>--><?php //echo e(str_replace("-"," ",$numberInWords)); ?><!--</span></th>-->
                    <!--                    --><?php //else: ?>
                    <!--                    <th class="centered" colspan="3">--><?php //echo e(trans('file.In Words')); ?><!--: <span>--><?php //echo e(str_replace("-"," ",$numberInWords)); ?><!--</span> <span>--><?php //echo e($general_setting->currency); ?><!--</span></th>-->
                    <!--                    --><?php //endif; ?>
                    <!--                </tr>-->
                    </tfoot>
                </table>
                <table>
                    <tbody>
                    <?php $__currentLoopData = $lims_payment_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr style="background-color:#ddd;">
                            <td style="padding: 5px;width:30%"><?php echo e(trans('Forma de pago')); ?>: <?php echo e($payment_data->paying_method); ?></td>
                            <td style="padding: 5px;width:40%"><?php echo e(trans('Montro')); ?>: <?php echo e(number_format((float)$payment_data->amount, 2, '.', '')); ?></td>
                            <!--                    <td style="padding: 5px;width:30%">--><?php //echo e(trans('file.Change')); ?><!--: --><?php //echo e(number_format((float)$payment_data->change, 2, '.', '')); ?><!--</td>-->
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!--                <tr><td class="centered" colspan="3">--><?php //echo e(trans('file.Thank you for shopping with us. Please come again')); ?><!--</td></tr>-->
                    <tr>
                        <td class="centered" colspan="3">
                            <?php echo '<img style="margin-top:10px;" src="data:image/png;base64,' . DNS1D::getBarcodePNG($lims_sale_data->reference_no, 'C128') . '" width="300" alt="barcode"   />';?>
                            <br>
                            <?php echo '<img style="margin-top:10px;" src="data:image/png;base64,' . DNS2D::getBarcodePNG($lims_sale_data->reference_no, 'QRCODE') . '" alt="barcode"   />';?>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="centered" style="margin:30px 0 50px">
                    <small><?php echo e(trans('Factura generada por')); ?> <?php echo e($lims_warehouse_data->phone); ?>.
                        <!--            --><?php //echo e(trans('file.Developed By')); ?><!-- Tectotal</strong></small>-->
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    function auto_print() {
        window.print()
    }
    setTimeout(auto_print, 1000);
</script>

</body>
</html>
<?php /**PATH C:\Users\Mario Montero\ERP_contable_laravel\resources\views/sale/invoice.blade.php ENDPATH**/ ?>
