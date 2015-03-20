<?php
/*
Plugin Name: Groupie: WordPress Membership Tools
Plugin URI: http://www.contextureintl.com/
Author: Veraxus, Contexture
Author URI: http://contextureintl.com
Description: User groups, memberships, and private content for WordPress
Version: 0.0.1
License: GPL2 or later

------------------------------------------------------------------------
Copyright 2014 Contexture International

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

$GROUPIE = new Groupie();

/**
 * Class Groupie
 */
class Groupie
{

	/**
	 * @var string File path to plugin directory
	 */
	public $path = null;

	/**
	 * @var object Shortcut paths to file system
	 */
	public $paths = null;

	/**
	 * @var string URI to plugin directory
	 */
	public $uri = null;

	/**
	 * @var object Shortcut URIs to plugin client assets (js, css, images, etc)
	 */
	public $uris = null;
	
	
    /**
     * Initialize the Groupie class and perform all necessary setup.
     */
    public function __construct()
    {
	    $this->setProperties();
        $this->hooks();
    }

	
	/**
	 * Set up all plugin properties
	 */
	private function setProperties()
	{
		$this->path = plugin_dir_path( dirname( __FILE__ ) );
		$this->uri = plugin_dir_url( dirname( __FILE__ ) );

		$this->paths = new stdClass();
		$this->paths->inc = trailingslashit( $this->path.'classes' );
		$this->paths->templates = trailingslashit( $this->path.'templates' );
		$this->paths->langs = trailingslashit( $this->path.'languages' );

		$this->uris = new stdClass();
		$this->uris->assets = trailingslashit( $this->uri.'assets' );
		$this->uris->css = trailingslashit( $this->uris->assets.'css' );
		$this->uris->js = trailingslashit( $this->uris->assets.'js' );
	}


    /**
     * Loads alternate languages, if available.
     */
    private function languages()
    {
        load_theme_textdomain( 'nvLangScope', NV_LANGS ); //get_template_directory()
        $locale = get_locale();
        $locale_file = sprintf( '%s/%s.php', NV_LANGS, $locale ); //get_template_directory()

        if ( is_readable( $locale_file ) )
        {
            require_once $locale_file;
        }
    }


    /**
     * Defines all hooks
     */
    private function hooks()
    {
        //register_activation_hook( GROUPIE_PATH , array( 'CTXPS_Queries', 'plugin_install' ) );
        //register_uninstall_hook( GROUPIE_PATH , array( 'CTXPS_Queries', 'plugin_delete' ) );

        // Add "Groups" option to "Users" in admin
        //add_action( 'admin_menu', array( 'CTXPS_App', 'admin_screens_init' ) );

        // Add a "Groups" view to a user's user-edit.php page
        //add_action('edit_user_profile', array('CTXPS_Router','user_groups'));

        // Add a "Groups" view to a user's profile.php page
        //add_action('show_user_profile', array('CTXPS_Router','user_groups'));

        //Add the security box sidebar to the pages section
        //add_action('admin_init', array('CTXPS_App','admin_init'));

        //Load localized language files
        //add_action('init',array('CTXPS_App','localize_init'));

        //Handle Ajax for Edit Page/Post page
        //add_action('wp_ajax_ctxps_add_group_to_post', array('CTXPS_Ajax','add_group_to_post'));
        //add_action('wp_ajax_ctxps_remove_group_from_page', array('CTXPS_Ajax','remove_group_from_page'));
        //add_action('wp_ajax_ctxps_security_update', array('CTXPS_Ajax','update_security'));

        //Handle Ajax for term page
        //add_action('wp_ajax_ctxps_add_group_to_term', array('CTXPS_Ajax','add_group_to_term'));
        //add_action('wp_ajax_ctxps_remove_group_from_term', array('CTXPS_Ajax','remove_group_from_term'));

        //Handle Ajax for Edit User page
        //add_action('wp_ajax_ctxps_add_group_to_user', array('CTXPS_Ajax','add_group_to_user'));
        //add_action('wp_ajax_ctxps_remove_group_from_user', array('CTXPS_Ajax','remove_group_from_user'));
        //add_action('wp_ajax_ctxps_update_member', array('CTXPS_Ajax','update_membership'));

        //handle Ajax for bulk add
        //add_action('wp_ajax_ctxps_user_bulk_add', array('CTXPS_Ajax','add_bulk_users_to_group'));

        //Add basic security to all public "static" pages and posts [highest priority]
        //add_action('wp', array('CTXPS_Security','protect_content'),1);

        //Add basic security to dynamically displayed posts (such as on Blog Posts Page, ie: Home) [highest priority]
        //add_filter('the_posts', array('CTXPS_Security','filter_loops'),1);

        //Ensure that menus do not display protected pages (when using default menus only) [highest priority]
        //add_filter('get_pages', array('CTXPS_Security','filter_auto_menus'),1);

        //Ensure that menus do not display protected pages (when using WP3 custom menus only) [highest priority]
        //add_filter('wp_get_nav_menu_items', array('CTXPS_Security','filter_custom_menus'),1);

        //Add shortcodes!
        //add_shortcode('groups_attached', array('CTXPS_Shortcodes','groups_attached')); //Current page permissions only
        //add_shortcode('groups_required', array('CTXPS_Shortcodes','groups_required')); //Complete permissions for current page

        //Update the edit.php pages & posts lists to include a "Protected" column
        //add_filter('manage_pages_columns', array('CTXPS_Components','add_list_protection_column'));
        //add_filter('manage_posts_columns', array('CTXPS_Components','add_list_protection_column'));
        //add_action('manage_pages_custom_column', array('CTXPS_Components','render_list_protection_column'),10,2); //Priority 10, Takes 2 args (use default priority only so we can specify args)
        //add_action('manage_posts_custom_column', array('CTXPS_Components','render_list_protection_column'),10,2); //Priority 10, Takes 2 args (use default priority only so we can specify args)
        //Taxonomy columns added from admin_init (app_controller.php)

        //Modify the global help array so we can add extra help text to default WP pages
        //add_action('admin_head', array('CTXPS_App','help_init'));

        //Inject Javascript that marks used category tags
        //add_action('admin_head', array('CTXPS_Security','tag_protected_terms_heirarchal'));

        //Also add asterisks to unused tags
        //add_action('tag_cloud_sort', array('CTXPS_Security','tag_protected_terms_unused'),10,2);

        //Update security records when a user is deleted
        //add_action( 'delete_user', array('CTXPS_Queries','delete_user') );
        //add_action( 'wpmu_delete_user', array('CTXPS_Queries','delete_user') );

        //add_action('edit_terms', array('CTXPS_Queries','toggle_term_protection')); //Disabled. This is now done via ajax
    }


}