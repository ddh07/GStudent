<?php
require "../../vue/include/header.php";
require "../../classes/filiere.php";
require "../../classes/Connexion.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$pdo = Connexion::getConnection();

$filiereModel = new Filiere($pdo);

$filiere = $filiereModel->getAllFiliere() ;


$filiere_per_page = 8;
$total_filiere = count($filiere);
$total_pages = ceil($total_filiere / $filiere_per_page);
$current_page = isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;
$start_index = ($current_page - 1) * $filiere_per_page;
$filiere_paginated = array_slice($filiere, $start_index, $filiere_per_page);


?>


<section class="section is-main-section">
  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title" style='font-size : 25px;'>
        Liste des filière
      </p>
      <a href="#" class="card-header-icon">
        <span class="icon"><i class="mdi mdi-reload"></i></span>
      </a>
    </header>
    <div class="card-content">
      <div class="b-table has-pagination">
        <div class="table-wrapper has-mobile-cards">
          <? if (count($filiere) > 0): ?>
            <table class="table is-fullwidth is-striped is-hoverable is-fullwidth">
              <thead>
                <tr>
                  <th class="is-checkbox-cell">
                    <label class="b-checkbox checkbox">
                      <input type="checkbox" value="false">
                      <span class="check"></span>
                    </label>
                  </th>
                  <th>Filiere</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($filiere_paginated as $mfiliere): ?>
                  <tr>
                    <td class="is-checkbox-cell">
                      <label class="b-checkbox checkbox">
                        <input type="checkbox" value="false">
                        <span class="check"></span>
                      </label>
                    </td>
                    <td><?= htmlspecialchars($mfiliere['libelle_filiere']) ?></td>
                    <td><?= htmlspecialchars($mfiliere['description_filiere']) ?></td>
                  </tr>

                <?php endforeach; ?>

              </tbody>
            </table>
          <?php endif; ?>
        </div>
        <div class="notification">
          <div class="level">
            <div class="level-left">
              <div class="level-item">
                <div class="buttons has-addons">
                  <?php if ($current_page > 1): ?>

                    <a class="page-link" href="?<?= http_build_query(array_merge($_GET, ['page' => $current_page - 1])) ?>"><i class='fas fa-backward'></i> Précédent</a>

                  <?php endif; ?>
                  <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="button <?= ($i == $current_page) ? 'is-active' : '' ?>">
                      <a class="page-link" href="?<?= http_build_query(array_merge($_GET, ['page' => $i])) ?>"><?= $i ?></a>
                    </li>
                  <?php endfor; ?>

                  <?php if ($current_page < $total_pages): ?>

                    <a class="page-link" href="?<?= http_build_query(array_merge($_GET, ['page' => $current_page + 1])) ?>"> Suivant <i class='fas fa-forward'></i></a>

                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="level-right">
              <div class="level-item">
                <small>Page <? echo $current_page; ?> of <? echo $total_pages; ?></small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>