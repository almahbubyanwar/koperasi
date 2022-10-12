<?php if (isset($component)) { $__componentOriginalf07d3144b68f55b28b7fd7d35e351c51265924a8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Popup::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('popup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Popup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <h1>Edit</h1>
    <form action="<?php echo e(route('user.update', 0)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <input type="hidden" id="id" name="id">
        <div>
            <label for="name">Nama</label>
            <input type="text" id="nameEdit" name="name">
        </div>
        <div>
            <label for="password">Password Lama</label>
            <input type="password" id="oldPasswordEdit" name="oldPassword">
        </div>
        <div>
            <label for="password">Password Baru</label>
            <input type="password" id="newPasswordEdit" name="newPassword">
        </div>
        <div>
            <label for="level">Level</label>
            <input type="text" id="levelEdit" name="level">
        </div>
        <button type="submit" class="bubsbutton">Submit</button>
    </form>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf07d3144b68f55b28b7fd7d35e351c51265924a8)): ?>
<?php $component = $__componentOriginalf07d3144b68f55b28b7fd7d35e351c51265924a8; ?>
<?php unset($__componentOriginalf07d3144b68f55b28b7fd7d35e351c51265924a8); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Mabubi\Documents\Personal Files and Projects\Codes\homework\laravel\koperasi\resources\views/components/user/edit-popup.blade.php ENDPATH**/ ?>