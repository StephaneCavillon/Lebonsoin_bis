<?php
$config = array ( 

    'Article_controller/add_article'  =>  array ( 

        array ( 
            'field'  =>  'title' , 
            'label'  =>  'titre' , 
            'rules'  =>  array(
                'required',
                'max_length[30]'
            ),
            'errors' => array(
                'required' => 'Le titre de l\'annonce est obligatoire',
            ),
        ),
        array ( 
            'field'  =>  'description_art' , 
            'label'  =>  'description' , 
            'rules'  =>  array(
                'required',
                'max_length[300]',
            ),
        ),
        array ( 
            'field'  =>  'price', 
            'label'  =>  'prix',
            'rules'  =>  array(
                'required',
                'numeric'
            ), 
        ), 
        array ( 
            'field'  =>  'zipcode' , 
            'label' =>  'code postal' , 
            'rules' =>  array(
                'required' ,
                'max_length[8]',
                'numeric'
            ),
        ),
        array ( 
            'field'  =>  'city' , 
            'label'  =>  'ville' , 
            'rules'  =>  array(
                'required',
                'max_length[50]',
                'alpha_dash'
            ),
        ),
        array ( 

            'field'  =>  'phone' , 
            'label'  =>  'numero de téléphone' , 
            'rules'  =>  array(
                'required',
                'max_length[12]',
            ),
        ),
        array ( 

            'field'  =>  'category' , 
            'label'  =>  'categorie' , 
            'rules'  =>  array(
                'required',
            ),
        ),
        
    ),

);