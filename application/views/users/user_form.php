<div class="content-wrapper">
<?php
			
			$username='';
      $password='';
			$level='';
			$email='';


		if(isset($user)){
			
			$username=$user->username;
      $password=$user->password;
			$level=$user->level;
			$email=$user->email;
		}

	?>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h2 class="card-title">Tambah Data User</h2>
                <form method="post" class="forms-sample" action="">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Username</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" name="username" value="<?=$username?>" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="password" value="<?=$password?>" required>
                    </div>  

                  
                    <div class="form-group">
                      <label for="exampleInputPassword1">Usertype</label>
                      <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="level" id="optionsRadios2" value="Admin" <?=$level=='Admin'?'checked':''?> >
                              Admin
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="level" id="optionsRadios2" value="User" <?=$level=='User'?'checked':''?> >
                              User
                            </label>
                          </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email" value="<?=$email?>" required>
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
  
