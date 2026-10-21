<?php
declare(strict_types=1);

/**
 * Technical schematics.
 *
 * Case studies are presented as drawn records rather than
 * photography: the site does not present stock or generated
 * imagery as evidence of work delivered.
 */

function schematic_grid(int $w = 800, int $h = 460): string
{
    $lines = '';
    for ($x = 0; $x <= $w; $x += 20) {
        $lines .= '<line x1="' . $x . '" y1="0" x2="' . $x . '" y2="' . $h . '" />';
    }
    for ($y = 0; $y <= $h; $y += 20) {
        $lines .= '<line x1="0" y1="' . $y . '" x2="' . $w . '" y2="' . $y . '" />';
    }
    return '<g class="sch__grid">' . $lines . '</g>';
}

function schematic_title(string $ref, string $title): string
{
    $x = 800 - 214;
    $y = 460 - 46;
    return '<g class="sch__block">'
        . '<rect x="' . $x . '" y="' . $y . '" width="214" height="46" />'
        . '<text x="' . ($x + 12) . '" y="' . ($y + 19) . '">' . e($ref) . '</text>'
        . '<text x="' . ($x + 12) . '" y="' . ($y + 35) . '" class="sch__block-sub">' . e($title) . '</text>'
        . '</g>';
}

/** Draw a schematic by type. Returns inline SVG markup. */
function schematic(string $type): string
{
    $w = 800;
    $h = 460;

    switch ($type) {
        case 'cold-room':
            $body = '<g class="sch__line">'
                . '<rect x="90" y="90" width="420" height="280" />'
                . '<line x1="210" y1="90" x2="210" y2="370" />'
                . '<line x1="330" y1="90" x2="330" y2="370" />'
                . '<line x1="90" y1="170" x2="510" y2="170" />'
                . '<line x1="90" y1="290" x2="510" y2="290" />'
                . '<rect x="90" y="60" width="420" height="30" />'
                . '<line x1="180" y1="45" x2="180" y2="60" />'
                . '<line x1="420" y1="45" x2="420" y2="60" />'
                . '<rect x="540" y="200" width="70" height="150" />'
                . '<line x1="540" y1="275" x2="610" y2="275" />'
                . '<circle cx="575" cy="235" r="7" />'
                . '<path d="M700 120 l26 0 l0 26 M700 120 l26 26" />'
                . '</g>'
                . '<g class="sch__dim">'
                . '<line x1="90" y1="400" x2="510" y2="400" />'
                . '<line x1="90" y1="392" x2="90" y2="408" />'
                . '<line x1="510" y1="392" x2="510" y2="408" />'
                . '<text x="270" y="394">COLD ROOM ENVELOPE</text>'
                . '<line x1="640" y1="200" x2="640" y2="350" />'
                . '<line x1="632" y1="200" x2="648" y2="200" />'
                . '<line x1="632" y1="350" x2="648" y2="350" />'
                . '<text x="656" y="280">PLANT</text>'
                . '</g>';
            $ref = 'RPP-CLD-01';
            $title = 'Cold room elevation';
            break;

        case 'air-handling':
            $body = '<g class="sch__line">'
                . '<rect x="90" y="180" width="300" height="150" />'
                . '<circle cx="180" cy="255" r="52" />'
                . '<circle cx="180" cy="255" r="18" />'
                . '<line x1="128" y1="255" x2="232" y2="255" />'
                . '<line x1="180" y1="203" x2="180" y2="307" />'
                . '<rect x="300" y="205" width="70" height="100" />'
                . '<line x1="300" y1="230" x2="370" y2="230" />'
                . '<line x1="300" y1="280" x2="370" y2="280" />'
                . '<rect x="390" y="230" width="190" height="50" />'
                . '<rect x="580" y="205" width="110" height="100" />'
                . '<line x1="610" y1="205" x2="610" y2="305" />'
                . '<line x1="640" y1="205" x2="640" y2="305" />'
                . '<line x1="670" y1="205" x2="670" y2="305" />'
                . '</g>'
                . '<g class="sch__arrow">'
                . '<path d="M120 120 h300" />'
                . '<path d="M120 112 l16 8 l-16 8" />'
                . '<text x="120" y="104">SUPPLY AIR</text>'
                . '<path d="M420 340 h-150" />'
                . '<path d="M436 332 l-16 8 l16 8" />'
                . '<text x="270" y="364">EXTRACT</text>'
                . '</g>'
                . '<g class="sch__dim">'
                . '<line x1="90" y1="150" x2="390" y2="150" />'
                . '<text x="200" y="142">AHU SECTION</text>'
                . '<line x1="580" y1="180" x2="690" y2="180" />'
                . '<text x="596" y="172">DUCT RUN</text>'
                . '</g>';
            $ref = 'RPP-AHU-02';
            $title = 'Air handling schematic';
            break;

        case 'cold-chain':
        default:
            $body = '<g class="sch__line">'
                . '<rect x="140" y="80" width="260" height="300" />'
                . '<rect x="160" y="100" width="220" height="260" />'
                . '<line x1="160" y1="230" x2="380" y2="230" />'
                . '<rect x="200" y="200" width="70" height="40" />'
                . '<rect x="185" y="285" width="50" height="34" />'
                . '<rect x="255" y="285" width="50" height="34" />'
                . '<rect x="325" y="285" width="50" height="34" />'
                . '<rect x="440" y="150" width="120" height="70" />'
                . '<text x="456" y="178">+4.0</text>'
                . '<text x="456" y="200">°C</text>'
                . '<line x1="400" y1="185" x2="440" y2="185" />'
                . '</g>'
                . '<g class="sch__arrow">'
                . '<path d="M600 260 v-40" />'
                . '<path d="M592 276 l8 -16 l8 16" />'
                . '<text x="470" y="292">ALARM</text>'
                . '<path d="M600 200 v-40" />'
                . '<path d="M592 216 l8 -16 l8 16" />'
                . '<text x="470" y="150">LOG</text>'
                . '</g>'
                . '<g class="sch__dim">'
                . '<line x1="140" y1="410" x2="400" y2="410" />'
                . '<line x1="140" y1="402" x2="140" y2="418" />'
                . '<line x1="400" y1="402" x2="400" y2="418" />'
                . '<text x="180" y="404">CABINET</text>'
                . '</g>';
            $ref = 'RPP-MED-01';
            $title = 'Cold chain cabinet and monitoring';
            break;
    }

    return '<svg class="sch" viewBox="0 0 ' . $w . ' ' . $h . '" role="img" aria-hidden="true" focusable="false" preserveAspectRatio="xMidYMid meet">'
        . '<rect class="sch__bg" x="0" y="0" width="' . $w . '" height="' . $h . '" />'
        . schematic_grid($w, $h)
        . $body
        . schematic_title($ref, $title)
        . '</svg>';
}
