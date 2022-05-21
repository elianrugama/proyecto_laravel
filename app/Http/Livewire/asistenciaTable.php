<?php

namespace App\Http\Livewire;

use App\Models\Universidad;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class AsistenciaTable extends DataTableComponent
{
    protected $model =  Universidad::class;
    
    


    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setPerPageAccepted([5, 10, 15, 20, 25, 30, 50, 100, -1]);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre", "nombre")
                ->sortable()
                ->searchable(),
            Column::make("Carrera","carrera")
                ->sortable()
                ->searchable(),
            Column::make("Fecha", "fecha")
                ->sortable()
                ->searchable(),
            Column::make("Asistencia","asistencia")
                ->sortable()
                ->searchable(),
            
            
            
           

            Column::make("Editar", "id")
                ->view("tablas.botones.universidad.editar"),
        ];
    }

}
