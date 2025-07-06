<?php
require "../../vue/include/header.php";
require "../../classes/Etudiant.php";
require "../../classes/Connexion.php";
require "../../classes/Filiere.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$pdo = Connexion::getConnection();

$etudiantModel = new Etudiant($pdo);
$filiereModel = new Filiere($pdo);

$etudiants = $etudiantModel->getAllEtudiant();

$etudiants_per_page = 8;
$total_etudient = count($etudiants);
$total_pages = ceil($total_etudient / $etudiants_per_page);
$current_page = isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;
$start_index = ($current_page - 1) * $etudiants_per_page;
$etudiant_paginated = array_slice($etudiants, $start_index, $etudiants_per_page);


?>


<section class="section is-main-section">
  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title" style='font-size : 25px;'>
        Liste des étudiants
      </p>
      <a href="#" class="card-header-icon">
        <span class="icon"><i class="mdi mdi-reload"></i></span>
      </a>
    </header>
    <div class="card-content">
      <div class="b-table has-pagination">
        <div class="table-wrapper has-mobile-cards">
          <? if (count($etudiants) > 0): ?>
            <table class="table is-fullwidth is-striped is-hoverable is-fullwidth">
              <thead>
                <tr>
                  <th class="is-checkbox-cell">
                    <label class="b-checkbox checkbox">
                      <input type="checkbox" value="false">
                      <span class="check"></span>
                    </label>
                  </th>
                  <th></th>
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>filière</th>
                  <th>Date d'inscription</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($etudiant_paginated as $etudiant): ?>
                  <tr>
                    <td class="is-checkbox-cell">
                      <label class="b-checkbox checkbox">
                        <input type="checkbox" value="false">
                        <span class="check"></span>
                      </label>
                    </td>
                    <td class="is-image-cell">
                      <div class="image">
                        <img src="../../public/imgs/pp_F_1.png" class="is-rounded">
                      </div>
                    </td>
                    <td><?= htmlspecialchars($etudiant['nom_etudiant']) ?></td>
                    <td><?= htmlspecialchars($etudiant['prenom_etudiant']) ?></td>
                    <td><?= htmlspecialchars($filiereModel->getFiliereById($etudiant['filiere'])['libelle_filiere']) ?></td>
                    <td><?= htmlspecialchars($etudiant['date_inscription']) ?></td>
                    <td class="is-actions-cell">
                      <div class="buttons is-right">
                        <a href="?id=<?php echo $etudiant['id_etudiant']; ?>#editModal" role="button" class="button is-small button__link" style="background: transparent;">
                          <span class="icon"><i class='fas fa-edit' style='font-size:24px;color:darkblue'></i></span>
                        </a>

                        <a href="?id=<?php echo $etudiant['id_etudiant']; ?>#modal" role="button" class="button is-small button__link" style="background: transparent;">
                          <span class="icon"><i class='fas fa-trash' style='font-size:24px;color:red'></i></span>
                        </a>
                      </div>
                    </td>

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

  <!-- Modal -->
  <div class="modal-wrapper" id="modal">
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Attention</p>
        <button onclick="window.location.href='#'" class="delete jb-modal-close" aria-label="close"></button>
      </header>
      <section class="modal-card-body">
        <p>Vous etes sur le point de suprimer un etudiant <b>cela est ireversible</b></p>
        <p>Continuer ?</p>
      </section>
      <footer class="modal-card-foot">
        <a href="#" class="button jb-modal-close">Annuler</a>
        <a href="/model/etudiant/supprimer_etudiant.php?id=<?php echo $_GET['id']; ?>" class="button is-danger jb-modal-close">Supprimer</a>
      </footer>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal-wrapper" id="editModal">
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Modifier un étudiant</p>
        <button class="delete" aria-label="close" onclick="window.location.href='#'"></button>
      </header>
      <form method="POST" action="/model/etudiant/modifier_etudiant.php" enctype="multipart/form-data">
        <section class="modal-card-body">
          <input type="hidden" name="id_etudiant" id="edit-id" value="<? echo $_GET['id']; ?>">
          <? $myEtudiant = $etudiantModel->getEtudiant($_GET['id']); ?>
          <div class="field">
            <label class="label">Nom</label>
            <div class="control">
              <input class="input" type="text" name="nom_etudiant" id="edit-nom" value="<? echo $myEtudiant['nom_etudiant']; ?>" required>
            </div>
          </div>

          <div class="field">
            <label class="label">Prénom</label>
            <div class="control">
              <input class="input" type="text" name="prenom_etudiant" id="edit-prenom" value="<? echo $myEtudiant['prenom_etudiant']; ?>" required>
            </div>
          </div>

          <div class="field">
            <label class="label">Âge</label>
            <div class="control">
              <input class="input" type="number" name="age" id="edit-age" value="<? echo $myEtudiant['age']; ?>" required min="1">
            </div>
          </div>

          <div class="field">
            <label class="label">Date de naissance</label>
            <div class="control">
              <input class="input" type="date" name="date_naissance" id="edit-naissance" pattern="\d{4}-[A-Za-z]{3}-\d{2}" value="<? echo $myEtudiant['date_naissance']; ?>" required>
            </div>
          </div>

          <div class="field">
            <label class="label">Filière</label>
            <div class="control">
              <div class="select is-fullwidth">
                <select name="filiere" id="edit-filiere" required>
                  <? $filieres = $filiereModel->getAllFiliere(); ?>
                  <option value="">-- Sélectionner une filière --</option>
                  <? foreach ($filieres as $filiere) {
                  ?>
                    <option value="<? echo $filiere['id_filiere']; ?>"><? echo $filiere['libelle_filiere']; ?></option>
                  <? } ?>
                </select>
              </div>
            </div>
          </div>

          <div class="field">
            <label class="label">Date d'inscription</label>
            <div class="control">
              <input class="input" type="date" name="date_inscription" value="<? echo $myEtudiant['date_inscription']; ?>" pattern="\d{4}-[A-Za-z]{3}-\d{2}" id="edit-date">
            </div>
          </section>
        </form>
    <footer class="modal-card-foot">
      <button type="submit" class="button is-success">Enregistrer</button>
      <a href="#" class="button jb-modal-close">Annuler</a>
    </footer>
</div>
</div>
</section>