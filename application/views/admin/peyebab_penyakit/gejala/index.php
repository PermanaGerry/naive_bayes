<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<div class="content-wrapper" style="min-height: 1136px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <?php echo $pagetitle; ?>
    <?php echo $breadcrumb; ?>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <!-- left column -->
      <div class="col-md-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">List Gejala</h3>
            <div class="pull-right">
              <div class="btn-group pull-right grid-create-btn" style="margin-right: 10px">
                <a id="form" class="btn btn-block btn-warning create"
                  href="<?= base_url('admin/penyakit/penyebab-gejala/'.$penyakit->code); ?>">
                  <i class="fa fa-arrow-left"></i> Back
                </a>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form id="create-gejala" action="<?= base_url('admin/penyakit/penyebab-gejala/'.$penyakit->code).'/gejala/save'; ?>"
              method="POST">
              <table id="table-penyebab-gejala" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Code</th>
                    <th>Nama Gejala</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                      $no = 1;
                      foreach($gejalas as $gejala) : 
                  ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $gejala->code; ?></td>
                    <td><?= $gejala->nama_gejala; ?></td>
                    <td>
                      <div class="form-group">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="check_list[]" value="<?= $gejala->code; ?>">
                          </label>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Code</th>
                    <th>Nama Gejala</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </form>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary" 
            onclick="event.preventDefault(); document.getElementById('create-gejala').submit();">Submit</button>
            <a href="<?= base_url('admin/penyakit/penyebab-gejala/'.$penyakit->code).'/gejala'; ?>"
              class="btn btn-primary pull-right">Reset</a>
          </div>
        </div>
        <!-- /.box -->
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>