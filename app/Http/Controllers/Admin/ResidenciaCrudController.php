<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ResidenciaRequest as StoreRequest;
use App\Http\Requests\ResidenciaRequest as UpdateRequest;

class ResidenciaCrudController extends CrudController {

	public function setUp() {

    $this->crud->setModel("App\Models\Residencia");
    $this->crud->setRoute("admin/residencia");
    $this->crud->setEntityNameStrings('residencia', 'residencias');



    $this->crud->setFromDb();

    $this->crud->addField([
     'label' => "Ciudad Asociada",
     'type' => 'select2',
           'name' => 'ciudad_id', // the db column for the foreign key
           'entity' => 'ciudad', // the method that defines the relationship in your Model
           'attribute' => 'nombre', // foreign key attribute that is shown to user
           'model' => "App\Models\Ciudad" // foreign key model
           ], 'both');
    $this->crud->addField([
     'label' => "Barrio Asociado",
     'type' => 'select2',
           'name' => 'barrio_id', // the db column for the foreign key
           'entity' => 'barrio', // the method that defines the relationship in your Model
           'attribute' => 'nombre', // foreign key attribute that is shown to user
           'model' => "App\Models\Barrio" // foreign key model
           ], 'both');

    $this->crud->addField([
     'label' => "Tipo de Inmueble",
     'type' => 'select_from_array',
           'name' => 'tipo', // the db column for the foreign key
           'options' => 
           ['Casa'=>'Casa','Apartamento'=>'Apartamento','Oficina'=>'Oficina','Bodega'=>'Bodega','Local'=>"Local",'Lote'=>"Lote",'Finca'=>"Finca",'Edifico de oficina'=>"Edifico de oficina",'Edificio de Apartamento'=>"Edificio de Apartamento"],
           ], 'both');
    $this->crud->addField([
     'label' => "Tipo de Venta",
     'type' => 'select_from_array',
           'name' => 'tipo_venta', // the db column for the foreign key
           'options' => ['Venta' => 'Venta','Arriendo' => 'Arriendo'],
           ], 'both');
    $this->crud->addField([
     'label' => "Disponibilidad",
     'type' => 'select_from_array',
           'name' => 'disponibilidad', // the db column for the foreign key
           'options' => ["Disponible"=>"Disponible","Vendido"=>"Vendido","no Disponible"=>"no Disponible"],
           ], 'both');
    $this->crud->addField(['name' => 'precio', 'type' => 'number']);
    $this->crud->addField(['name' => 'metraje', 'type' => 'number']);
    $this->crud->addField(['name' => 'baños', 'type' => 'number']);
    $this->crud->addField(['name' => 'habitaciones', 'type' => 'number']);
    $this->crud->addField(['name' => 'garaje', 'type' => 'number']);

    $this->crud->addField(['name' => 'url_video', 'type' => 'video']);

    $this->crud->addField([ // Table
      'name' => 'otros',
      'label' => 'Otras Caracteristicas',
      'type' => 'table',
            'entity_singular' => 'caracteristica', // used on the "Add X" button
            'columns' => [
            'key' => 'Nombre',
            'value' => 'Valor',
            ],
            'max' => -1, // maximum rows allowed in the table
            'min' => -1// minimum rows allowed in the table
            ]);

    $this->crud->addField(['name' => 'slogan', 'type' => 'text']);
    $this->crud->addField(['name' => 'visible', 'type' => 'checkbox', 'default' => 'true']);
    $this->crud->addField(['name' => 'activo', 'type' => 'checkbox', 'default' => 'true']);
    $this->crud->addField(['name' => 'destacado', 'type' => 'checkbox', 'default' => 'true']);

    $this->crud->removeColumns(['ciudad_id','barrio_id' , 'fotos', 'otros','tipo','metraje','baños','garaje','habitaciones','latitud','longitud','direccion','url_video','visible','activo', 'default_photo']); // remove an array of columns from the stack
    $this->crud->addColumn([  // Select2
     'label' => "Ciudad Asociada",
     'type' => 'select',
           'name' => 'ciudad_id', // the db column for the foreign key
           'entity' => 'ciudad', // the method that defines the relationship in your Model
           'attribute' => 'nombre', // foreign key attribute that is shown to user
           'model' => "App\Models\Ciudad" // foreign key model
           ], 'both');
    $this->crud->addColumn([  // Select2
     'label' => "Barrio Asociado",
     'type' => 'select',
           'name' => 'barrio_id', // the db column for the foreign key
           'entity' => 'barrio', // the method that defines the relationship in your Model
           'attribute' => 'nombre', // foreign key attribute that is shown to user
           'model' => "App\Models\Barrio" // foreign key model
           ], 'both');

    $this->crud->addColumn([
       'name' => 'url_video', // The db column name
       'label' => "Video", // Table column heading
       'type' => 'video',
       ]);
    $this->crud->addColumn([
       'name' => 'visible', // The db column name
       'type' => 'check',
       ]);
    $this->crud->addColumn([
       'name' => 'activo', // The db column name
       'type' => 'check',
    ]);        // $this->crud->addFields($array_of_arrays, 'update/create/both');
    // $this->crud->removeField('name', 'update/create/both');
    // $this->crud->removeFields($array_of_names, 'update/create/both');

    // ------ CRUD COLUMNS
    // $this->crud->addColumn(); // add a single column, at the end of the stack
    // $this->crud->addColumns(); // add multiple columns, at the end of the stack
    // $this->crud->removeColumn('column_name'); // remove a column from the stack
    // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
    // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
    // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);
    
    // ------ CRUD BUTTONS
    // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
    $this->crud->addButtonFromModelFunction("line", "fotoButton", "fotoButton", "end"); // add a button whose HTML is returned by a method in the CRUD model
    // $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
    // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
    // $this->crud->removeButton($name);
    // $this->crud->removeButtonFromStack($name, $stack);

    // ------ CRUD ACCESS
    $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
    // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

    // ------ CRUD REORDER
    // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
    // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

    // ------ CRUD DETAILS ROW
    // $this->crud->enableDetailsRow();
    // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
    // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php

    // ------ REVISIONS
    // You also need to use \Venturecraft\Revisionable\RevisionableTrait;
    // Please check out: https://laravel-backpack.readme.io/docs/crud#revisions
    // $this->crud->allowAccess('revisions');

    // ------ AJAX TABLE VIEW
    // Please note the drawbacks of this though:
    // - 1-n and n-n columns are not searchable
    // - date and datetime columns won't be sortable anymore
    // $this->crud->enableAjaxTable();
    
    
    // ------ DATATABLE EXPORT BUTTONS
    // Show export to PDF, CSV, XLS and Print buttons on the table view.
    // Does not work well with AJAX datatables.
    $this->crud->enableExportButtons();

    // ------ ADVANCED QUERIES
    // $this->crud->addClause('active');
    // $this->crud->addClause('type', 'car');
    // $this->crud->addClause('where', 'name', '==', 'car');
    // $this->crud->addClause('whereName', 'car');
    // $this->crud->addClause('whereHas', 'posts', function($query) {
    //     $query->activePosts();
    // });
    // $this->crud->orderBy();
    // $this->crud->groupBy();
    // $this->crud->limit();
  }

  public function store(StoreRequest $request)
  {
    return parent::storeCrud();
  }

  public function update(UpdateRequest $request)
  {
    return parent::updateCrud();
  }
}
