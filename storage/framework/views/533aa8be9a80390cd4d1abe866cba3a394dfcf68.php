<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(config('app.name')); ?> - <?php echo $__env->yieldContent('title'); ?> </title>


    <link rel="stylesheet" href="<?php echo asset('css/vendor.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>" />

</head>
<body>

<!-- Wrapper-->
<div id="wrapper">

    <!-- Navigation -->
<?php echo $__env->make('partials.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Page wraper -->
    <div id="page-wrapper" class="gray-bg">

        <!-- Page wrapper -->
    <?php echo $__env->make('partials.topnavbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Main view  -->
    <?php echo $__env->yieldContent('content'); ?>

    <!-- Footer -->
        <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>
    <!-- End page wrapper-->

</div>
<!-- End wrapper-->

<script src="<?php echo asset('js/app.js'); ?>" type="text/javascript"></script>

<?php echo $__env->yieldContent('scripts'); ?>

</body>
</html>
