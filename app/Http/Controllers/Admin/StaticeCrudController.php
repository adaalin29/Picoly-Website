<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StaticeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class StaticeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class StaticeCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Statice::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/statice');
        CRUD::setEntityNameStrings('Text administrabil', 'Texte administrabile');
     
     
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
      
//       $this->crud->removeButton('create');
    }

  
    protected function setupCreateOperation()
    {
        CRUD::setValidation(StaticeRequest::class);
        CRUD::addField([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text', 
       ]);
//       CRUD::addField([
//             'name' => 'key',
//             'label' => 'Key',
//             'type' => 'text', 
//        ]);
      
      CRUD::addField([
            'name' => 'description',
            'label' => 'Description',
            'type' => 'wysiwyg', 
       ]); 
      
        CRUD::addField([
            'name'      => 'image',
            'label'     => 'Image',
            'type'      => 'upload',
            'upload'    => true,
            'disk'      => 'public', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
       ]);
      
      CRUD::addfield([   // repeatable
          'name'  => 'custom_field',
          'label' => 'Custom field',
          'type'  => 'repeatable',
          'fields' => [
              [
                  'name'    => 'bullet',
                  'type'    => 'text',
                  'label'   => 'Bullet',
              ],
          ],

          // optional
          'new_item_label'  => 'Add row', // customize the text of the button
          'init_rows' => 1, // number of empty rows to be initialized, by default 1
          'min_rows' => 1, // minimum rows allowed, when reached the "delete" buttons will be hidden
          'max_rows' => 20, // maximum rows allowed, when reached the "new item" button will be hidden

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
