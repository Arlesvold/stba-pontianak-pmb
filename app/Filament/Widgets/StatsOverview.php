<?php

namespace App\Filament\Widgets;

use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Event;
use App\Models\Registration;
use App\Models\Staf;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        // Generate dummy chart data for visual appeal
        $generateChartData = function ($baseValue) {
            return collect(range(1, 7))->map(fn() => rand($baseValue - 2, $baseValue + 5))->toArray();
        };

        return [
            Stat::make('Total Pendaftar PMB', Registration::count())
                ->description('Calon mahasiswa baru')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success')
                ->chart($generateChartData(10)),

            Stat::make('Total Berita', Berita::count())
                ->description('Artikel & pengumuman')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('info')
                ->chart($generateChartData(5)),

            Stat::make('Total Agenda', Agenda::count())
                ->description('Jadwal kegiatan kampus')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('warning')
                ->chart($generateChartData(3)),

            Stat::make('Total Event', Event::count())
                ->description('Acara & seminar')
                ->descriptionIcon('heroicon-m-ticket')
                ->color('danger')
                ->chart($generateChartData(4)),

            Stat::make('Total Staf & Dosen', Staf::count())
                ->description('Tenaga pendidik & kependidikan')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary')
                ->chart([10, 10, 10, 10, 10, 10, 10]),
        ];
    }
}
