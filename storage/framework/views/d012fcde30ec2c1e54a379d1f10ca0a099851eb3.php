<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(config('app.name')); ?> </title>
    <link rel="stylesheet" href="<?php echo asset('css/vendor.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>" />

</head>
<body class="gray-bg"`>
<!--Content-->
<?php echo $__env->yieldContent('content'); ?>
<!--Content-->

<script src="<?php echo asset('js/app.js'); ?>" type="text/javascript"></script>

<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
