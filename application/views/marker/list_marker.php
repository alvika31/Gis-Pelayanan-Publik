<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tabel Lokasi</h4>
                  <p class="card-description">
                   <a href="#addLandmarkModal" class="btn btn-info btn-rounded btn-fw" data-toggle="modal">Tambah Data</a>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            No
                          </th>
                          <th>
                            Nama Tempat
                          </th>
                          <th>
                            Tempat Lat
                          </th>
                          <th>
                            Tempat Long
                          </th>
                          <th>
                            Keterangan
                          </th>
                          <th>
                            Gambar
                          </th>
                          <th>
                            Kategori Pelayanan
                          </th>
                          <th colspan="2">
                            Action
                          </th>
                        </tr>
                        <?php $i=1; foreach($join2 as $row) { ?>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                          <?=$i++?>
                          </td>
                          <td>
                          <?=$row->nama_tempat?>
                          </td>
                          <td>
                          <?=$row->tempat_lat?>
                          </td>
                          <td>
                          <?=$row->tempat_long?>
                          </td>
                          <td>
                          <?=$row->keterangan?>
                          </td>
                          <td>
                          <?=$row->gambar?>
                          </td>
                          <td>
                          <?=$row->nama_kategori?>
                          </td>
                          <td><a href="<?=site_url('user/edit/'.$row->id_kategori)?>" class="btn btn-success btn-sm" > Edit</td>
                          <td><a href="<?=site_url('user/delete/'.$row->id_kategori)?>" class="btn btn-danger btn-sm" onclick="return confirm('are you sure ?')">Delete</td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>

           
                  </div>
                  <!-- ADD Modal HTML -->
	<div id="addLandmarkModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?=base_url()?>index.php/map/addMarker1" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<h4 class="modal-title">Add Landmark</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" name="l_name" required>
						</div>

						<div id="map"></div>

						<div class="form-group">
							<label>Latitude</label>
							<input type="text" class="form-control" name="l_lat" required>
						</div>
						<div class="form-group">
							<label>Longitude</label>
							<input type="text" class="form-control" name="l_long" required>
						</div>
						<div class="form-group">
							<label>Detail Information</label>
							<input type="text" class="form-control" name="l_info" required>
						</div>
						<div class="form-group">
							<label>Photo</label>
							<input type="file" class="form-control" name="l_foto" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
                </div>
              </div>
            </div>
           </div>