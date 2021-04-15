<?php

namespace App\Exports;

use App\Models\Movimentacoes;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class MovimentacoesExport implements FromQuery
{

    public function __construct($id) 
    {
        $this->id = $id;
    }

    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        Return Movimentacoes::query()->where('user_id', $this->id);
        // return Movimentacoes::all();
    }
}
