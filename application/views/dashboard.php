    <div class="container mt-5">
        <h3 class="text-center">Data Siswa Rabbanii</h3>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="fa-regular fa-plus"></i> Tambah Siswa
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Siswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">  
        <form action="<?php echo base_url().'StudentController/inputData'; ?>" method="post">
          <div class="mb-3">
            <label class="form-label" name="nisn">NISN</label>
            <input type="number" name="nisn" class="form-control w-50" placeholder= "NISN"  required>
          </div>
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control w-75" placeholder="Your Name" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="number" name="age" class="form-control w-25" placeholder="Your Age" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea class="form-control" name="address" rows=4 cols=30 placeholder="Address" required></textarea>
          </div>

          <div class="mt-4 mb-2">
            <button type="submit" class="btn btn-primary">Save Data</button>
            <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Reset</button>
          </div>
        </form>
      </div>
   
    </div>
  </div>
</div>

<?php if (isset($_SESSION['success'])) : ?>
  <!-- Jika memiliki session yang nama nya success maka... -->
  <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
  <?php
    echo $this->session->flashdata('success');
    ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>
 <table class="table mt-3">
    <thead>
        <tr class="table-dark">
        <th scope="col">No</th>
        <th scope="col">NISN</th>
        <th scope="col">Name</th>
        <th scope="col">Age</th>
         <th scope="col">Address</th>
         <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php $no = 1; ?>
     <?php foreach($st as $s) : ?> 
        <!-- cara diatas adalah cara yang banyak programmer gunakan, memang lebih rumit akan tetapi lebih mudah di baca -->
        <tr>
            <td><?php echo $no++ ?></td>
		    	  <td><?php echo $s->nisn ?></td>
		      	<td><?php echo $s->nama ?></td>
            <td><?php echo $s->umur ?></td>
            <td><?php echo $s->alamat ?></td>
            <td>
              <a href="<?php echo base_url().'StudentController/edit/'.$s->id;?>" class="btn btn-primary">Edit</a>
              <a href="<?php echo base_url().'StudentController/delete/'.$s->id;?>" class="btn btn-danger" onclick="return btnDelete()">Delete</a> 
              <!-- di php kita menggabungkan antara tanda petik dan yang diluar nya menggunakan titik -->
            </td>
        </tr>
        <?php endforeach ?>
     </tbody>
 </table>
</div>
<script>
  function btnDelete(){
    return confirm('Apakah  Anda ingin menghapus data ini?')
  }
</script>