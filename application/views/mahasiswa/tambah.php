<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
			  <div class="card-header badge-primary ">
			    Form Tambah Data Mahasiswa
			  </div>
			  <div class="card-body">
			  	<!-- <?php if (validation_errors()): ?>
			  	<div class="alert alert-danger" role="alert">
			  		<?=validation_errors(); ?>
			    	</div>
			  	<?php endif; ?> -->
			     	
				    <form action="" method="post">
				    	<div class="form-group">
				    		<label for="nama"> Nama</label>
				    		<input type="text" class="form-control" id="nama" name="nama" >
				    		<small id="nama" class="form-text text-danger"><?=form_error('nama');  ?></small>
  
				    	</div>
				    	<div class="form-group">
				    		<label for="nim"> Nim</label>
				    		<input type="text" class="form-control" id="nim" name="nim">
				    		<small id="nim" class="form-text text-danger"><?=form_error('nim');  ?></small>
				    	</div>
				    	<div class="form-group">
				    		<label for="email"> Email</label>
				    		<input type="text" class="form-control" id="email" name="email">
				    		<small id="email" class="form-text text-danger"><?=form_error('email');  ?></small>
				    	</div>
				    	<div class="form-group">
				    		<label for="jurusan">Jurusan</label>
						    <select class="form-control" id="jurusan" name="jurusan">
						      <option value=" Teknik Informatika">Teknik Informatika</option>
						      <option value="Teknik Industri">Teknik Industri</option>
						      <option value="Managemant Informatika">Managemant Informatika</option>
						     <option value="Ekonomi Syariah">Ekonomi Syariah</option>
						     <option value="FIKIH">FIKIH</option>
						     
						    </select>
				    	</div>
				    	<button class="btn btn-primary float-right" type="submit">Tambah</button>

				    </form>
			  </div>
			</div>
		</div>
	</div>
</div>