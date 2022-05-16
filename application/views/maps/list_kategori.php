<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tabel User</h4>
                  <p class="card-description">
                   <a href="<?= site_url('map/addKategori')?>"class="btn btn-info btn-rounded btn-fw">Tambah Kategori</a>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            No
                          </th>
                          <th>
                            Nama Kategori
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                        <?php $i=1; foreach($kategoris as $kategori) { ?>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                          <?=$i++?>
                          </td>
                          <td>
                          <?=$kategori->nama_kategori?>
                          </td>
                          <td><a href="<?=site_url('map/editKategori/'.$kategori->id_kategori)?>" class="btn btn-success btn-sm" > Edit</td>
                          <td><a href="<?=site_url('map/deleteKategori/'.$kategori->id_kategori)?>" class="btn btn-danger btn-sm" onclick="return confirm('are you sure ?')">Delete</td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
           </div>