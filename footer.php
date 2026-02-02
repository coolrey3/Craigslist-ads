<?php
/**
 * Shared footer component.
 * Renders a navigation bar with links to internal tools and external sites.
 */

$footerLinks = [
    ['url' => 'http://start.mobilerepairtechs.com', 'label' => 'POS'],
    ['url' => 'http://www.cellphonerepair.com/gainesville-fl', 'label' => 'Website Front End'],
    ['url' => 'https://www.cellphonerepair.com/gainesville-fl/login/', 'label' => 'Website Back End'],
    ['url' => 'http://facebook.com/mobilerepairtechs', 'label' => 'Facebook'],
    ['url' => 'http://localhost/randomize-duties/', 'label' => 'Tasks'],
    ['url' => 'http://localhost/marketing-cards/', 'label' => 'Marketing Cards'],
    ['url' => 'http://localhost/craigslist-ads/', 'label' => "Craigslist Ads"],
];

// Sort links alphabetically by label
usort($footerLinks, function ($a, $b) {
    return strcasecmp($a['label'], $b['label']);
});
?>
<style>
    .footer-bar {
        height: auto;
        min-height: 20px;
        color: white;
        background-color: #222;
        text-align: center;
        width: 100%;
        padding: 5px 0;
    }
    .footer-bar a {
        color: white;
        text-decoration: none;
        padding: 0 8px;
    }
    .footer-bar a:hover {
        text-decoration: underline;
    }
</style>

<div class="footer-bar">
    <?php
    $linkCount = count($footerLinks);
    foreach ($footerLinks as $index => $link) {
        $url   = htmlspecialchars($link['url'], ENT_QUOTES, 'UTF-8');
        $label = htmlspecialchars($link['label'], ENT_QUOTES, 'UTF-8');
        echo "<a href='{$url}'>{$label}</a>";
        if ($index < $linkCount - 1) {
            echo " | ";
        }
    }
    ?>
</div>
