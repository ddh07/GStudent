<?php
require "../../vue/include/header.php";
require '../../logs/MyLogger.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Vider le fichier log si demandé
if (isset($_POST['clear_log']) && file_exists($log_file)) {
    file_put_contents($log_file, '');
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Récupération des filtres
$search = $_GET['search'] ?? '';
$date_filter = $_GET['date'] ?? '';
$level_filter = $_GET['level'] ?? '';


$all_levels = MyLogger::getNiveauLog();


$logs = MyLogger::getLogContrnt();

?>
<div class="card">

<? if (count(value: $logs) > 0): ?>
    <div class="table-responsive shadow-sm">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Date/Heure</th>
                    <th>Niveau</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($logs as $log): ?>
                    <tr>
                        <td><?= htmlspecialchars($log['timestamp']) ?></td>
                        <td>
                            <span class="badge 
                                    <?= $log['level'] === 'INFO' ? 'bg-info text-dark' : ($log['level'] === 'ERROR' ? 'bg-danger' : 'bg-secondary') ?>">
                                <?= $log['level'] ?>
                            </span>
                        </td>
                        <td><?= htmlspecialchars($log['message']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
<?php else: ?>
    <div class="alert alert-warning text-center">Aucune ligne trouvée pour ce filtre.</div>
<?php endif; ?>
</div>
</main>