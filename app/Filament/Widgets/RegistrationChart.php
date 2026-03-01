<?php

namespace App\Filament\Widgets;

use App\Models\Registration;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class RegistrationChart extends ChartWidget
{
    protected ?string $heading = 'Statistik Pendaftar PMB';
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = [
        'md' => 1,
        'xl' => 1,
    ];

    protected function getData(): array
    {
        $data = [];
        $labels = [];

        // Get data for the last 6 months
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $labels[] = $month->translatedFormat('M Y');

            $count = Registration::whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();

            $data[] = $count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Pendaftar',
                    'data' => $data,
                    'fill' => 'start',
                    'backgroundColor' => 'rgba(123, 30, 48, 0.2)',
                    'borderColor' => '#7b1e30',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
