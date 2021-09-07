<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class RateCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RateCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Rate::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/rate');
        CRUD::setEntityNameStrings('rate', 'rates');
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
            'name' => 'name',
            'label' => 'Name',
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
        CRUD::setValidation(RateRequest::class);

        CRUD::addField([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text', 
        ]);
        CRUD::addField([
            'name' => 'discount',
            'label' => 'Discount text',
            'type' => 'text', 
        ]);
      
        CRUD::addField([
            'name' => 'discount',
            'label' => 'Discount text',
            'type' => 'text', 
        ]);
      
      CRUD::addFIeld([   // Number
        'name' => 'month',
        'label' => 'Monthly rate',
        'type' => 'number',

        // optionals
        'attributes' => ["step" => "any"], // allow decimals
        'prefix'     => "€",
        // 'suffix'     => ".00",
      ]);
        
      CRUD::addFIeld([   // Number
        'name' => 'year',
        'label' => 'Yearly rate',
        'type' => 'number',

        // optionals
        'attributes' => ["step" => "any"], // allow decimals
        'prefix'     => "€",
        // 'suffix'     => ".00",
      ]);
        
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
