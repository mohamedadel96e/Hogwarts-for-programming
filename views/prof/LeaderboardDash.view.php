<?php

use Models\Student;
include base_path('views/partials/header.php');
include base_path('views\partials\dashSideHead.php');
use Config\Config;
require_once 'models/House.php';
use Models\House;

$HousesModel = new House();
$houses = $HousesModel->getAll();
$studentModel = new Student();
$students = $studentModel->getAllLeaderboard();
?>

<main class="p-6 space-y-8">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-gryffindorRed/5 to-darkRed/5">
            <h2 class="text-2xl font-bold text-gryffindorRed flex items-center gap-3">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                Houses Leaderboard
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
                        <tr
                            class="hover:bg-gray-50/50 transition-colors <?= $houseColors[$house['name']] ?? 'bg-gray-50' ?>">
                            <td class="p-5 font-semibold text-lg">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 rounded-lg bg-gradient-to-r <?= $houseColors[$house['name']] ?? '' ?> flex items-center justify-center">
                                        <?php if ($house['name'] === 'Gryffindor'): ?>
                                            <img src="../../assets/photos/<?= $house['name'] ?>.png"
                                                class="w-8 h-8 text-red-700" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                            </img>
                                        <?php elseif ($house['name'] === 'Slytherin'): ?>
                                            <img src="../../assets/photos/<?= $house['name'] ?>.png"
                                                class="w-8 h-8 text-emerald-700" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                            </img>
                                        <?php elseif ($house['name'] === 'Hufflepuff'): ?>
                                            <img src="../../assets/photos/<?= $house['name'] ?>.png"
                                                class="w-8 h-8 text-amber-700" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                            </img>
                                        <?php else: ?>
                                            <img src="../../assets/photos/<?= $house['name'] ?>.png"
                                                class="w-8 h-8 text-blue-700" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                            </img>
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

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-slytherinGreen/5 to-darkSlate/5">
            <h2 class="text-2xl font-bold text-slytherinGreen flex items-center gap-3">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Students Leaderboard
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50/80 backdrop-blur-sm">
                    <tr class="text-left text-sm font-semibold text-gray-700">
                        <th class="p-5 w-20">Rank</th>
                        <th class="p-5">Student</th>
                        <th class="p-5">House</th>
                        <th class="p-5">Points</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach ($students as $index => $student):
                        $houseName = Config::HOUSES[$student['house_id']];
                        $houseColors = [
                            'Gryffindor' => 'bg-red-100 text-gryffindorRed',
                            'Slytherin' => 'bg-emerald-100 text-slytherinGreen',
                            'Hufflepuff' => 'bg-amber-100 text-hufflepuffYellow',
                            'Ravenclaw' => 'bg-blue-100 text-ravenclawBlue'
                        ];
                        ?>
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="p-5 font-bold">
                                <div class="flex items-center gap-2">
                                    <?php if ($index === 0): ?>
                                        🥇
                                    <?php elseif ($index === 1): ?>
                                        🥈
                                    <?php elseif ($index === 2): ?>
                                        🥉
                                    <?php else: ?>
                                        <span class="text-gray-500">#<?= $index + 1 ?></span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="p-5 font-semibold">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="<?= $houseColors[$houseName] ?> w-10 h-10 rounded-full flex items-center justify-center">
                                        <?= substr(htmlspecialchars($student['name']), 0, 1) ?>
                                    </div>
                                    <?= htmlspecialchars($student['name']) ?>
                                </div>
                            </td>
                            <td class="p-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 flex items-center justify-center">
                                        <img src="../../assets/photos/<?= $houseName ?>.png" class="w-6 h-6"
                                            alt="<?= $houseName ?> emblem">
                                    </div>
                                    <span class="font-medium <?= strtolower($houseName) ?>-text">
                                        <?= $houseName ?>
                                    </span>
                                </div>
                            </td>
                            <td class="p-5 font-bold text-xl text-gryffindorRed">
                                <?= number_format($student['points']) ?> ✨
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

</body>
</html>