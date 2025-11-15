<?php
// Проверка дали heading е дефиниран
if (!isset($heading)) {
    $heading = 'Default Heading';
}
?>
<div class="banner bg-gray-100 p-4 mb-6 rounded-md">
    <h1 class="text-2xl font-bold"><?= htmlspecialchars($heading) ?></h1>
</div>
