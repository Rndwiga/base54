<?php $__env->startSection('content'); ?>
    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                

            </div>
            <h3>Register</h3>
            <form class="m-t" role="form" method="POST" action="<?php echo e(url('/register')); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                    <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="Name" required="">
                    <?php if($errors->has('name')): ?>
                        <span class="help-block">
                        <strong><?php echo e($errors->first('name')); ?></strong>
                    </span>
                    <?php endif; ?>
                </div>
                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo e(old('email')); ?>" required="">
                    <?php if($errors->has('email')): ?>
                        <span class="help-block">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                    <?php endif; ?>
                </div>
                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                    <?php if($errors->has('password')): ?>
                        <span class="help-block">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                    </span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
                </div>
                <div class="form-group">
                    <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Register <i class="fa fa-user "></i></button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?php echo e(url('/login')); ?>">Login  <i class="fa fa-sign-in"></i></a>
            </form>
            <p class="m-t"> <small>&copy; <?php echo e(date('Y')); ?> Tyondo Enterprise</small> </p>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>