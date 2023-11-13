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

class S_LotExport implements FromView,ShouldAutoSize,WithEvents
{
  use Exportable;
  public function __construct($selection)
    {
        $this->selection = $selection;
    }

  public function view(): View
    {
      if(session('agent_id')&&session('customer_id'))
      {
        $customer_id = session('customer_id');
        $request = $this->selection;
        $fields = DB::table('form_fields')->join('form_fields_logs', 'form_fields.id', 'form_fields_logs.field_id')->select('form_fields_logs.id','form_fields_logs.field_id','form_fields.name','form_fields.type')->where('form_fields_logs.customer_id', $customer_id)->get();
        $data = user_data_entry::where('status', 'Verified')->where('lot_submit', '1')->where('customer_id', $customer_id)->whereIn('id', $request)->get();
          return view('admin.super_admin.exports.lots', [
            'datas'=>$data,
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
