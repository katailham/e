<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Support\Facades\Auth;
class AppServiceProvider extends ServiceProvider
{

 public function register()
 {
 //
 }
 public function boot(Dispatcher $events)
 {
    $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
    $roles_id = Auth::user()->roles->name;
    $event->menu->add(' Hak Akses : '.strtoupper($roles_id));
    $event->menu->add('MENU');
    if ($roles_id=='Admin') {
        $event->menu->add(
            [
                'text' => 'User',
                'url' => 'user',
                'icon' => 'fas fa-fw fa-user-tie'
            ],
            [
                'text' => 'Pengelolaan Barang',
                'url' => 'product',
                'icon' => 'fas fa-fw fa-users'
            ],
            [
                'text' => 'Kategori Barang',
                'url' => 'categorie',
                'icon' => 'fas fa-fw fa-building'
            ],
            [
                'text' => 'Merek Barang',
                'url' => 'brand',
                'icon' => 'fas fa-fw fa-money-bill-alt'
            ],
            
            [
                'text'    => 'Laporan',
                'icon'    => 'fas fa-fw fa-archive',
                'submenu' => [
                    [
                        'text' => 'Laporan Barang Masuk',
                        'url'  => 'laporanmasuk',
                    ],
                    [
                        'text'    => 'Laporan Barang Keluar',
                        'url'     => '#',
                    ],
                ],
            ],
        );
    }
    else if ($roles_id=='User') {
        $event->menu->add(
            [
                'text' => 'Pembayaran',
                'url' => 'pembayaran',
                'icon' => 'fas fa-fw fa-cash-register'
            ],
            [
                'text' => 'History Pembayaran',
                'url' => 'history',
                'icon' => 'fas fa-fw fa-history'
            ]
        );
    }
    else {
        $event->menu->add(
            [
                'text' => 'History Pembayaran',
                'url' => 'history',
                'icon' => 'fas fa-fw fa-history'
            ]
        );
    }
});
}
} 