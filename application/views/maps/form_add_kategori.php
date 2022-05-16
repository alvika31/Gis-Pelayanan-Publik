<div class="content-wrapper">
<?php
			
			$nama_kategori='';
          

		if(isset($kategori)){
			
			$nama_kategori=$kategori->nama_kategori;
      
		}

	?>
<div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h2 class="card-title">Tambah Kategori</h2>
                <form method="post" class="forms-sample" action="">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nama Kategori</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nama Kategori" name="nama_kategori" value="<?=$nama_kategori?>"  required>
                    </div>

                   
                    <input type="submit" class="btn btn-primary me-2" name="kirim" value="Submit" id="">
                   <a href="<?=site_url('user')?>" class="btn btn-danger">Cancel</a>
                  </form>

                  <div class="modal fade" id="thankyouModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Thank you for pre-registering!</h4>
                        </div>
                        <div class="modal-body">
                            <p>Thanks for getting in touch!</p>                     
                        </div>    
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
                 </div>
  