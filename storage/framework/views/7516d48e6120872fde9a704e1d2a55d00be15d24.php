<div class="row border-bottom">
    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" method="post" action="/">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search" />
                </div>
            </form>
        </div>
        <ul class="nav navbar-top-links navbar-right">

            <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php echo e(Auth::user()->name); ?>

                    <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu animated fadeInRight pull-right">
                    <li><a href="<?php echo e(url('admin/users', Auth::user()->id)); ?>"><i class="fa fa-lock"></i>
                            Change Password</a></li>
                    <li>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo e(url('/logout')); ?>"
                           onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> Log out
                            <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                <?php echo e(csrf_field()); ?>

                            </form>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
