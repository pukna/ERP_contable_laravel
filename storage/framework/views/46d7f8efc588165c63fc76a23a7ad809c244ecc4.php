<!--lista de productos -->
<?php $__env->startSection('content'); ?>
<?php if(session()->has('create_message')): ?>
    <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('create_message')); ?></div>
<?php endif; ?>
<?php if(session()->has('edit_message')): ?>
    <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('edit_message')); ?></div>
<?php endif; ?>
<?php if(session()->has('import_message')): ?>
    <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('import_message')); ?></div>
<?php endif; ?>
<?php if(session()->has('not_permitted')): ?>
    <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('not_permitted')); ?></div>
<?php endif; ?>
<?php if(session()->has('message')): ?>
    <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('message')); ?></div>
<?php endif; ?>

<section>
    <div class="container-fluid">
        <?php if(in_array("products-add", $all_permission)): ?>
            <a href="<?php echo e(route('products.create')); ?>" class="btn btn-info"><i class="dripicons-plus"></i> <?php echo e(__('Add Producto')); ?></a>
<!--            <a href="#" data-toggle="modal" data-target="#importProduct" class="btn btn-primary"><i class="dripicons-copy"></i> --><?php //echo e(__('file.import_product')); ?><!--</a>-->
        <?php endif; ?>
    </div>
    <div class="table-responsive">
        <table id="product-data-table" class="table" style="width: 100%">
            <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th><?php echo e(trans('Imagen')); ?></th>
                    <th><?php echo e(trans('Nombre')); ?></th>
                    <th><?php echo e(trans('Código')); ?></th>
                    <th><?php echo e(trans('Marca')); ?></th>
                    <th><?php echo e(trans('Categoría')); ?></th>
                    <th><?php echo e(trans('Cantidad')); ?></th>
                    <th><?php echo e(trans('Unidad')); ?></th>
                    <th><?php echo e(trans('Precio')); ?></th>
                    <th class="not-exported"><?php echo e(trans('Acción')); ?></th>
                </tr>
            </thead>

        </table>
    </div>
</section>

<div id="importProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        <?php echo Form::open(['route' => 'product.import', 'method' => 'post', 'files' => true]); ?>

        <div class="modal-header">
          <h5 id="exampleModalLabel" class="modal-title">Import Product</h5>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
        </div>
        <div class="modal-body">
          <p class="italic"><small><?php echo e(trans('Las etiquetas de campo marcadas con * son campos de entrada obligatorios')); ?>.</small></p>
           <p><?php echo e(trans('file.The correct column order is')); ?> (Imagen, Nombre*, code*, type*, brand, category*, unit_code*, cost*, price*, product_details) <?php echo e(trans('file.and you must follow this')); ?>.</p>
           <p><?php echo e(trans('file.To display Image it must be stored in')); ?> public/images/product <?php echo e(trans('file.directory')); ?>. <?php echo e(trans('file.Image name must be same as product name')); ?></p>
           <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label><?php echo e(trans('file.Upload CSV File')); ?> *</label>
                        <?php echo e(Form::file('file', array('class' => 'form-control','required'))); ?>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label> <?php echo e(trans('file.Sample File')); ?></label>
                        <a href="public/sample_file/sample_products.csv" class="btn btn-info btn-block btn-md"><i class="dripicons-download"></i>  <?php echo e(trans('file.Download')); ?></a>
                    </div>
                </div>
           </div>
            <?php echo e(Form::submit('Submit', ['class' => 'btn btn-primary'])); ?>

        </div>
        <?php echo Form::close(); ?>

      </div>
    </div>
</div>

<div id="product-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 id="exampleModalLabel" class="modal-title"><?php echo e(trans('Detalle de producto')); ?></h5>
          <button id="print-btn" type="button" class="btn btn-default btn-sm ml-3"><i class="dripicons-print"></i> <?php echo e(trans('Imprimir')); ?></button>
          <button type="button" id="close-btn" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-5" id="slider-content"></div>
                <div class="col-md-5 offset-1" id="product-content"></div>
                <div class="col-md-5 mt-2" id="product-warehouse-section">
                    <h5><?php echo e(trans('Bodega/Cantidad')); ?></h5>
                    <table class="table table-bordered table-hover product-warehouse-list">
                        <thead>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-7 mt-2" id="product-variant-warehouse-section">
                    <h5><?php echo e(trans('file.Warehouse quantity of product variants')); ?></h5>
                    <table class="table table-bordered table-hover product-variant-warehouse-list">
                        <thead>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

            <h5 id="combo-header"></h5>
            <table class="table table-bordered table-hover item-list">
                <thead>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
      </div>
    </div>
</div>


<script>

    $("ul#inventory").siblings('a').attr('aria-expanded','true');
    $("ul#inventory").addClass("show");
    $("ul#product").siblings('a').attr('aria-expanded','true');
    $("ul#product").addClass("show");
    $("ul#product #product-list-menu").addClass("active");

	function confirmDelete() {
	    if (confirm("Are you sure want to delete?")) {
	        return true;
	    }
	    return false;
	}

    var warehouse = [];
    var variant = [];
    var qty = [];
    var htmltext;
    var slidertext;
    var product_id = [];
    var all_permission = <?php echo json_encode($all_permission) ?>;
    var user_verified = <?php echo json_encode(env('USER_VERIFIED')) ?>;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $( "#select_all" ).on( "change", function() {
        if ($(this).is(':checked')) {
            $("tbody input[type='checkbox']").prop('checked', true);
        }
        else {
            $("tbody input[type='checkbox']").prop('checked', false);
        }
    });

    $(document).on("click", "tr.product-link td:not(:first-child, :last-child)", function() {
        productDetails( $(this).parent().data('product'), $(this).parent().data('imagedata') );
    });

    $(document).on("click", ".view", function(){
        var product = $(this).parent().parent().parent().parent().parent().data('product');
        var imagedata = $(this).parent().parent().parent().parent().parent().data('imagedata');
        productDetails(product, imagedata);
    });

    $("#print-btn").on("click", function(){
          var divToPrint=document.getElementById('product-details');
          var newWin=window.open('','Print-Window');
          newWin.document.open();
          newWin.document.write('<link rel="stylesheet" href="<?php echo asset('public/vendor/bootstrap/css/bootstrap.min.css') ?>" type="text/css"><style type="text/css">@media  print {.modal-dialog { max-width: 1000px;} }</style><body onload="window.print()">'+divToPrint.innerHTML+'</body>');
          newWin.document.close();
          setTimeout(function(){newWin.close();},10);
    });

    function productDetails(product, imagedata) {
        product[11] = product[11].replace(/@/g, '"');
        htmltext = slidertext = '';

            htmltext = '<p><strong><?php echo e(trans("Tipo")); ?>: </strong>'+product[0]+'</p><p><strong><?php echo e(trans("Nombre")); ?>: </strong>'+product[1]+'</p><p><strong><?php echo e(trans("Código")); ?>: </strong>'+product[2]+ '</p><p><strong><?php echo e(trans("Marca")); ?>: </strong>'+product[3]+'</p><p><strong><?php echo e(trans("Categoria")); ?>: </strong>'+product[4]+'</p><p><strong><?php echo e(trans("Cantidad")); ?>: </strong>'+product[16]+'</p><p><strong><?php echo e(trans("Unidad")); ?>: </strong>'+product[5]+'</p><p><strong><?php echo e(trans("Costo")); ?>: </strong>'+product[6]+'</p><p><strong><?php echo e(trans("Precio")); ?>: </strong>'+product[7]+'</p><p><strong><?php echo e(trans("Impuesto")); ?>: </strong>'+product[8]+'</p><p><strong><?php echo e(trans("Metodo de impuesto")); ?> : </strong>'+product[9]+'</p><p><strong><?php echo e(trans("Alerta de Cantidad")); ?> : </strong>'+product[10]+'</p><p><strong><?php echo e(trans("Detalle de prducto")); ?>: </strong></p>'+product[11];

        if(product[17]) {
            var product_image = product[17].split(",");
            if(product_image.length > 1) {
                slidertext = '<div id="product-img-slider" class="carousel slide" data-ride="carousel"><div class="carousel-inner">';
                for (var i = 0; i < product_image.length; i++) {
                    if(!i)
                        slidertext += '<div class="carousel-item active"><img src="public/images/product/'+product_image[i]+'" height="300" width="100%"></div>';
                    else
                        slidertext += '<div class="carousel-item"><img src="public/images/product/'+product_image[i]+'" height="300" width="100%"></div>';
                }
                slidertext += '</div><a class="carousel-control-prev" href="#product-img-slider" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#product-img-slider" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a></div>';
            }
            else {
                slidertext = '<img src="public/images/product/'+product[17]+'" height="300" width="100%">';
            }
        }

        $("#combo-header").text('');
        $("table.item-list thead").remove();
        $("table.item-list tbody").remove();
        $("table.product-warehouse-list thead").remove();
        $("table.product-warehouse-list tbody").remove();
        $(".product-variant-warehouse-list thead").remove();
        $(".product-variant-warehouse-list tbody").remove();
        $("#product-warehouse-section").addClass('d-none');
        $("#product-variant-warehouse-section").addClass('d-none');
        if(product[0] == 'combo') {
            $("#combo-header").text('<?php echo e(trans("file.Combo Products")); ?>');
            product_list = product[13].split(",");
            qty_list = product[14].split(",");
            price_list = product[15].split(",");
            $(".item-list thead").remove();
            $(".item-list tbody").remove();
            var newHead = $("<thead>");
            var newBody = $("<tbody>");
            var newRow = $("<tr>");
            newRow.append('<th><?php echo e(trans("file.product")); ?></th><th><?php echo e(trans("file.Quantity")); ?></th><th><?php echo e(trans("file.Price")); ?></th>');
            newHead.append(newRow);

            $(product_list).each(function(i) {
                $.get('products/getdata/' + product_list[i], function(data) {
                    var newRow = $("<tr>");
                    var cols = '';
                    cols += '<td>' + data['name'] +' [' + data['code'] + ']</td>';
                    cols += '<td>' + qty_list[i] + '</td>';
                    cols += '<td>' + price_list[i] + '</td>';

                    newRow.append(cols);
                    newBody.append(newRow);
                });
            });

            $("table.item-list").append(newHead);
            $("table.item-list").append(newBody);
        }
        else if(product[0] == 'standard') {
            $.get('products/product_warehouse/' + product[12], function(data) {
                if(data.product_warehouse[0].length != 0) {
                    warehouse = data.product_warehouse[0];
                    qty = data.product_warehouse[1];
                    var newHead = $("<thead>");
                    var newBody = $("<tbody>");
                    var newRow = $("<tr>");
                    newRow.append('<th><?php echo e(trans("Bodega")); ?></th><th><?php echo e(trans("Cantidad")); ?></th>');
                    newHead.append(newRow);
                    $.each(warehouse, function(index){
                        var newRow = $("<tr>");
                        var cols = '';
                        cols += '<td>' + warehouse[index] + '</td>';
                        cols += '<td>' + qty[index] + '</td>';

                        newRow.append(cols);
                        newBody.append(newRow);
                        $("table.product-warehouse-list").append(newHead);
                        $("table.product-warehouse-list").append(newBody);
                    });
                    $("#product-warehouse-section").removeClass('d-none');
                }
                if(data.product_variant_warehouse[0].length != 0) {
                    warehouse = data.product_variant_warehouse[0];
                    variant = data.product_variant_warehouse[1];
                    qty = data.product_variant_warehouse[2];
                    var newHead = $("<thead>");
                    var newBody = $("<tbody>");
                    var newRow = $("<tr>");
                    newRow.append('<th><?php echo e(trans("file.Bodega")); ?></th><th><?php echo e(trans("file.Variant")); ?></th><th><?php echo e(trans("Cantidad")); ?></th>');
                    newHead.append(newRow);
                    $.each(warehouse, function(index){
                        var newRow = $("<tr>");
                        var cols = '';
                        cols += '<td>' + warehouse[index] + '</td>';
                        cols += '<td>' + variant[index] + '</td>';
                        cols += '<td>' + qty[index] + '</td>';

                        newRow.append(cols);
                        newBody.append(newRow);
                        $("table.product-variant-warehouse-list").append(newHead);
                        $("table.product-variant-warehouse-list").append(newBody);
                    });
                    $("#product-variant-warehouse-section").removeClass('d-none');
                }
            });
        }

        $('#product-content').html(htmltext);
        $('#slider-content').html(slidertext);
        $('#product-details').modal('show');
        $('#product-img-slider').carousel(0);
    }

    $(document).ready(function() {
        var table = $('#product-data-table').DataTable( {
            responsive: true,
            fixedHeader: {
                header: true,
                footer: true
            },
            "processing": true,
            "serverSide": true,
            "ajax":{
                url:"products/product-data",
                data:{
                    all_permission: all_permission
                },
                dataType: "json",
                type:"post"
            },
            "createdRow": function( row, data, dataIndex ) {
                $(row).addClass('product-link');
                $(row).attr('data-product', data['product']);
                $(row).attr('data-imagedata', data['imagedata']);
            },
            "columns": [
                {"data": "key"},
                {"data": "image"},
                {"data": "name"},
                {"data": "code"},
                {"data": "brand"},
                {"data": "category"},
                {"data": "qty"},
                {"data": "unit"},
                {"data": "price"},
                {"data": "options"},
            ],
            'language': {
                /*'searchPlaceholder': "<?php echo e(trans('file.Type Product Name or Code...')); ?>",*/
                'lengthMenu': '_MENU_ <?php echo e(trans("Ver")); ?>',
                 "info":      '<small><?php echo e(trans("pag")); ?> _START_ - _END_ (_TOTAL_)</small>',
                "search":  '<?php echo e(trans("Buscar")); ?>',
                'paginate': {
                        'previous': '<i class="dripicons-chevron-left"></i>',
                        'next': '<i class="dripicons-chevron-right"></i>'
                }
            },
            order:[['2', 'asc']],
            'columnDefs': [
                {
                    "orderable": false,
                    'targets': [0, 1, 9]
                },
                {
                    'render': function(data, type, row, meta){
                        if(type === 'display'){
                            data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
                        }

                       return data;
                    },
                    'checkboxes': {
                       'selectRow': true,
                       'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'
                    },
                    'targets': [0]
                }
            ],
            'select': { style: 'multi', selector: 'td:first-child'},
            'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
            dom: '<"row"lfB>rtip',
            buttons: [
                {
                    extend: 'pdf',
                    text: '<?php echo e(trans("file.PDF")); ?>',
                    exportOptions: {
                        columns: ':visible:not(.not-exported)',
                        rows: ':visible',
                        stripHtml: false
                    },
                    customize: function(doc) {
                        for (var i = 1; i < doc.content[1].table.body.length; i++) {
                            if (doc.content[1].table.body[i][0].text.indexOf('<img src=') !== -1) {
                                var imagehtml = doc.content[1].table.body[i][0].text;
                                var regex = /<img.*?src=['"](.*?)['"]/;
                                var src = regex.exec(imagehtml)[1];
                                var tempImage = new Image();
                                tempImage.src = src;
                                var canvas = document.createElement("canvas");
                                canvas.width = tempImage.width;
                                canvas.height = tempImage.height;
                                var ctx = canvas.getContext("2d");
                                ctx.drawImage(tempImage, 0, 0);
                                var imagedata = canvas.toDataURL("image/png");
                                delete doc.content[1].table.body[i][0].text;
                                doc.content[1].table.body[i][0].image = imagedata;
                                doc.content[1].table.body[i][0].fit = [30, 30];
                            }
                        }
                    },
                },
                {
                    extend: 'csv',
                    text: '<?php echo e(trans("file.CSV")); ?>',
                    exportOptions: {
                        columns: ':visible:not(.not-exported)',
                        rows: ':visible',
                        format: {
                            body: function ( data, row, column, node ) {
                                if (column === 0 && (data.indexOf('<img src=') !== -1)) {
                                    var regex = /<img.*?src=['"](.*?)['"]/;
                                    data = regex.exec(data)[1];
                                }
                                return data;
                            }
                        }
                    }
                },
                {
                    extend: 'print',
                    text: '<?php echo e(trans("Imprimir")); ?>',
                    exportOptions: {
                        columns: ':visible:not(.not-exported)',
                        rows: ':visible',
                        stripHtml: false
                    }
                },
                //{
                //    text: '<?php //echo e(trans("Eliminar")); ?>//',
                //    className: 'buttons-delete',
                //    action: function ( e, dt, node, config ) {
                //        if(user_verified == '1') {
                //            product_id.length = 0;
                //            $(':checkbox:checked').each(function(i){
                //                if(i){
                //                    var product_data = $(this).closest('tr').data('product');
                //                    product_id[i-1] = product_data[12];
                //                }
                //            });
                //            if(product_id.length && confirmDelete()) {
                //                $.ajax({
                //                    type:'POST',
                //                    url:'products/deletebyselection',
                //                    data:{
                //                        productIdArray: product_id
                //                    },
                //                    success:function(data){
                //                        dt.rows({ page: 'current', selected: true }).deselect();
                //                        dt.rows({ page: 'current', selected: true }).remove().draw(false);
                //                    }
                //                });
                //            }
                //            else if(!product_id.length)
                //                alert('No product is selected!');
                //        }
                //        else
                //            alert('This feature is disable for demo!');
                //    }
                //},
                {
                    extend: 'colvis',
                    text: '<?php echo e(trans("Visualizar")); ?>',
                    columns: ':gt(0)'
                },
            ],
        } );

    } );

    if(all_permission.indexOf("products-delete") == -1)
        $('.buttons-delete').addClass('d-none');

    $('select').selectpicker();

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mario Montero\ERP_contable_laravel\resources\views/product/index.blade.php ENDPATH**/ ?>
