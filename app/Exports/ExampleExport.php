<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Model\user_data_entry;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;

class ExampleExport implements FromView,ShouldAutoSize,WithEvents
{
    use Exportable;

  public function __construct(int $customer_id)
    {
        $this->customer_id = $customer_id;
    }

  public function view(): View
    {
      if(isset($this->customer_id))
      {
        $id = $this->customer_id;
        $fields = DB::table('form_fields')->join('form_fields_logs', 'form_fields.id', 'form_fields_logs.field_id')->select('form_fields_logs.id','form_fields_logs.field_id','form_fields.name','form_fields.type')->where('form_fields_logs.customer_id', $id)->get();

          return view('admin.exports.example', [
            'fields'=>$fields
          ]);
      }else{
        return back();

      }
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:N1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            },
        ];
    }
}
