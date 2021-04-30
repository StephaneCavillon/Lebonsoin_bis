<div class="container main opacity mt-5 mb-5 p-2 p-md-5">

    <h1 class="text-center" id="titleSection">Déposer une annonce</h1>
    <div class="row">
        <?php
        echo form_open_multipart('Article_controller/add_article', array('class' => 'col-8 offset-2'));
        ?>
            <div class="row">
                <div class="col-12 col-md-6">
            
                    <?php
                    // Select category  
                    foreach($categorys as $category) {

                        $optionsMark[$category['id']] = $category['name_cat'];
                    }
                    echo form_label('Category'); 
                    echo form_dropdown('id_category', $optionsMark, '' ,array(
                        'class'       => 'form-control',
                    ));
                    echo form_error ( 'id_Category' ,  '<div class = "text-danger">' ,  '</div>' );

                    echo form_label('Titre'); 
                    echo form_input(array('id'=>'title','class'=>'form-control','name'=>'title' , 'value' => set_value( 'title' ))); 
                    echo form_error ( 'title' ,  '<div class = "text-danger">' ,  '</div>' );

                    echo form_label('Description'); 
                    echo form_textarea(array('id'=>'description_cat','class'=>'form-control','name'=>'description_cat' , 'value' => set_value( 'description_cat' )));
                    echo form_error ( 'description_cat' ,  '<div class = "text-danger">' ,  '</div>' );

                    echo form_label('Prix'); 
                    echo form_input(array('id'=>'price','class'=>'form-control','name'=>'price', 'value' => set_value( 'price'))); 
                    echo form_error ( 'price' ,  '<div class = "text-danger">' ,  '</div>' );

                    echo form_label('Ville'); 
                    echo form_input(array('id'=>'city','class'=>'form-control','name'=>'city' , 'value' => set_value( 'city' ))); 
                    echo form_error ( 'city' ,  '<div class = "text-danger">' ,  '</div>' );

                    echo form_label('Code Postal'); 
                    echo form_input(array('id'=>'zipcode','class'=>'form-control','name'=>'zipcode', 'value' => set_value( 'zipcode'))); 
                    echo form_error ( 'zipcode' ,  '<div class = "text-danger">' ,  '</div>' );

                    echo form_label('Téléphone'); 
                    echo form_input(array('id'=>'phone','class'=>'form-control','name'=>'phone', 'value' => set_value( 'phone'))); 
                    echo form_error ( 'phone' ,  '<div class = "text-danger">' ,  '</div>' );


                    ?>

                </div>
                <div class="col-12 col-md-6 d-flex flex-column">
                <?php


                    // Image 
                    echo form_label('Photo'); 
                    ?>
                    <input type="file" name="url_image" />
                    <?php
                    echo $erreur ?? '';

                    echo form_submit(array('id'=>'submit','value'=>'Ajouter','class'=>'btn btn-success mt-5')); 
                    ?>
                </div>
            </div>
            <?php
        echo form_close(); 

        ?>
    </div>

</div>