<?php
declare(strict_types=1);

/**
 * ICON LIBRARY

 * One consistent set: 24x24 grid, 1.6 stroke, round caps, currentColor.
 * Icons are inline so they cost no request and inherit the colour of
 * whatever they sit in.
 */

function icon(string $name, string $class = ''): string
{
    $paths = [
        /* Disciplines */
        'snowflake' => '<path d="M12 3v18M4.5 7.5l15 9M19.5 7.5l-15 9"/><path d="M9.5 5.5 12 3l2.5 2.5M9.5 18.5 12 21l2.5-2.5M5.5 10 3 12l2.5 2M18.5 10 21 12l-2.5 2"/>',
        'fan'       => '<circle cx="12" cy="12" r="2"/><path d="M12 10c0-4 1.4-6.5 3.6-6.5 1.7 0 3 1.4 3 3.2 0 2.7-2.8 4.4-6.6 4.4Z"/><path d="M14 12c4 0 6.5 1.4 6.5 3.6 0 1.7-1.4 3-3.2 3C14.6 18.6 13 15.8 14 12Z"/><path d="M10 12c0 4-1.4 6.5-3.6 6.5-1.7 0-3-1.4-3-3.2 0-2.7 2.8-4.4 6.6-4.4Z"/>',
        'cross'     => '<rect x="3.5" y="3.5" width="17" height="17" rx="4.5"/><path d="M12 8v8M8 12h8"/>',

        /* Sectors */
        'cart'      => '<path d="M2.5 4h2.3l2.4 10.5h9.4L19.3 7H6.3"/><circle cx="9.5" cy="19" r="1.4"/><circle cx="16.5" cy="19" r="1.4"/>',
        'pulse'     => '<path d="M2.5 12.5h4l2-5 3 10 2.5-6 1.5 3h4"/>',
        'bed'       => '<path d="M3 19v-7.5a1.5 1.5 0 0 1 1.5-1.5H16a4 4 0 0 1 4 4V19M3 16h17"/><circle cx="7.5" cy="10.5" r="1.9"/>',
        'boxes'     => '<path d="M3 8.5 12 4l9 4.5v7L12 20l-9-4.5z"/><path d="M3 8.5 12 13l9-4.5M12 13v7"/>',
        'building'  => '<path d="M4 21V5.5A1.5 1.5 0 0 1 5.5 4h8A1.5 1.5 0 0 1 15 5.5V21"/><path d="M15 10h3.5A1.5 1.5 0 0 1 20 11.5V21M2.5 21h19"/><path d="M7.5 8h1M11 8h1M7.5 12h1M11 12h1M7.5 16h1M11 16h1"/>',
        'cap'       => '<path d="M12 4 2.5 9 12 14l9.5-5z"/><path d="M6 11.2V16c0 1.7 2.7 3 6 3s6-1.3 6-3v-4.8M20.5 9.5V15"/>',

        /* Method */
        'clipboard' => '<path d="M9 4.5H7a2 2 0 0 0-2 2V19.5a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6.5a2 2 0 0 0-2-2h-2"/><rect x="9" y="2.5" width="6" height="4" rx="1.2"/><path d="M8.5 11.5h7M8.5 15.5h4.5"/>',
        'design'    => '<path d="M4 4h6v6H4zM14 14h6v6h-6z"/><circle cx="12" cy="12" r="3.2"/>',
        'wrench'    => '<path d="M14.6 3.4a5.6 5.6 0 0 0-5.1 7.8L3.8 16.9a2 2 0 1 0 2.8 2.8l5.7-5.7a5.6 5.6 0 0 0 7.1-6.8l-2.9 2.9-2.6-.7-.7-2.6z"/>',
        'refresh'   => '<path d="M20 12a8 8 0 1 1-2.6-5.9"/><path d="M20 3.5V9h-5.5"/>',

        /* Engagement */
        'users'     => '<circle cx="9" cy="8" r="3.2"/><path d="M3 19c0-3.3 2.7-5.5 6-5.5s6 2.2 6 5.5"/><path d="M16 5.2a3.2 3.2 0 0 1 0 5.9M17.6 13.8c2 .9 3.4 2.8 3.4 5.2"/>',
        'helmet'    => '<path d="M3.5 17h17M5.5 17a6.5 6.5 0 0 1 13 0"/><path d="M12 10.5V6.2M9 6.2h6"/>',
        'calendar'  => '<rect x="3.5" y="5" width="17" height="15" rx="2.5"/><path d="M3.5 9.5h17M8 3v4M16 3v4M9 14.5l2 2 4-4"/>',
        'document'  => '<path d="M14 3.5H7a2 2 0 0 0-2 2V19a2 2 0 0 0 2 2h5"/><path d="M14 3.5 19 8.5V11"/><circle cx="16.6" cy="16.4" r="3.2"/><path d="M19 18.8l2 2"/>',

        /* Contact and interface */
        'phone'     => '<path d="M6.4 3.5h3.1l1.5 4-2 1.5a12.4 12.4 0 0 0 6 6l1.5-2 4 1.5v3.1a2 2 0 0 1-2.2 2A16.6 16.6 0 0 1 4.4 5.7a2 2 0 0 1 2-2.2z"/>',
        'mail'      => '<rect x="2.5" y="5" width="19" height="14" rx="2.5"/><path d="M3 6.8l9 6 9-6"/>',
        'pin'       => '<path d="M12 21.5s7-6.3 7-11.2a7 7 0 1 0-14 0c0 4.9 7 11.2 7 11.2z"/><circle cx="12" cy="10" r="2.6"/>',
        'clock'     => '<circle cx="12" cy="12" r="8.5"/><path d="M12 7v5.3l3.4 2"/>',
        'chat'      => '<path d="M20.5 12c0 4.4-3.8 8-8.5 8-1.2 0-2.4-.2-3.4-.6L4 20.5l1.2-3.9A8 8 0 0 1 3.5 12C3.5 7.6 7.3 4 12 4s8.5 3.6 8.5 8z"/>',
        'globe'     => '<circle cx="12" cy="12" r="8.5"/><path d="M3.5 12h17M12 3.5c2.2 2.4 3.4 5.4 3.4 8.5s-1.2 6.1-3.4 8.5c-2.2-2.4-3.4-5.4-3.4-8.5S9.8 5.9 12 3.5z"/>',
        'arrow'     => '<path d="M4 12h15M13 6l6 6-6 6"/>',
        'check'     => '<path d="M4.5 12.5 9.5 17.5 19.5 7"/>',
        'ruler'     => '<path d="M3.5 15.5 15.5 3.5l5 5-12 12z"/><path d="M7 12l2 2M10 9l2 2M13 6l2 2"/>',
    ];

    if (!isset($paths[$name])) {
        return '';
    }

    $cls = $class !== '' ? ' class="' . e($class) . '"' : '';
    return '<svg' . $cls . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" '
        . 'stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" '
        . 'aria-hidden="true" focusable="false">' . $paths[$name] . '</svg>';
}
