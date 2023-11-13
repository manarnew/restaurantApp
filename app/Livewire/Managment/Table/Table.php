<?php

namespace App\Livewire\Managment\Table;

use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    public $showCreateTable = false;
    public $showEditTable = false;
    public $id;
    public $tableEdit;
    public function render()
    {
        return view('livewire.managment.table.table', [
            'tables' => \App\Models\table::paginate(5)
        ]);
    }

    public function showCreateTableForm()
    {
        $this->showCreateTable = !$this->showCreateTable;
        $this->showEditTable = false;
    }

    public function showEditTableForm($id)
    {
        if ($this->showEditTable == true) {
            $this->showEditTable = !$this->showEditTable;
        } else {
            $table = \App\Models\table::whereId($id)->first();
            if ($table) {
                $this->tableEdit = $table;
                $this->dispatch('cat-show', $table);
                $this->showEditTable = !$this->showEditTable;
                $this->showCreateTable = false;
            }
        }
    }
    public function delete($id)
    {
        $category = \App\Models\table::destroy($id);
        if ($category) {
            session()->flash('success', 'Table successfully deleted.');
            return $this->redirect('/management/table', navigate: true);
        } else {
            session()->flash('failed', 'failed to deleted table.');
            return $this->redirect('/management/table', navigate: true);
        }
    }
}
