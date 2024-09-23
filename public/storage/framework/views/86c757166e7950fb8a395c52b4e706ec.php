<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Permission')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <div class="breadcrumb-item"><?php echo e(__('Permission')); ?></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">

        <div class="main-content">
            <section class="section">
                
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between w-100">
                                        <h4> <?php echo e(__('Manage Permission')); ?></h4>

                                        

                                        <a href="#" data-url="<?php echo e(route('permissions.create')); ?>"
                                            class="btn btn-icon icon-left btn-primary" data-ajax-popup="true"
                                            data-title="<?php echo e(__('Add Permission')); ?>" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="<?php echo e(__('Add Permission')); ?>">

                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 49.861 49.861">
                                                    <path
                                                        d="M45.963 21.035h-17.14V3.896C28.824 1.745 27.08 0 24.928 0s-3.896 1.744-3.896 3.896v17.14H3.895C1.744 21.035 0 22.78 0 24.93s1.743 3.895 3.895 3.895h17.14v17.14c0 2.15 1.744 3.896 3.896 3.896s3.896-1.744 3.896-3.896v-17.14h17.14c2.152 0 3.896-1.744 3.896-3.895a3.9 3.9 0 0 0-3.898-3.896z"
                                                        fill="#ffffff" />
                                                </svg>
                                            </span>
                                            <?php echo e(__('Create')); ?>

                                        </a>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <div class="row">
                                                <div class="col-sm-12 card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped dataTable">
                                                            <thead class="">
                                                                <tr>
                                                                    <th scope="col" style="width: 88%;">
                                                                        <?php echo e(__('title')); ?></th>
                                                                    <th scope="col" style="width: 12%;">
                                                                        <?php echo e(__('Action')); ?>

                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <tr role="row">
                                                                        <td><?php echo e($permission->name); ?></td>
                                                                        <td>
                                                                            
                                                                            <div class="action-btn bg-info ms-2">
                                                                                <a href="#"
                                                                                    class="btn btn-outline btn-sm blue-madison"
                                                                                    data-url="<?php echo e(route('permissions.edit', $permission->id)); ?>"
                                                                                    data-ajax-popup="true" data-size="md"
                                                                                    data-bs-toggle="tooltip"
                                                                                    title="<?php echo e(__('Edit')); ?>"
                                                                                    data-title="<?php echo e(__('Update Designation')); ?>"
                                                                                    data-bs-original-title="<?php echo e(__('Edit')); ?>">
                                                                                    <i class="ti ti-pencil text-white"></i>
                                                                                </a>
                                                                            </div>

                                                                            

                                                                            <div class="action-btn bg-danger ms-2">
                                                                                <?php echo Form::open([
                                                                                    'method' => 'DELETE',
                                                                                    'route' => ['permissions.destroy', $permission->id],
                                                                                    'id' => 'delete-form-' . $permission->id,
                                                                                ]); ?>

                                                                                <a href="#"
                                                                                    class="mx-3 btn btn-sm  align-items-center bs-pass-para"
                                                                                    data-bs-toggle="tooltip" title="<?php echo e(__('Delete')); ?>"
                                                                                    data-bs-original-title="Delete"
                                                                                    aria-label="Delete"><i
                                                                                        class="ti ti-trash text-white"></i></a>
                                                                                </form>
                                                                            </div>

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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\hrmgo\resources\views/permission/index.blade.php ENDPATH**/ ?>