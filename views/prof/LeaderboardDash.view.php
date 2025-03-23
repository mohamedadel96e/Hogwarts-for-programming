<?php
include base_path('views/partials/header.php');
include base_path('views\partials\dashSideHead.php');
require_once 'Config/Config.php';
require_once 'models/House.php';
use Models\House;

$HousesModel = new House();
$houses = $HousesModel->getAll();
?>

<main class="p-6">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-gryffindorRed/5 to-darkRed/5">
            <h2 class="text-2xl font-bold text-gryffindorRed flex items-center gap-3">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
                <?= $heading ?> Leaderboard
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50/80 backdrop-blur-sm">
                    <tr class="text-left text-sm font-semibold text-gray-700">
                        <th class="p-5">House</th>
                        <th class="p-5">Points</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach ($houses as $house): ?>
                        <?php
                        $houseColors = [
                            'Gryffindor' => 'from-red-700/20 to-amber-600/20',
                            'Slytherin' => 'from-emerald-700/20 to-slate-600/20',
                            'Hufflepuff' => 'from-amber-700/20 to-black/20',
                            'Ravenclaw' => 'from-blue-700/20 to-bronze-600/20'
                        ];
                        ?>
                        <tr class="hover:bg-gray-50/50 transition-colors <?= $houseColors[$house['name']] ?? 'bg-gray-50' ?>">
                            <td class="p-5 font-semibold text-lg">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-lg bg-gradient-to-r <?= $houseColors[$house['name']] ?? '' ?> flex items-center justify-center">
                                        <?php if($house['name'] === 'Gryffindor'): ?>
                                            <svg class="w-6 h-6 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                            </svg>
                                        <?php elseif($house['name'] === 'Slytherin'): ?>
                                            <svg class="w-6 h-6 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11l7-7 7 7M5 19l7-7 7 7"/>
                                            </svg>
                                        <?php elseif($house['name'] === 'Hufflepuff'): ?>
                                            <svg class="w-6 h-6 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                                            </svg>
                                        <?php else: ?>
                                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                            </svg>
                                        <?php endif; ?>
                                    </div>
                                    <?= htmlspecialchars($house['name']) ?>
                                </div>
                            </td>
                            <td class="p-5 font-bold text-xl text-gryffindorRed">
                                <?= number_format($house['points']) ?> ✨
                            </td>
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include base_path('views/partials/footer.php'); ?>