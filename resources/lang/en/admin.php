<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'area' => [
        'title' => 'Areas',

        'actions' => [
            'index' => 'Areas',
            'create' => 'New Area',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name_area' => 'Name area',
            'manager' => 'Manager',
            
        ],
    ],

    'career' => [
        'title' => 'Careers',

        'actions' => [
            'index' => 'Careers',
            'create' => 'New Career',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name_career' => 'Name career',
            
        ],
    ],

    'gender' => [
        'title' => 'Genders',

        'actions' => [
            'index' => 'Genders',
            'create' => 'New Gender',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name_gender' => 'Name gender',
            
        ],
    ],

    'institution' => [
        'title' => 'Institution',

        'actions' => [
            'index' => 'Institution',
            'create' => 'New Institution',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'institution' => [
        'title' => 'Institutions',

        'actions' => [
            'index' => 'Institutions',
            'create' => 'New Institution',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name_institution' => 'Name institution',
            'address_institution' => 'Address institution',
            'phone_institution' => 'Phone institution',
            
        ],
    ],

    'typeinstitution' => [
        'title' => 'Typeinstitutions',

        'actions' => [
            'index' => 'Typeinstitutions',
            'create' => 'New Typeinstitution',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'typeinstitution' => 'Typeinstitution',
            
        ],
    ],

    'modality' => [
        'title' => 'Modalities',

        'actions' => [
            'index' => 'Modalities',
            'create' => 'New Modality',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name_modality' => 'Name modality',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];