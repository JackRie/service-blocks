<?php
/**
 * Plugin Name:       Service Express Blocks
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       serv-blocks
 *
 * @package           create-block
 */
if( ! defined('ABSPATH') ) exit; //Exit if accessed directly

define('SERV_BLOCKS_PATH', plugin_dir_path(__FILE__) );
define('SERV_BLOCKS_URL', plugins_url('/', __FILE__) );

require SERV_BLOCKS_PATH . 'admin/greenhouse-prospect-settings.php';
require SERV_BLOCKS_PATH . 'includes/functions.php';

class ServBlocks {
    function __construct() {
        add_action( 'init', array($this, 'create_service_blocks_init') );
    }

    function create_service_blocks_init() {

        $blocks = array(
            'greenhouse-prospect',
            'marketo-form-button'
        );
    
        foreach( $blocks as $block ) {
            $block_json = SERV_BLOCKS_PATH . 'build/' . $block;
            $block_args = require SERV_BLOCKS_PATH . 'src/' . $block . '/' . $block . '.php';

           register_block_type( $block_json, $block_args );
        }
    }
    
}

$servBlocks = new ServBlocks();