<?php

return [
    'characters' => '23456789abcdefghjkmnpqrstuvwxyz',
    'default' => [
        'length' => 4,           // Number of characters
        'width' => 200,          // Larger width
        'height' => 80,          // Larger height
        'quality' => 100,        // Ensure high-quality rendering
        'bgImage' => false,      // No background image
        'bgColor' => '#ffffff',  // Plain white background
        'fontColors' => ['#000'], // Simple black text
        'lines' => 0,            // No lines
        'contrast' => 0,         // Simple contrast
        'angle' => 0,            // No rotation
        'sharpen' => 0,          // No sharpening
    ],
    'math' => [
        'length' => 9,
        'width' => 200,           // Larger width
        'height' => 80,           // Larger height
        'quality' => 90,
        'math' => true,
    ],
    'flat' => [
        'length' => 6,
        'width' => 200,           // Larger width
        'height' => 80,           // Larger height
        'quality' => 90,
        'lines' => 6,
        'bgImage' => false,
        'bgColor' => '#ecf2f4',
        'fontColors' => ['#2c3e50', '#c0392b', '#16a085', '#c0392b', '#8e44ad', '#303f9f', '#f57c00', '#795548'],
        'contrast' => -5,
    ],
    'mini' => [
        'length' => 3,
        'width' => 120,           // Slightly larger for "mini"
        'height' => 50,           // Slightly larger height for "mini"
    ],
    'inverse' => [
        'length' => 5,
        'width' => 180,           // Larger width for "inverse"
        'height' => 80,           // Larger height for "inverse"
        'quality' => 90,
        'sensitive' => true,
        'angle' => 12,
        'sharpen' => 10,
        'blur' => 2,
        'invert' => true,
        'contrast' => -5,
    ]
];