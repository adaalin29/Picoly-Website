<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MessageAffiliateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class MessageAffiliateCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MessageAffiliateCrudController extends CrudController
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
        CRUD::setModel(\App\Models\MessageAffiliate::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/message-affiliate');
        CRUD::setEntityNameStrings('message affiliate', 'message affiliates');
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
            'name' => 'email',
            'label' => 'Email',
            'type' => 'text', 
        ]);

        CRUD::addColumn([
            'name' => 'phone',
            'label' => 'Phone',
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
        CRUD::setValidation(MessageAffiliateRequest::class);

        CRUD::addField([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text', 
        ]);
        
        CRUD::addField([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'text', 
        ]);

        CRUD::addField([
            'name' => 'phone',
            'label' => 'Phone',
            'type' => 'text', 
        ]);
        CRUD::addField([
            'name' => 'field',
            'label' => 'Field',
            'type' => 'text', 
        ]);

        CRUD::addField([
            'name' => 'promote',
            'label' => 'Where to promote',
            'type' => 'textarea', 
        ]);

        CRUD::addField([
            'name' => 'observation',
            'label' => 'Observations',
            'type' => 'textarea', 
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
