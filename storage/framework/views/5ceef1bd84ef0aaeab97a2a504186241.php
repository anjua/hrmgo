<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage User Logs History')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('user.index')); ?>"><?php echo e(__('Users')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('User Logs')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="mt-2" id="multiCollapseExample1">
                <div class="card">
                    <div class="card-body">
                        <?php echo e(Form::open(['route' => ['lastlogin'], 'method' => 'get', 'id' => 'employee_filter'])); ?>

                        <div class="row align-items-center justify-content-end">
                            <div class="col-xl-10">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box"></div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box"></div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box">
                                            <?php echo e(Form::label('month', __('Month'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::month('month', isset($_GET['month']) ? $_GET['month'] : date('Y-m'), ['class' => 'month-btn form-control month-btn'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box">
                                            <?php echo e(Form::label('employee', __('Employee'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::select('employee', $usersList, isset($_GET['employee']) ? $_GET['employee'] : '', ['class' => 'form-control select ', 'id' => 'employee_id'])); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="row">
                                    <div class="col-auto mt-4">
                                        <a href="#" class="btn btn-sm btn-primary"
                                            onclick="document.getElementById('employee_filter').submit(); return false;"
                                            data-bs-toggle="tooltip" title="" data-bs-original-title="apply">
                                            <span class="btn-inner--icon"><i class="ti ti-search"></i></span>
                                        </a>
                                        <a href="<?php echo e(route('lastlogin')); ?>" class="btn btn-sm btn-danger"
                                            data-bs-toggle="tooltip" title="" data-bs-original-title="Reset">
                                            <span class="btn-inner--icon"><i
                                                    class="ti ti-trash-off text-white-off "></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header card-body table-border-style">
                
                <div class="table-responsive">
                    <table class="table" id="pc-dt-simple">
                        <thead>
                            <tr>
                                
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Role')); ?></th>
                                <th><?php echo e(__('Last Login')); ?></th>
                                <th><?php echo e(__('Ip')); ?></th>
                                <th><?php echo e(__('Country')); ?></th>
                                <th><?php echo e(__('Device')); ?></th>
                                <th><?php echo e(__('OS')); ?></th>
                                <th><?php echo e(__('Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $userdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $userdetail = json_decode($user->Details);
                                ?>
                                <tr>
                                    <td><?php echo e(ucfirst($user->user_name)); ?></td>
                                    <td>
                                        <span class="badge p-2 px-3 mt-2 rounded bg-primary">
                                            <?php echo e(ucfirst($user->user_type)); ?>

                                        </span>
                                    </td>
                                    <td><?php echo e(!empty($user->date) ? $user->date : '-'); ?></td>
                                    <td><?php echo e($user->ip); ?></td>
                                    <td><?php echo e(!empty($userdetail->country) ? $userdetail->country : '-'); ?></td>
                                    <td><?php echo e($userdetail->device_type); ?></td>
                                    <td><?php echo e($userdetail->os_name); ?></td>
                                    <td>

                                        <div class="action-btn bg-warning ms-2">
                                            <a href="#" class="mx-3 btn btn-sm align-items-center" data-size="lg"
                                                data-url="<?php echo e(route('userlog.view', [$user->id])); ?>" data-ajax-popup="true"
                                                data-size="md" data-bs-toggle="tooltip" title=""
                                                data-title="<?php echo e(__('View User Logs')); ?>"
                                                data-bs-original-title="<?php echo e(__('View')); ?>">
                                                <i class="ti ti-eye text-white"></i>
                                            </a>
                                        </div>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete User')): ?>
                                            <div class="action-btn bg-danger ms-2">
                                                <?php echo Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['employee.logindestroy', $user->user_id],
                                                    'id' => 'delete-form-' . $user->id,
                                                ]); ?>

                                                <a href="#" class="mx-3 btn btn-sm  align-items-center bs-pass-para"
                                                    data-bs-toggle="tooltip" title="" data-bs-original-title="Delete"
                                                    aria-label="Delete"><i class="ti ti-trash text-white text-white"></i></a>
                                                </form>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\hrmgo\resources\views/employee/lastLogin.blade.php ENDPATH**/ ?>