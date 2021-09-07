<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class OrderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OrderCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Order::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/order');
        CRUD::setEntityNameStrings('order', 'orders');
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

        CRUD::addColumn([
            'name' => 'phone',
            'label' => 'Phone',
            'type' => 'text', 
        ]);

        CRUD::addColumn([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'text', 
        ]);

        CRUD::addColumn([
            'name' => 'total',
            'label' => 'Total',
            'type' => 'text', 
        ]);

        CRUD::addColumn([
            'name'        => 'type',
            'label'       => "Payment type",
            'type'        => 'select_from_array',
            'options'     => ['monthly' => 'Monthly', 'yearly' => 'Yearly','trial'=>'Trial'],
            'allows_null' => false,
            'default'     => 'trial',
        ]);
        CRUD::addColumn([
            'name'        => 'status',
            'label'       => "Status",
            'type'        => 'select_from_array',
            'options'     => ['pending' => 'Pending', 'success' => 'Success','failed'=>'Failed','admin'=>'Added by admin'],
        ]);

        CRUD::addColumn([
            'name' => 'exp_date',
            'label' => 'Exp. Date',
            'type' => 'text', 
        ]);
        
    }
    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(OrderRequest::class);

        CRUD::addField([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text', 
        ]);

        CRUD::addField([
            'name' => 'phone',
            'label' => 'Phone',
            'type' => 'text', 
        ]);

        CRUD::addField([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'text', 
        ]);

        CRUD::addField([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'text', 
        ]);

        CRUD::addFIeld([   // Number
            'name' => 'total',
            'label' => 'Total-',
            'type' => 'number',
    
            // optionals
            'attributes' => ["step" => "any"], // allow decimals
            'prefix'     => "€",
            // 'suffix'     => ".00",
          ]);

          CRUD::addField([
            'name'      => 'package_id',
            'label'     => 'Package',
             'type'      => 'select2_from_array',
//             'entity'    => 'categories', 
//             'model'     => "App\Models\Category", 
//             'attribute' => 'name',
          'options'   => \App\Models\Rate::get()->pluck('name', 'id'),
            'allows_null'     => false,
            'allows_multiple' => false,
        ]);

          CRUD::addField([
            'name' => 'order_id',
            'label' => 'Order id',
            'type' => 'text', 
        ]);

        CRUD::addField([   // select_from_array
            'name'        => 'type',
            'label'       => "Payment type",
            'type'        => 'select_from_array',
            'options'     => ['monthly' => 'Monthly', 'yearly' => 'Yearly','trial'=>'Trial'],
            'allows_null' => false,
            'default'     => 'trial',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);

        CRUD::addField([   // select_from_array
            'name'        => 'status',
            'label'       => "Payment status",
            'type'        => 'select_from_array',
            'options'     => ['pending' => 'Pending', 'success' => 'Success','failed'=>'Failed','admin'=>'Added by admin'],
            'allows_null' => false,
            'default'     => 'pending',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);

        CRUD::addField([
            'name' => 'exp_date',
            'label' => 'Exp. Date',
            'type' => 'date', 
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
