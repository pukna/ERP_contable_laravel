<?php $__env->startSection('content'); ?>
    <?php if(session()->has('not_permitted')): ?>
        <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('not_permitted')); ?></div>
    <?php endif; ?>
    <?php if(session()->has('message')): ?>
        <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo session()->get('message'); ?></div>
    <?php endif; ?>
    <section>
        <div class="container-fluid">
            <?php if(in_array("suppliers-add", $all_permission)): ?>
                <a href="<?php echo e(route('supplierImp.create')); ?>" class="btn btn-info"><i class="dripicons-plus"></i> <?php echo e(trans('Add Proveedor')); ?></a>
            <?php endif; ?>
        </div>

    <script type="text/javascript">
        $("ul#people").siblings('a').attr('aria-expanded','true');
        $("ul#people").addClass("show");
        $("ul#people #supplier-create-menu").addClass("active");
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mario Montero\ERP_contable_laravel\resources\views/supplierImp/index.blade.php ENDPATH**/ ?>