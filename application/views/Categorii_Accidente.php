<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header'); ?>

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Categorii Accidente</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
        <div class="breadcrumb-item">Table</div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Categorii de accidente</h2>
      <p class="section-lead">
        Categoriile de accidente ce pot surveni
        <?php //print_r ($data[0]); 
        ?>
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
                  <th scope="col">Tipul Accidentului</th>
                  <th scope="col">Descriere</th>
                </tr>
              </thead>
              <tbody>
                <?php for ($k = 0; $k < count($data); $k++) :
                ?>
                  <tr>
                    <th scope="#"><?php echo $data[$k]["CategorieID"] ?></th>
                    <td><?php echo $data[$k]['TipAccident'] ?></td>
                    <td><?php echo $data[$k]['Descriere'] ?></td>
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