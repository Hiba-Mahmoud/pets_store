<?php

namespace App\DataTables;

use App\Models\Brand;
use App\Models\BrandTranslation;
use Collective\Html\HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class BrandsDataTable extends DataTable
{
    protected $model = Brand::class;

    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'brands.action')
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Brand $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    // :QueryBuilder
    public function query(Brand $model)
    {
        return $model->newQuery()->join('brand_translations','brands.id','=','brand_translations.brand_id');
        // return $model->newQuery();
        // ->where('brand_translations.locale','=',app()->getLocale());
        // return Brand::with('BrandTranslation');
        // return $model->whereHas('brand_translations', function($query){
            // $query->where('locale',app()->getLocale());
        // });
        // return Brand::join('brand_translations',function($join){
        //     $join->on('brands.id','=','brand_translations.brand_id')
        //     ->where('brand_translations.locale','=',app()->getLocale());
        // });
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    // : HtmlBuilder
    public function html()
    {
        return $this->builder()
                    ->setTableId('brands-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Blfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel',),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        // ['extend'=>'print','className'=>'btn btn-info','text'=>'print'],
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [

            Column::make('id'),
            Column::make('name'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            // ->width()
            ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Brands_' . date('YmdHis');
    }
}
