<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RateInformationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class RateInformationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RateInformationCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\RateInformation::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/rate-information');
        CRUD::setEntityNameStrings('rate information', 'rate informations');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([
            'name' => 'description',
            'label' => 'Description',
            'type' => 'text', 
        ]); 

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(RateInformationRequest::class);

        CRUD::addField([
            'name' => 'description',
            'label' => 'Description',
            'type' => 'text', 
        ]); 
        CRUD::addField([
            'name' => 'field_1',
            'label' => 'Informations field 1',
            'type' => 'text', 
            'hint'=>'If you type yes it will show a checked image , if you type no it will show a x icon. If you type a text it will be shown',
        ]);
      CRUD::addField([
            'name' => 'field_2',
            'label' => 'Informations field 2',
            'type' => 'text', 
            'hint'=>'If you type yes it will show a checked image , if you type no it will show a x icon. If you type a text it will be shown',
        ]); 
      CRUD::addField([
            'name' => 'field_3',
            'label' => 'Informations field 3',
            'type' => 'text',
            'hint'=>'If you type yes it will show a checked image , if you type no it will show a x icon. If you type a text it will be shown',
        ]); 
      
       CRUD::addField([   // Checkbox
          'name'  => 'index_visible',
          'label' => 'Index visible?',
          'type'  => 'checkbox',
          'hint'=>'If is visible on the first page this information',
      ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
