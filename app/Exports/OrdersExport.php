<?php

namespace App\Exports;

use App\Models\Order;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class OrdersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping, WithStyles
{
    protected $year;

    public function __construct($year)
    {
        $this->year = $year;
    }

    public function collection()
    {
        return Order::with('user', 'orderItems')
                    ->where('order_year', $this->year)
                    ->orderBy('order_number', 'asc')
                    ->get();
    }

    public function headings(): array
    {
        return [
            'Broj narudžbe',
            'Datum', 
            'Naručitelj', 
            'Prodavač', 
            'Cijena'
        ];
    }

    public function map($order): array
    {
        $totalPrice = $order->orderItems->sum('total_price_no_vat');
        $totalPrice = floatval($totalPrice);

        return [
            $order->order_number . '/' . $order->order_year,
            Carbon::parse($order->order_date)->format('d/m/Y'),
            $order->user->name,
            $order->seller_name . ', ' . $order->seller_address,
            $totalPrice
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Set row heights for all rows except total
        foreach (range(1, $sheet->getHighestRow()) as $row) {
            $sheet->getRowDimension($row)->setRowHeight(20);
        }
    
        // Style header row
        $sheet->getStyle('A1:E1')->applyFromArray([
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => 'left'],
        ]);
    
        // Get the total number of rows
        $lastRow = $sheet->getHighestRow();
        $totalRow = $lastRow + 1;
    
        // Merge cells A to D in the total row
        $sheet->mergeCells("A{$totalRow}:D{$totalRow}");
        
        // Set "UKUPAN TROŠAK" text in the merged cell
        $sheet->setCellValue("A{$totalRow}", "UKUPAN TROŠAK:");
        
        // Calculate sum of Cijena column (column E) and format it
        $sheet->setCellValue("E{$totalRow}", "=SUM(E2:E{$lastRow})");
        
        // Set a larger row height for the total row (increased from 20 to 30)
        $sheet->getRowDimension($totalRow)->setRowHeight(30);
    
        // Apply styles to the total row with vertical centering, larger font, and light gray background
        $sheet->getStyle("A{$totalRow}:E{$totalRow}")->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 14, 
            ],
            'alignment' => [
                'horizontal' => 'right',
                'vertical' => 'center'
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FFD3D3D3'],
            ],
        ]);
    
        // Ensure the Cijena column (E) is formatted as numbers
        $sheet->getStyle("E2:E{$lastRow}")->getNumberFormat()
            ->setFormatCode('#,##0.00');

        // Ensure the total cell is formatted as a number
        $sheet->getStyle("E{$totalRow}")->getNumberFormat()
            ->setFormatCode('#,##0.00');
    
        return [];
    }
}