<?php

/**
 * Ensures that the module init file can't be accessed directly, only within the application.
 */
defined('BASEPATH') or exit('No direct script access allowed');
/*
Module Name: Support Ticket
Description: Validate Purchase Code
Author: Douglas Okolaa
Author URI: https://www.boxvibe.com
Version: 1.0
Requires at least: 2.7.0
*/

// runs when module is been activated
register_activation_hook('services', function () {
});

hooks()->add_action('admin_area_before_single_ticket_name_render', 'view_envato_item_data');

function view_envato_item_data($ticketid)
{
    $CI = &get_instance();
    $CI->load->library('support/envato');
    $data = [];
    $purchaseCode = get_custom_field_value($ticketid, 'tickets_purchase_code', 'tickets');
    $pCodeData = $CI->envato->validate_purchase($purchaseCode);

    if ($pCodeData['successful']) {
        $data['item'] = $pCodeData['data'];
        echo $CI->load->view('support/item', $data);
    } else {
        echo '<div class="alert alert-danger">' . $pCodeData['message'] . '</div><hr>';
    }
}

// hooks()->add_action('app_admin_footer', function() {
//     $CI =& get_instance();
//     $ticketid =  $CI->uri->segment(4);

//     echo "
//     <script>
//     alert('".  $ticketid ."'); 
//         $(function () {
//             $('#custom_wrapper').load(admin_url + 'support/index/". $ticketid ."',() =>{
//                 alert('".  $ticketid ."');
//             });
//         });

//         console.log(" . $ticketid . ");
//     </script>
//     ";
// });
