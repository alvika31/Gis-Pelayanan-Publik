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
                   <a href="<?= site_url('user/add')?>"class="btn btn-info btn-rounded btn-fw">Tambah Data</a>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            No
                          </th>
                          <th>
                            Username
                          </th>
                          <th>
                            User Type
                          </th>
                          <th>
                            Email
                          </th>
                          <th colspan="2">
                            Action
                          </th>
                        </tr>
                        <?php $i=1; foreach($users as $user) { ?>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                          <?=$i++?>
                          </td>
                          <td>
                          
                          </td>
                          <td>
                          <?=$user->level?>
                          </td>
                          <td>
                          <?=$user->email?>
                          </td>
                          <td><a href="<?=site_url('user/edit/'.$user->user_id)?>" class="btn btn-success btn-sm" > Edit</td>
                          <td><a href="<?=site_url('user/delete/'.$user->user_id)?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Mau Menghapus Akun <?=$user->nama_lengkap?> ?')">Delete</td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
           </div>