<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header'); ?>

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Angajati</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
        <div class="breadcrumb-item">Table</div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Datele persoanelor angajate in fabrica</h2>
      <a class="button btn btn-primary float-right" href=<?php echo base_url('Angajati/angajat'); ?>>
        <span>Adaugare angajat</span>
      </a> 
      <form class="form-inline mr-auto" method="POST">
        <div class="">
          <input id="searchTerm" name="searchTerm" class="form-control" type="search" placeholder="Search" aria-label="Search" 
          data-width="250" value= "<?php echo $this->input->post("searchTerm") ?>">
          <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </div>
      </form>
      <p class="section-lead">
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
                  <th scope="col">CNP</th>
                  <th scope="col">Nume</th>
                  <th scope="col">Prenume</th>
                  <th scope="col">Sex</th>
                  <th scope="col">Departament</th>
                  <th scope="col">Data Angajare</th>
                  <th scope="col">Actiuni</th>
                </tr>
              </thead>
              <tbody>
                <?php for ($k = 0; $k < count($data); $k++) :
                ?>
                  <tr>
                    <th scope="#"><?php echo $data[$k]["AngajatID"] ?></th>
                    <td><?php echo $data[$k]['CNP'] ?></td>
                    <td><?php echo $data[$k]['Nume'] ?></td>
                    <td><?php echo $data[$k]['Prenume'] ?></td>
                    <td><?php echo $data[$k]['Sex'] ?></td>
                    <td><?php echo $data[$k]['NumeDepartament'] ?></td>
                    <td>
                      <?php
                      if (isset($data[$k]['DataAngajarii']))
                        echo $data[$k]['DataAngajarii'];
                      else echo "Confidential";
                      ?>
                    </td>
                    <td>
                      <a <?php echo 'href="Angajati/angajat/' . $data[$k]['AngajatID'] . '"'; ?> class="btn btn-primary btn-icon" title="Editare" data-toogle="tooltip">
                        <i class="fa fa-user-edit"></i></a>
                      <a <?php echo 'href="Angajati/delete/' . $data[$k]['AngajatID'] . '"'; ?> class="btn btn-danger btn-icon" title="Stergere">
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