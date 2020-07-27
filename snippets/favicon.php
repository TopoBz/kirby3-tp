<?php
/** @var Kirby\Cms\Field */
$favicon = site()->favicon();
if ($favicon->isEmpty() || !($image = $favicon->toFile())) {
    return;
}
/** @var Kirby\Cms\File $image */
?>

<link rel="icon" type="<?= $image->mime() ?>" href="<?= $image->url() ?>" sizes="64x64">
