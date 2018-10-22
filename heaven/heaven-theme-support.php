<?php

add_image_size( 'post_grid_default', 305, 275, true );

if ( ! function_exists( 'heaven_theme_support ') ) :

  function heaven_theme_support() {
    add_theme_support( 'custom-logo' );
  }
  add_action( 'after_setup_theme', 'heaven_theme_support' );

endif;

function heaven_adjustments() {

  add_menu_page( 'Heaven', 'Holme Adjustments', 'administrator', 'heaven_adjustments', 'heaven_options', '', 20 );
  add_submenu_page( 'heaven_adjustments',  'Heaven Settings', 'Theme settings', 'administrator', 'heaven_theme_settings', 'heaven_theme_settings' );
  add_submenu_page( 'heaven_adjustments',  'Heaven', 'Home Sections Content', 'administrator', 'heaven_adjustments', 'heaven_options' );
  add_submenu_page( 'heaven_adjustments',  'Heaven Sections', 'Create Home Sections', 'administrator', 'heaven_sections', 'heaven_section_options' );
  add_submenu_page( 'heaven_adjustments', 'Footer Sections', 'Footer Sections', 'administrator', 'holme_footer', 'holme_footer_options' );

  // Call to registration for theme options.
  add_action( 'admin_init', 'heaven_options_register' );
}
add_action( 'admin_menu', 'heaven_adjustments' );

function heaven_options_register() {

  // Theme Settings.
  register_setting( 'holme_settings_group', 'holme_setting_breadcrumb' );
  register_setting( 'holme_settings_group', 'holme_setting_breadcrumb_separator' );

  // Home Section Fields.
  if( get_option( 'home_sections_total') ) {

    $total = get_option( 'home_sections_total');
    for ($i = 1; $i <= $total; $i++) {
      // Default type fields
      $section_text = 'home_section_'. $i .'_text';
      register_setting( 'heaven_option_group', $section_text );
      $section_button_text = 'home_section_'. $i .'_button_text';
      register_setting( 'heaven_option_group', $section_button_text );
      $section_button_url = 'home_section_'. $i .'_button_url';
      register_setting( 'heaven_option_group', $section_button_url );

      // Grid type fields
      register_setting( 'heaven_option_group', 'home_section_'. $i .'_columns' );
      if ( get_option( 'home_section_'. $i .'_columns' ) ) {
        $columns = get_option( 'home_section_'. $i .'_columns' );
        for ($c = 1; $c <= $columns; $c++) {
          register_setting( 'heaven_option_group', 'home_section_'. $i .'_column_'. $c );
          register_setting( 'heaven_option_group', 'home_section_'. $i .'_icon_'. $c );
        }
      }

      // Posts Grid.
      register_setting( 'heaven_option_group', 'home_section_'. $i .'_post_type' );
      register_setting( 'heaven_option_group', 'home_section_'. $i .'_post_items' );
      register_setting( 'heaven_option_group', 'home_section_'. $i .'_post_template' );

      //Footer Fields.
      register_setting( 'holme_footer_group', 'holme_footer_columns' );
      if( get_option( 'holme_footer_columns') != '' ) {
        $f_columns = get_option('holme_footer_columns');
        for ($i = 1; $i <= $f_columns; $i++) {
          register_setting( 'holme_footer_group', 'holme_footer_column_'. $i .'_type' );
          register_setting( 'holme_footer_group', 'holme_footer_column_'. $i .'_text' );
          // Post Type Field.
          register_setting( 'holme_footer_group', 'holme_footer_column_'.$i .'_post_type');
          register_setting( 'holme_footer_group', 'holme_footer_column_'.$i .'_post_title');
          register_setting( 'holme_footer_group', 'holme_footer_column_'.$i .'_post_items');
          register_setting( 'holme_footer_group', 'holme_footer_column_'.$i .'_post_template');
          // Cat Type Field.
          register_setting( 'holme_footer_group', 'holme_footer_column_'.$i .'_cat_title');
          register_setting( 'holme_footer_group', 'holme_footer_column_'.$i .'_cat_name');
          register_setting( 'holme_footer_group', 'holme_footer_column_'.$i .'_cat_limit');
          register_setting( 'holme_footer_group', 'home_footer_column_'. $i .'_cat_counter');
        }
      }

    }

  }

  // Sections Settings Group.
  register_setting( 'heaven_section_group', 'home_sections_total' );

  if( get_option( 'home_sections_total') ) {
    $total = get_option( 'home_sections_total');
    for ($i = 1; $i <= $total; $i++) {
      $field =  'home_section_'. $i .'_name';
      register_setting( 'heaven_section_group', $field );
      register_setting( 'heaven_section_group', 'home_section_'. $i .'_type' );
    }
  }

}

function heaven_theme_settings() { ?>
  <div class="wrap">

    <h1 class="title">Theme Settings</h1>

    <form action="options.php" method="post">

      <?php settings_fields( 'holme_settings_group' ); ?>
      <?php do_settings_sections( 'holme_settings_group' ); ?>

      <table class="form-table">
              <tr valign="top">
                <th scope="row">Use Breadcrumbs</th>
                <td>
                  <fieldset>
                    <legend class="screen-reader-text"><span>Use Breadcrumbs <?php echo get_option('holme_setting_breadcrumb'); ?></span></legend>
                    <label for="">
                      <input name="holme_setting_breadcrumb" type="checkbox" value="1" <?php checked( '1', get_option( 'holme_setting_breadcrumb' ) ); ?> />
                      Show Theme Breadcrums
                    </label>
                  </fieldset>
                </td>
              </tr>
              <tr valign="top">
                <th row="scope">Breadcrumb Separator</th>
                <td>
                  <input name="holme_setting_breadcrumb_separator" type="text" value="<?php echo get_option( 'holme_setting_breadcrumb_separator' ); ?>" />
                </td>
              </tr>
            </table>
            <?php submit_button(); ?>
    </form>

  </div>
<?php }

function holme_footer_options() {
?>
  <div class="wrap">
    <h1 class="title">Footer Settings</h1>

    <form action="options.php" method="post">

      <?php settings_fields( 'holme_footer_group' ); ?>
      <?php do_settings_sections( 'holme_footer_group' ); ?>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Footer Columns</th>
          <td>
            <input type="text" name="holme_footer_columns" value="<?php echo esc_attr( get_option('holme_footer_columns') ) ?>">
            <p>Set the number of columns for the footer.</p>
          </td>

        </tr>
      </table>

      <?php if( get_option( 'holme_footer_columns') != '' ) { ?>
        <?php $f_columns = get_option('holme_footer_columns'); ?>
        <?php for ($i = 1; $i <= $f_columns; $i++) { ?>
          <?php $column_type = get_option('holme_footer_column_'. $i .'_type'); ?>
          <h2 class="title">Footer Column <?php echo $i; ?></h2>
          <table class="form-table">
            <tr valign="top">
              <th scope="row">Column Type</th>
              <td>
                <select name="holme_footer_column_<?php echo $i; ?>_type" >
                  <option value="0">- Select -</option>
                  <option value="text" <?php echo ( $column_type == 'text') ? 'selected="selected"' : ''; ?> >Text</option>
                  <option value="post" <?php echo ( $column_type == 'post') ? 'selected="selected"' : ''; ?> >Posts List</option>
                  <option value="cat" <?php echo ( $column_type == 'cat') ? 'selected="selected"' : ''; ?> >Categories List</option>
                </select>
              </td>
            </tr>

          </table>

          <!-- Load Fields by Column type -->
          <?php switch ($column_type) {
            case 'text': ?>
              <table class="form-table">
                <tr valing="top">
                  <th scope=#row>
                    <td><textarea name="holme_footer_column_<?php echo $i; ?>_text" rows="8" cols="80"><?php echo esc_attr( get_option( 'holme_footer_column_'. $i .'_text' ) ); ?></textarea></td>
                  </th>
                </tr>
              </table>
            <?php break;

            case 'post': ?>
              <table class="form-table">
                <tr valign="top">
                  <th scope="row">Post Title</th>
                    <td><input type="text" name="holme_footer_column_<?php echo $i; ?>_post_title" value="<?php echo get_option('holme_footer_column_'.$i .'_post_title'); ?>"></td>
                </tr>
                <tr valign="top">
                  <th scope="row">Post Type</th>
                    <td><input type="text" name="holme_footer_column_<?php echo $i; ?>_post_type" value="<?php echo get_option('holme_footer_column_'. $i .'_post_type'); ?>"></td>
                </tr>
                <tr valign="top">
                  <th scope="row">Number of Items</th>
                  <td><input type="text" name="holme_footer_column_<?php echo $i; ?>_post_items" value="<?php echo get_option('holme_footer_column_'. $i .'_post_items'); ?>"></td>
                </tr>
                <tr valign="top">
                  <th scope="row">Post Template</th>
                  <td><input type="text" name="holme_footer_column_<?php echo $i; ?>_post_template" value="<?php echo get_option('holme_footer_column_'. $i .'_post_template'); ?>"></td>
                </tr>
              </table>
            <?php  break;

            case 'cat': ?>
              <table class="form-table">
                <tr valign="top">
                  <th scope="row">Title</th>
                    <td><input type="text" name="holme_footer_column_<?php echo $i; ?>_cat_title" value="<?php echo get_option('holme_footer_column_'.$i .'_cat_title'); ?>"></td>
                </tr>
                <tr valign="top">
                  <th scope="row">Category Name</th>
                    <td><input type="text" name="holme_footer_column_<?php echo $i; ?>_cat_name" value="<?php echo get_option('holme_footer_column_'.$i .'_cat_name'); ?>"></td>
                </tr>
                <tr valign="top">
                  <th scope="row">Category Limit</th>
                    <td>
                      <input type="text" name="holme_footer_column_<?php echo $i; ?>_cat_limit" value="<?php echo get_option('holme_footer_column_'.$i .'_cat_limit'); ?>">
                      <p>Max number of terms to show.</p>
                    </td>
                </tr>

                <tr valign="top">
                  <th scope="row">Show Post Counter</th>
                  <td>

                    <p>
                      <label for="">
                        <input <?php echo ( get_option('home_footer_column_'. $i .'_cat_counter') == 'No') ? 'checked="checked"' : ''; ?> name="home_footer_column_<?php echo $i; ?>_cat_counter" type="radio" value="No" >
                        No
                      </label>
                    </p>

                    <p>
                      <label for="">
                        <input <?php echo ( get_option('home_footer_column_'. $i .'_cat_counter') == 'Yes') ? 'checked="checked"' : ''; ?> name="home_footer_column_<?php echo $i; ?>_cat_counter" type="radio" value="Yes" >
                        Yes
                      </label>
                    </p>

                  </td>


                  </th>
                </tr>

              </table>

            <?php break;

            default:
              // code...
              break;
          } ?>

          <hr><!-- end of column fields -->
        <?php } ?><!-- End For: $f_columns -->
      <?php } ?>

      <?php submit_button(); ?>
    </form>

  </div>
<?php
}

function heaven_options() {
  ?>

  <div class="wrap">

    <h1>Home Page Section</h1>

    <form action="options.php" method="post">

        <?php settings_fields( 'heaven_option_group' ); ?>
        <?php do_settings_sections( 'heaven_option_group' ); ?>

        <?php
          if( get_option( 'home_sections_total') ) {
            $total = get_option( 'home_sections_total');
            for ($i = 1; $i <= $total; $i++) { ?>
              <h2 class="title">Section <?php echo $i; ?> - <?php echo esc_attr( get_option('home_section_'. $i .'_name') ); ?></h2>

                <?php if(get_option('home_section_'. $i .'_type') == 'default') { ?>

                      <table class="form-table">
                        <tr valing="top">
                          <?php $field =  'home_section_'. $i .'_text'; ?>
                          <th scope="row">Section <?php echo $i; ?> text</th>
                          <td><textarea name="home_section_<?php echo $i; ?>_text" rows="10" cols="70" ><?php echo esc_attr( get_option( $field ) ); ?></textarea></td>
                        </tr>

                        <tr valing="top">
                          <?php $field =  'home_section_'. $i .'_button_text'; ?>
                          <th scope="row">Section <?php echo $i; ?> Button Text</th>
                          <td><input name="home_section_<?php echo $i; ?>_button_text"  value="<?php echo esc_attr( get_option( $field ) ); ?>"></td>
                        </tr>

                        <tr valing="top">
                          <?php $field =  'home_section_'. $i .'_button_url'; ?>
                          <th scope="row">Section <?php echo $i; ?> Button URL</th>
                          <td><input name="home_section_<?php echo $i; ?>_button_url"  value="<?php echo esc_url( get_option( $field ) ); ?>"></td>
                        </tr>

                      </table>
                      <hr>
                <?php } elseif (get_option('home_section_'. $i .'_type') == 'icon_grid') { ?>

                  <p>Grid Section Settings.</p>
                  <table class="form-table">
                    <tr valing="top">
                      <?php //$field =  'home_section_'. $i .'_text'; ?>
                      <th scope="row">Number of Columns</th>
                      <td><input name="home_section_<?php echo $i; ?>_columns"  value="<?php echo esc_attr( get_option( 'home_section_'. $i .'_columns' ) ); ?>"></td>
                    </tr>

                  </table>

                  <?php /* Load textareas for each column */ ?>

                  <?php if ( get_option( 'home_section_'. $i .'_columns' ) ) { ?>
                    <?php $columns = get_option( 'home_section_'. $i .'_columns' ); ?>
                    <?php for ($c = 1; $c <= $columns; $c++) { ?>

                      <table class="form-table">

                        <tr valing="top">
                          <?php //$field =  'home_section_'. $i .'_column_'. $c; ?>
                          <th scope="row">Icon</th>
                          <td>
                            <p>Font Awesome Icon Name ( example: fa-magic )</p>
                            <p><input name="home_section_<?php echo $i; ?>_icon_<?php echo $c; ?>" value="<?php echo esc_attr( get_option( 'home_section_'. $i .'_icon_'. $c ) ); ?>" ></p>
                          </td>
                        </tr>

                        <tr valing="top">
                          <?php //$field =  'home_section_'. $i .'_column_'. $c; ?>
                          <th scope="row">Section Columns <?php echo $c; ?> Text</th>
                          <td><textarea name="home_section_<?php echo $i; ?>_column_<?php echo $c; ?>" rows="10" cols="70" ><?php echo esc_attr( get_option( 'home_section_'. $i .'_column_'. $c ) ); ?></textarea></td>
                        </tr>
                      </table>
                      <hr>
                    <?php } ?><!-- endfor -->
                  <?php } ?>

                <?php } elseif (get_option('home_section_'. $i .'_type') == 'posts_grid') { ?>
                  <p>Posts Grid Settings.</p>

                  <table class="form-table">
                    <tr valing="top">
                      <?php //$field =  'home_section_'. $i .'_text'; ?>
                      <th scope="row">Post type</th>
                      <td><input name="home_section_<?php echo $i; ?>_post_type"  value="<?php echo esc_attr( get_option( 'home_section_'. $i .'_post_type' ) ); ?>"></td>
                    </tr>

                    <tr valing="top">
                      <?php //$field =  'home_section_'. $i .'_text'; ?>
                      <th scope="row">Number of Posts</th>
                      <td><input name="home_section_<?php echo $i; ?>_post_items"  value="<?php echo esc_attr( get_option( 'home_section_'. $i .'_post_items' ) ); ?>"></td>
                    </tr>

                    <tr valing="top">
                      <?php //$field =  'home_section_'. $i .'_text'; ?>
                      <th scope="row">Posts Template</th>
                      <td><input name="home_section_<?php echo $i; ?>_post_template"  value="<?php echo esc_attr( get_option( 'home_section_'. $i .'_post_template' ) ); ?>"></td>
                    </tr>

                    <tr valing="top">
                      <th scope="row">Section <?php echo $i; ?> text</th>
                      <td><textarea name="home_section_<?php echo $i; ?>_text" rows="10" cols="70" ><?php echo esc_attr( get_option( 'home_section_'. $i .'_text' ) ); ?></textarea></td>
                    </tr>

                  </table>

                  <hr>

                <?php } ?><!-- post grid type -->

          <?php  }
          }
        ?>

        <?php submit_button(); ?>

      </form>

  </div><!-- wrap -->

  <?php
}

function heaven_section_options() {
  ?>

  <div class="wrap">

    <h1>Front Page Sections Settings</h1>

    <form action="options.php" method="post">

      <?php settings_fields( 'heaven_section_group' ) ?>
      <?php do_settings_sections( 'heaven_section_group' ) ?>

      <table class="form-table">
        <tr valign="top">
          <th scope="row">Total Home Sections</th>
          <td><input type="text" name="home_sections_total" value="<?php echo esc_attr( get_option('home_sections_total')); ?>"></td>
        </tr>
      </table>

      <h2 class="title">Home Page Sections</h2>
      <p>Define name for each section created.</p>
      <table class="form-table">

          <?php if( get_option( 'home_sections_total') ) { ?>
            <?php $total = get_option( 'home_sections_total'); ?>
            <?php for ($i = 1; $i <= $total; $i++) { ?>
              <?php $field =  'home_section_'. $i .'_name'; ?>
              <tr valign="top">
                <th scope="row">Section <?php echo $i; ?> Name</th>
                <td><input type="text" name="home_section_<?php echo $i; ?>_name" value="<?php echo esc_attr( get_option( $field ) ) ?>"></td>

                <th scope="row">Section type</th>
                <td>
                  <p>
                    <label for="">
                      <input <?php echo ( get_option('home_section_'. $i .'_type') == 'default') ? 'checked="checked"' : ''; ?> name="home_section_<?php echo $i; ?>_type" type="radio" value="default" >
                      Default
                    </label>
                  </p>

                  <p>
                    <label for="">
                      <input <?php echo ( get_option('home_section_'. $i .'_type') == 'icon_grid') ? 'checked="checked"' : ''; ?> name="home_section_<?php echo $i; ?>_type" type="radio" value="icon_grid" >
                      Section Icons Grid
                    </label>
                  </p>

                  <p>
                    <label for="">
                      <input <?php echo ( get_option('home_section_'. $i .'_type') == 'posts_grid') ? 'checked="checked"' : ''; ?>name="home_section_<?php echo $i; ?>_type" type="radio" value="posts_grid">
                      Section Posts Grid
                    </label>
                  </p>

                </td>
              </tr>
            <?php } ?>

          <?php } ?>

      </table>

      <?php submit_button(); ?>

    </form>
  </div>

  <?php
}
