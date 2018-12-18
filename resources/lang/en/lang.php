<?php

return [
    'foodink' => 'Foodink',
    'admin' => 'Admin',
    'signin' => 'Sign In',
    'email' => 'Email',
    'password' => 'Password',
    'remember_me' => 'Remember me',

    'store' => [
        'status' => [
            'pending' => 'Request',
            'accepted' => 'Active',
            'block' => 'Block',
        ],
    ],

    'shipper' => [
        'status' => [
            'online' => 'Online',
            'offline' => 'Offline',
            'block' => 'Block',
        ],
    ],

    'block_all' => 'Block All',
    'active_all' => 'Active All',
    'no' => 'No.',
    'store_name' => 'Store name',
    'owner' => 'Owner',
    'address' => 'Address',
    'status' => 'Status',
    'search' => 'Search',
    'shipper_name' => 'Shipper name',
    'phone' => 'Phone',
    'add' => 'Add',
    'create_shipper' => 'Register shipper',
    'name' => 'Name',
    'identity_number' => 'Identity Number',
    'register' => 'Register',
    'reset' => 'Reset',
    'update' => 'Update',
    'active' => 'Active',
    'block' => 'Block',
    'update_shipper' => 'Update Shipper',
    'store_infor' => 'Store Information',
    'open_at' => 'Open At',
    'close_at' => 'Close At',

    'manager_store' => 'Manager Store',
    'manager_shipper' => 'Manager Shipper',
    'manager_user' => 'Manager User',
    'left_bar' => [
        'user_list' => 'User List',
        'store_list' => 'Store List',
        'shipper_list' => 'Shipper List',
        'register_shipper' => 'Register Shipper',
    ],

    'message' => [
        'no_select' => 'You don\'t choose any record!',
        'confirm_block_many_store' => 'Are you sure want to block this stores?',
        'block_all_store_success' => 'Block store success',
        'block_all_store_failed' => 'Block store failed! Try again!',
        'confirm_active_many_store' => 'Are you sure want to active this stores?',
        'active_all_store_success' => 'Active store success',
        'active_all_store_failed' => 'Active store failed! Try again!',

        'confirm_block_many_shipper' => 'Are you sure want to block this shippers?',
        'block_all_shipper_success' => 'Block shipper success',
        'block_all_shipper_failed' => 'Block shipper failed! Try again!',
        'confirm_active_many_shipper' => 'Are you sure want to active this shippers?',
        'active_all_shipper_success' => 'Active shipper success',
        'active_all_shipper_failed' => 'Active shipper failed! Try again!',

        'confirm_register_shipper' => 'Are you sure want to register this shipper account?',
        'register_shipper_success' => 'Register shipper success! Please check email!',
        'register_shipper_error' => 'Register shipper error! Try again!',
        'confirm_update_shipper' => 'Are you sure want to update this shipper account?',
        'update_shipper_success' => 'Update shipper success! Please check email!',
        'update_shipper_error' => 'Update shipper error! Try again!',

        'confirm_block_shipper' => 'Are you sure want to block this shipper?',
        'confirm_active_shipper' => 'Are you sure want to active this shipper?',
        'confirm_block_store' => 'Are you sure want to block this store?',
        'confirm_active_store' => 'Are you sure want to active this store?',
    ],

    'register_shipper_mail' => [
        'title' => 'REGISTER SHIPPER ACCOUNT SUCCESS',
        'content' => '
                Your shipper account has been created success: <br/>
                <ul>
                    <li>Email: <strong>:email</strong></li>
                    <li>Password: <strong>:password</strong></li>
                </ul>
            ',
        'active_your_account' => 'ACTIVE YOUR SHIPPER ACCOUNT',
        'note_message' => 'You need active before use this shipper account',
    ]
];
