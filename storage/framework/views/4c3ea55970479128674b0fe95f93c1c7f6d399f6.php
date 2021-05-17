<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Enqueue Aircraft')); ?>

        </h2>
         <a class="float-right" href="<?php echo e(route('aircrafts.index')); ?>" style="margin-top: -27px"><button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
  <?php echo e(__('View')); ?>

</button></a>
     <?php $__env->endSlot(); ?>
<!--    <br> 
 <div class="float-right">
            <a href="<?php echo e(route('aircrafts.index')); ?>"><button class="btn btn-primary"><?php echo e(__('View')); ?></button></a>
            <a href="<?php echo e(route('aircrafts.index')); ?>"><button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
  <?php echo e(__('View')); ?>

</button></a>
        </div>
    <br>    -->
    <br>    


<div class="mt-10 sm:mt-0">
  <div class="md:grid md:grid-cols-3 md:gap-6">

    <div class="mt-5 md:mt-0 md:col-span-5">
      <form method="POST" action="<?php echo e(route('aircrafts.create')); ?>">
          <?php echo csrf_field(); ?>
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">

            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-4 sm:col-span-3">
                    <label for="name" class="block text-sm font-medium text-gray-700">Flight Name <span style="color: red">*</span></label>
                        <input type="text" id="name" name="name" placeholder="Enter the name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                </div>
              <div class="col-span-4 sm:col-span-3">
                <label for="type" class="block text-sm font-medium text-gray-700">Flight Type <span style="color: red">*</span></label>
                <select id="type" name="type" autocomplete="type" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value=""><?php echo e(__('select')); ?></option>
                    <option value="Emergency"><?php echo e(__('Emergency')); ?></option>
                    <option value="VIP"><?php echo e(__('VIP')); ?></option>
                    <option value="Passenger"><?php echo e(__('Passenger')); ?></option>
                    <option value="Cargo"><?php echo e(__('Cargo')); ?></option>
                </select>
              </div>
              <div class="col-span-4 sm:col-span-3">
                <label for="size" class="block text-sm font-medium text-gray-700">Size <span style="color: red">*</span></label>
                <select id="size" name="size" autocomplete="size" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value=""><?php echo e(__('select')); ?></option>
                    <option value="Small"><?php echo e(__('Small')); ?></option>
                    <option value="Large"><?php echo e(__('Large')); ?></option>
                </select>
              </div>

            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <a href="<?php echo e(route('aircrafts.index')); ?>" style="margin-top: -27px"><button type="button" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
  <?php echo e(__('Cancel')); ?>

</button></a>
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Save
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="hidden sm:block" aria-hidden="true">
  <div class="py-5">
    <div class="border-t border-gray-200"></div>
  </div>
</div>

    
<!--    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="<?php echo e(route('aircrafts.create')); ?>">
                         <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <div class="sm:px-6">
                                <label><?php echo e(__('Type')); ?></label>
                                <select name= "type" class="form-control">
                                    <option value=""><?php echo e(__('select')); ?></option>
                                    <option value="emergency"><?php echo e(__('Emergency')); ?></option>
                                    <option value="vip"><?php echo e(__('VIP')); ?></option>
                                    <option value="passenger"><?php echo e(__('Passenger')); ?></option>
                                    <option value="cargo"><?php echo e(__('Cargo')); ?></option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="sm:px-6">
                                <label><?php echo e(__('Size')); ?></label>
                                <select name= "size" class="form-control">
                                    <option value=""><?php echo e(__('select')); ?></option>
                                    <option value="small"><?php echo e(__('Small')); ?></option>
                                    <option value="large"><?php echo e(__('Large')); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn" style="padding: 5px;border-radius: 5px;border-color: #ccc; background-color: #c1c1c1"><?php echo e(__('Save')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>-->


 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\AircraftApp\resources\views/air_craft/create.blade.php ENDPATH**/ ?>