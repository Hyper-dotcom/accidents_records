<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard Evidenta Accidentelor dintr-o fabrica</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Angajati</h4>
            </div>
            <div class="card-body">
              <?php echo $countAngajati[0]['Total'] ?>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-info">
            <i class="far fa-calendar-times"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Ultimul accident:<?php echo $mostRecentAcc[0]['Data']; ?></h4>
            </div>
            <div class="card-body">
              <?php echo $mostRecentAcc[0]['NumeDepartament'] ?>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-building"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Departamente</h4>
            </div>
            <div class="card-body">
              <?php echo $countDep[0]['Total'] ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="fas fa-fire"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Accidente</h4>
            </div>
            <div class="card-body">
              <?php echo $countAccidente[0]['Total'] ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-stats">
            <div class="card-stats-title">Statistici Accidente
            </div>
            <div class="card-stats-items">
              <div class="card-stats-item">
                <div class="card-stats-item-count"><?php echo $countRaniti[0]['Total'] ?></div>
                <div class="card-stats-item-label">Raniti</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count"><?php echo $countDecedati[0]['Total'] ?></div>
                <div class="card-stats-item-label">Decedati</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count"><?php echo $countInvalizi[0]['Total'] ?></div>
                <div class="card-stats-item-label">Invalizi</div>
              </div>
            </div>
          </div>
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-user-injured"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total victime</h4>
            </div>
            <div class="card-body">
              <?php echo $countInvalizi[0]['Total'] + $countDecedati[0]['Total'] + $countRaniti[0]['Total']; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-stats">
            <div class="card-stats-title">Statistici Sector
              <div class="dropdown d-inline">
                <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month"><?php echo $s0[0]['Nume']; ?></a>
                <ul class="dropdown-menu dropdown-menu-sm">
                  <li class="dropdown-title">Selectare Sector</li>
                  <?php foreach ($sectoare as $k => $val) { ?>
                    <li><a href="<?php echo base_url() . 'home/index/' . $val["SectorID"]; ?>" class="dropdown-item"><?php echo $val['Nume'] ?></a></li>
                  <?php } ?>
                </ul>

              </div>
            </div>
            <div class="card-stats-items">
              <div class="card-stats-item">
                <div class="card-stats-item-count"><?php echo $s2[0]['total'] ? $s2[0]['total'] : "0"; ?></div>
                <div class="card-stats-item-label">Raniti</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count"><?php echo $s3[0]['total'] ? $s3[0]['total'] : "0"; ?></div>
                <div class="card-stats-item-label">Decedati</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count"><?php echo $s1[0]['total'] ? $s1[0]['total'] : "0"; ?></div>
                <div class="card-stats-item-label">Invalizi</div>
              </div>
            </div>
          </div>
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-house-damage"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Accidente</h4>
            </div>
            <div class="card-body">
              <?php echo $s0[0]['accidente']; ?>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-stats">
            <div class="card-stats-title">Accidente Manageri
            </div>
            <div class="card-stats-items">
              <div class="card-stats-item">
                <div class="card-stats-item-count"><?php echo $topM[0]['Accidente'] ?></div>
                <div class="card-stats-item-label"><?php echo $topM[0]['Nume'] ?></div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count"><?php echo $topM[1]['Accidente'] ?></div>
                <div class="card-stats-item-label"><?php echo $topM[1]['Nume'] ?></div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count"><?php echo $topM[2]['Accidente'] ?></div>
                <div class="card-stats-item-label"><?php echo $topM[2]['Nume'] ?></div>
              </div>
            </div>
          </div>
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-male"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Top Departament:
                <?php echo $countVictimsForTopDepartament[0]["NumeDepartament"] . "<br>";
                echo "Manager: " . $countVictimsForTopDepartament[0]["Manager"] ?></h4>
            </div>
            <div class="card-body">
              Victime:<?php //echo $countVictimsForTopDepartament[0]["NumeDepartament"].":"; 
                      ?>
              <?php echo $countVictimsForTopDepartament[0]["victime"] ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card">
          <div class="card-header">
            <h4>Top Accidente pe Departamente si Managerul acestora</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                  <?php foreach ($managerAccidents as $k => $val) {
                    if ($k >= count($managerAccidents) / 2) {
                      break;
                    };
                  ?>
                    <div class="text-title mb-2"><?php echo $val['NumeDepartament']; ?></div>
                    <li class="media">
                      <img class="img-fluid mt-1 img-shadow" src="<?php echo base_url(); ?>assets/modules/ionicons/png/png/stats-bars.png" alt="image" width="40">

                      <div class="media-body ml-3">
                        <div class="media-title"><?php echo $val['Nume'] ?></div>
                        <div class="text-small text-muted"><?php echo $val['Accidente'] ?>
                          <i class="fas <?php echo ($k % 2 == 0) ? "fa-caret-down text-success" : "fa-caret-up text-danger" ?>"></i>
                        </div>
                        <!-- <i class="fas fa-caret-up text-<?php echo ($k % 2 == 0) ? "success" : "danger" ?>"></i></div> -->
                      </div>
                    </li>
                  <?php } ?>
                </ul>
              </div>
              <div class="col-sm-6 mt-sm-0 mt-4">
                <?php foreach ($managerAccidents as $k => $val) {
                  if ($k < count($managerAccidents) / 2) {
                    continue;
                  }
                ?>
                  <div class="text-title mb-2"><?php echo $val['NumeDepartament']; ?></div>
                  <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                    <li class="media">
                      <img class="img-fluid mt-1 img-shadow" src="<?php echo base_url(); ?>assets/modules/ionicons/png/png/stats-bars.png" alt="image" width="40">
                      <div class="media-body ml-3">
                        <div class="media-title"><?php echo $val['Nume']; ?></div>
                        <div class="text-small text-muted">
                          <?php echo $val['Accidente'] ?>
                          <i class="fas <?php echo ($k % 2 == 0) ? "fa-caret-down text-success" : "fa-caret-up text-danger" ?>"></i>
                        </div>
                      </div>
                    </li>
                  <?php } ?>
                  </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4>Categoriile cu cele mai multe victime pe departament</h4>
            <!-- <div class="card-header-action">
                <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
              </div> -->
          </div>
          <div class="card-body p-0">
            <div class="table-responsive table-invoice">
              <table class="table table-striped">
                <tr>
                  <th>Departament</th>
                  <th>Categorie</th>
                  <th>Victime</th>
                </tr>
                <?php foreach ($CatPerDep as $k => $val) { ?>
                  <tr>
                    <td>
                      <div class="font-weight-600"><?php echo $val['NumeDepartament']; ?></div>
                    </td>
                    <td class="font-weight-600"><?php echo $val['CategorieID']; ?></td>
                    <td>
                      <div class="badge badge-danger"><?php echo $val['victime']; ?></div>
                    </td>
                  </tr>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>

  </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>