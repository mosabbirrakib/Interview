<?php $__env->startSection('content'); ?>
<style type="text/css">
	img {
  		border-radius: 50%;
	}
</style>
<div class="container-fluid app-body">
	<div class="card">
		<div class="card-header">
			<h3>History</h3>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-4">
					<div class="input-group">
					    <span class="input-group-addon"><a href="#" id="searchBtn" name="search"><i class="glyphicon glyphicon-search"></i></a></span>
					    <input type="text" name="search" class="form-control" id="search" type="search" placeholder="Search" aria-label="Search">
				    </div>
				</div>
				<div class="col-md-4">
					<div class="input-group" id="">
					    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
					    <input type="date" name="date" id="date" class="form-control" placeholder="Select Date">
				    </div>
				</div>
				<div class="col-md-4">
					<div class="input-group">
						<select class="form-control" id="group" name="group">
							<option value="all_group">All Group</option>
							<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($post->group_id); ?>"><?php echo e($post->group_name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 total-table">
					<table class="table table-hover"> 
						<thead> 
							<tr>
								<th>Group Name</th>
								<th>Group Type</th>
								<th>Account Name</th>
								<th>Post Text</th>
								<th>Time</th>
							</tr>
						</thead> 
						<tbody> 
							<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($post->group_name); ?></td>
									<td><?php echo e($post->group_type); ?></td>
									<td><img src="<?php echo e($post->avatar); ?>" class="" width="50" height="50"></td>
									<td><?php echo e($post->post_text); ?></td>
									<td><?php echo e($post->created_at); ?></td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody> 
					</table>
					<?php echo e($posts->links()); ?>

				</div>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>