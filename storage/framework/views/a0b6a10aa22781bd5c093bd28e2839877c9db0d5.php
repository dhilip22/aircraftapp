<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Queue')); ?>

        </h2>
        <?php $boot = session('boot') ?>
        <?php if($boot == 0): ?>
        <a class="float-right" href="<?php echo e(route('aircrafts.boot')); ?>" style="margin-top: -27px; margin-left: 10px;">
                <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
  <?php echo e(__('Boot')); ?>

</button></a>
        <?php endif; ?>
<?php if($boot == 1): ?>
        <a class="float-right" href="<?php echo e(route('aircrafts.create')); ?>" style="margin-top: -27px">
                <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
  <svg style="display: inline-block;" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
</svg><?php echo e(__('Enqueue')); ?>

</button></a>
 <?php if(count($airCrafts) > 0 ): ?> 
        <a class="float-right" href="<?php echo e(route('aircrafts.dequeueelement')); ?>" style="margin-top: -27px; margin-right: 10px;">
                <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
 <?php echo e(__('Dequeue')); ?>

</button></a>
        <?php endif; ?>
        <?php endif; ?>
     <?php $__env->endSlot(); ?>

<?php if($boot == 1): ?>

<div class="py-12">
<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200">
          <?php if(count($airCrafts) == 0 ): ?> 
          <div id="alert-message" class="text-white px-6 py-4 border-0 relative mb-4 bg-lightBlue-500">
            <span class="inline-block align-middle mr-8">
              <b class="capitalize">Queue is empty</b>
            </span>
            
          </div>
          <?php endif; ?>
           <?php if(count($airCrafts) > 0 ): ?> 
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Flight Name
              </th>
              <th scope="col" class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Type
              </th>
              <th scope="col" class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Size
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Priority
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Created On
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Updated On
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Action
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
               <?php $__currentLoopData = $airCrafts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $airCraft): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <?php echo e($airCraft->name); ?>

                  </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <?php echo e($airCraft->type); ?>

                  </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($airCraft->size); ?></span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"><?php echo e($airCraft->priority); ?></span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <?php echo e($airCraft->created_at); ?>

              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <?php echo e($airCraft->updated_at); ?>

              </td>
              <td class="text-sm font-medium">
                  <span class="whitespace-nowrap float-right " style="padding-right: 45px;">  
                <a href="/aircraft/edit/<?php echo e($airCraft->id); ?>" class="text-gray-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
  <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
  <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                    </svg></a> </span>
                 
              </td>
            </tr>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
           <?php endif; ?>
      </div>
    </div>
  </div>
</div>
        
        
    </div>
<?php endif; ?>

 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\AircraftApp\resources\views/air_craft/index.blade.php ENDPATH**/ ?>