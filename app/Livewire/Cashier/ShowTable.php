<?php

namespace App\Livewire\Cashier;

use Livewire\Component;
use App\Models\table;

class ShowTable extends Component
{
    public function render()
    {
        return view('livewire.cashier.show-table', [
            'tables' => table::all()
        ]);
    }
    public function selectedTable( $selectedTable)
    {
        $this->dispatch('table-Selected', Selected: $selectedTable);
    }
}
