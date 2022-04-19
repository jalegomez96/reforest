<?php

namespace Database\Seeders;

use App\Models\TreeSpecie;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TreeSpeciesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('tree_species')->delete();
        DB::table('stocks')->delete();

        $tree_species = array(
            0 =>
            array(
                'scientific_name' => 'Hieronyma macrocarpa',
                'common_name' => 'Motilón dulce',
                'family' => 'Phyllanthaceae',
                'description' => 'Crece principalmente en las zonas altas de los departamentos del Cauca y Nariño. Su fruto un sabor entre agridulce y dulce dependiendo de la variedad. Tiene alto contenido de sustancias antioxidantes. Se consume fresca, en jaleas y en fermentado (vino).',
                'price' => 20000,
                'image' => 'vNnxxwaOo0sRtLW8lua0XA6kLrUwG4yN7mjdTSKf.jpg',
            ),
            1 =>
            array(
                'scientific_name' => 'Vallea stipularis',
                'common_name' => 'Majua',
                'family' => 'Elaeocarpaceae',
                'description' => 'Es un árbol perenne, que alcanza hasta 15 m de altura. Raíces profundas. El tronco es torcido, muy ramificado. Las hojas, acorazonadas o en forma de pera, a veces lobuladas, de hasta 10 cm de largo, de color verde oscuro.',
                'price' => 25000,
                'image' => 'PlGKDZMt7XP0qQjNSNYcNWA8YzZV935A4uQtyMCO.jpg',
            ),
            2 =>
            array(
                'scientific_name' => 'Luma apiculata',
                'common_name' => 'Arrayán',
                'family' => 'Myrtaceae',
                'description' => 'Arrayán, árbol de la libertad. El arrayán es un árbol nativo que tiene la virtud de crecer en distintos lugares de la geografía colombiana. Sus hojas perennes lo hacen ver verde todo el año.',
                'price' => 30000,
                'image' => 'LhzwfSzvpHUUlhsxSlCR7wnmzFpcr3M9xRTAfmU0.jpg',
            ),
            3 =>
            array(
                'scientific_name' => 'Anthurium',
                'common_name' => 'Anturios',
                'family' => 'Araceae',
                'description' => 'Son plantas caducas, herbáceas o leñosas, erectas, rastreras o trepadoras, de hojas muy decorativas. Las hojas sonde consistencia y grosor notables, ovales, en forma de corazón o punta de flecha, bastante grande, a veces divididas en lóbulos o incluso en forma de mano.',
                'price' => 10000,
                'image' => 'mYJAHsOH4qFQj7m7NwAE0zoYteTfxcwck7nWfHci.jpg',
            ),
        );
        foreach ($tree_species as $tree_specie) {
            $tree_specie = TreeSpecie::create($tree_specie);
            $tree_specie->stock()->create(['quantity' => 0]);
        }
    }
}
