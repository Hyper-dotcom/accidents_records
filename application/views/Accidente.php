<?php
//Am folosit o tema de Codeigniter realizata cu Bootstrap 4 si toate view urile sunt create
//cu un format de tabel (cu row si col) si div-uri la care se adauga clasele din Bootstrap
defined('BASEPATH') or exit('No direct script access allowed');
//incarcare header
$this->load->view('dist/_partials/header'); ?>

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Accidente</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
        <div class="breadcrumb-item">Table</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Accidentele ce au avut loc in fabrica</h2>
      <a class="button btn btn-primary float-right mb-" href=<?php echo base_url('Accidente/accident'); ?>>
        <span>Adaugare Accident</span>
      </a>
      <br>
      <p class="section-lead mt-2">

        <?php
        ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Data</th>
                  <th scope="col">DepartamentID</th>
                  <th scope="col">Raniti</th>
                  <th scope="col">Decedati</th>
                  <th scope="col">Invalizi</th>
                  <th scope="col">Actiuni</th>
                </tr>
              </thead>
              <tbody>
                <?php for ($k = 0; $k < count($data); $k++) : //realizare tabel cu ajutorul php
                ?>
                  <tr>
                    <th scope="#"><?php echo $data[$k]["AccidentID"] ?></th>
                    <td><?php echo $data[$k]['Data'] ?></td>
                    <td><?php echo $data[$k]['NumeDepartament'] ?></td>
                    <td><?php echo $data[$k]['Raniti'] ?></td>
                    <td><?php echo $data[$k]['Decedati'] ?></td>
                    <td><?php echo $data[$k]['Invalizi'] ?></td>
                    <td>
                      <!-- Coloana Actions in care pun linkurile(adaug ID ul) pentru edit si stergere -->
                      <a <?php echo 'href="Accidente/accident/' . $data[$k]['AccidentID'] . '"'; ?> class="btn btn-primary btn-icon" title="Editare" data-toogle="tooltip">
                        <i class="fa fa-edit"></i></a>
                      <a <?php echo 'href="Accidente/delete/' . $data[$k]['AccidentID'] . '"'; ?> class="btn btn-danger btn-icon" title="Stergere">
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
//incarcare footer
$this->load->view('dist/_partials/footer'); ?> 