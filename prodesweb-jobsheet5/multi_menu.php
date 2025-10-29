<?php
$menu = [
    [
        "nama" => "Beranda"
    ],
    [
        "nama" => "Berita",
        "subMenu" => [
            [
                "nama" => "Wisata",
                "subMenu" => [
                    [
                        "nama" => "Pantai"
                    ],
                    [
                        "nama" => "Gunung"
                    ]
                ]
            ]
        ]
    ],
    [
        "nama" => "Kuliner"
    ],
    [
        "nama" => "Hiburan"
    ],
    [
        "nama" => "Tentang"
    ],
    [
        "nama" => "Kontak"
    ],
];

function tampilkanMenubertingkat(array $menu){
    echo "<ul>";
    foreach ($menu as $item){
        echo "<li>{$item['nama']}";
        
        if (isset($item['subMenu']) && is_array($item['subMenu'])) {
            tampilkanMenubertingkat($item['subMenu']);
        }

        echo "</li>";
    }
    echo "</ul>";
}
tampilkanMenubertingkat($menu);
?>
