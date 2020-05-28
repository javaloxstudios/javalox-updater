<?php
/*
 * The remote host file to process update requests
 */

if ( !isset( $_POST['action'] ) ) {
    echo '0';
    exit;
}

// Properties for requests
$obj = new stdClass();
$obj->slug = 'plugin.php';  
$obj->name = 'Plugin Name';
$obj->plugin_name = 'plugin.php';
$obj->new_version = '1.1';
// URL for the plugin homepage
$obj->url = 'https://javalox.com/plugins/plugin-name';
// Download location for the plugin zip file
$obj->package = 'https://javalox.com/plugins/plugin-name/plugin.zip';

switch ( $_POST['action'] ) {
    case 'version':  
        echo json_encode( $obj );
        break;  
    case 'info':   
        $obj->requires = '5.2';  
        $obj->tested = '5.2';  
        $obj->downloaded = 14670;  
        $obj->last_updated = '2020-01-17';  
        $obj->sections = array(  
            'description' => 'Description for new version of the plugin',  
            'changelog' => 'Description of new features'  
        );
        $obj->download_link = $obj->package;  
        echo json_encode( $obj );
    case 'license':  
        echo json_encode( $obj );
        break;  
}  

?>
