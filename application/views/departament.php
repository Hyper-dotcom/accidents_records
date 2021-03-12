<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<?php
$isEdit = false;
//daca pagina e accesata cu un ID setat atunci este un Edit altfel Inserare
if ($id == '')
  $pageTitle = "Adaugare Departament";
else {
  $pageTitle = "Editare Departament";
  $isEdit = true;
}
if ($this->input->post())
  $isEdit = false;
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?php echo $pageTitle ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Forms</a></div>
        <div class="breadcrumb-item"><?php echo $pageTitle ?></div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title"><?php echo $pageTitle ?></h2>
      <!-- <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p> -->
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Departament</h4>
            </div>
            <div class="card-body">
              <?php //echo form_open(); 
              ?>
              <form method="POST">
                <div class="form-group">
                  <label>Nume</label>
                  <input name="NumeDepartament" type="text" class="form-control" value="<?php if ($isEdit) echo $departament['NumeDepartament'];
                                                                                        else echo $this->input->post('NumeDepartament'); ?>">
                </div>

                <div class="form-group">
                  <label>Sector</label>
                  <select class="form-control" name="SectorID">
                    <?php foreach ($secOptions as $k => $val) {
                    ?>
                      <option <?php if ($departament['SectorID'] == $val['SectorID']) echo "selected";
                              else echo ""; ?> value="<?php echo $val['SectorID'] ?>"> <?php echo $val["Nume"] ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Manager</label>
                  <select class="form-control" name="ManagerID">
                    <?php foreach ($managerOptions as $k => $val) {
                    ?>
                      <option <?php if ($departament['ManagerID'] == $val['AngajatID']) echo "selected";
                              else echo ""; ?> value="<?php echo $val['AngajatID'] ?>"> <?php echo $val["Nume"] . " " . $val["Prenume"]; ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="card-footer text-right">
                  <button class="btn btn-primary mr-1" type="submit">Submit</button>
                  <!-- <button class="btn btn-secondary" type="reset">Reset</button> -->
                </div>
                <?php echo form_close() ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>