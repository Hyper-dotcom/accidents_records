<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header'); ?>

<div class="main-content">
  <section class="section">
    <div class="section-header">
            <h1>Sectoare</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
              <div class="breadcrumb-item">Table</div>
            </div>
          </div>
    <div class="section-body">
      <h2 class="section-title">Sectoare</h2>
      <p class="section-lead">
        Sectoarele in care se imparte compelexul fabricii
        <?php //print_r ($data[0]); ?>
        <div class="row">
        <div class="col-md-12">
                  <!-- <div class="card-header">
                    <h4>Striped</h4>
                  </div> -->
                  <div class="card-body">
                    <!-- <div class="section-title mt-0">Light</div> -->
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Cod </th>
                          <th scope="col">Nume</th>
                          <th scope="col">Suprafata</th>
                          <th scope="col">Latitudine</th>
                          <th scope="col">Longitudine</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php for($k=0; $k < count($data); $k++ ):
                           ?>
                           <tr>
                              <th scope="#"><?php echo $data[$k]["SectorID"]?></th>
                              <td><?php echo $data[$k]['Cod']?></td>
                              <td><?php echo $data[$k]['Nume']?></td>
                              <td><?php echo $data[$k]['Suprafata']?></td>
                              <td><?php echo $data[$k]['Latitudine']?></td>
                              <td><?php echo $data[$k]['Longitudine']?></td>
                          </tr>

                        <?php endfor; ?>

                      </tbody>
                    </table>
                   
                  </div>
                </div>
      </div>
      </p>
    </div>
  </section>
</div>

<?php
$this->load->view('dist/_partials/footer'); ?>