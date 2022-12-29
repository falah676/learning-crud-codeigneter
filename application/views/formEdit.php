<div class="container mt-5">
  <?php echo validation_errors();?>
    <?php foreach ($s as $s) : ?>
    <form action="<?php echo base_url().'StudentController/update/'.$s->id; ?>" method="post">
              <div class="mb-3">
                <label class="form-label">NISN</label>
                <input type="number" name="nisn" class="form-control w-50" placeholder= "NISN" value="<?php echo $s->nisn ?>" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control w-75" placeholder="Your Name" value="<?php echo $s -> nama ?>" required>
                <?php echo form_error('name'); ?>
              </div>
              <div class="mb-3">
                <label class="form-label">Age</label>
                <input type="number" name="age" class="form-control w-25" placeholder="Your Age" value="<?php echo $s->umur ?>" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea class="form-control" name="address" rows=4 cols=30 placeholder="Address" required> <?php echo $s->alamat ?></textarea>
              </div>
    
              <div class="mt-4 mb-2">
                <button type="submit" class="btn btn-primary">Change Data</button>
                <a href="<?php echo base_url().'StudentController/index';?>" class="btn btn-danger">Back</a>
              </div>
     </form>
     <?php endforeach; ?>
</div>