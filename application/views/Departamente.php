<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header'); ?>

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Departamente</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
        <div class="breadcrumb-item">Table</div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Departamente</h2>
      <a class="button btn btn-primary float-right" href=<?php echo base_url('Departamente/departament'); ?>>
        <span>Adaugare Departament</span>
      </a>

      <p class="section-lead">
        Departamentele din fabrica
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
                  <th scope="col">Nume</th>
                  <th scope="col">Sector</th>
                  <th scope="col">Manager</th>
                  <th scope="col">Actiuni</th>

                </tr>
              </thead>
              <tbody>
                <?php for ($k = 0; $k < count($data); $k++) :
                ?>
                  <tr>
                    <th scope="#"><?php echo $data[$k]["DepartamentID"] ?></th>
                    <td><?php echo $data[$k]['NumeDepartament'] ?></td>
                    <td><?php echo $data[$k]['Sector'] ?></td>
                    <td><?php echo $data[$k]['ManagerID'] ?></td>
                    <td>
                      <a <?php echo 'href="Departamente/departament/' . $data[$k]['DepartamentID'] . '"'; ?> class="btn btn-primary btn-icon" title="Editare" data-toogle="tooltip">
                        <i class="fa fa-edit"></i></a>
                      <a <?php echo 'href="Departamente/delete/' . $data[$k]['DepartamentID'] . '"'; ?> class="btn btn-danger btn-icon" title="Stergere">
                        <i class="fa fa-trash-alt"></i></a>
                    </td>
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