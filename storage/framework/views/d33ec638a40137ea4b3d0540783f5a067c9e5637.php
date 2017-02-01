<!-- Main Content -->
<?php $__env->startSection('content'); ?>
<div class="passwordBox animated fadeInDown">
    <div class="row">

        <div class="col-md-12">
            <div class="ibox-content">
                <h2 class="font-bold">Forgot password</h2>
                <p>
                    Enter your email address and your password will be reset and emailed to you.
                </p>
                <?php if(session('status')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-12">
                        <form class="m-t" role="form" method="POST" action="<?php echo e(url('/password/email')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <input type="email" class="form-control" placeholder="Email address" name="email" value="<?php echo e(old('email')); ?>" required="">
                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary block full-width m-b">Send new password <i class="fa fa-refresh "></i></button>
                            <a href="<?php echo e(url('/login')); ?>" class="btn btn-default block full-width m-b">Login <i class="fa fa-sign-in"></i></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            <?php echo e(config('app.name')); ?>

        </div>
        <div class="col-md-6 text-right">
            <small>&copy; <?php echo e(date('Y')); ?></small>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>