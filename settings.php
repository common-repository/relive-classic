<?php

class RELIVE_CLASSIC_SETTINGS{
    public function __construct(){
        add_action( 'admin_menu', array( $this, 'register_menu' ) );
        add_action( 'admin_init', array( $this, 'register_config_settings') );
    }

    public function register_menu(){
        if( class_exists('RELIVE_CLASSIC_IMPLEMENT') ){
            add_menu_page(
                esc_html__( 'Relive Classic', 'relive-classic' ),
                esc_html__( 'Relive Classic', 'relive-classic' ),
                'manage_options',
                'relive-classic-settings',
                array($this,'relive_classic_settings_configs'),
                'dashicons-image-rotate'
            );
        }
    }

    function register_config_settings() {
        register_setting( 'relive-classic-settings-configs-group', 'relive_classic_editor_enable');
        register_setting( 'relive-classic-settings-configs-group', 'relive_classic_widgets_enable');
        register_setting( 'relive-classic-settings-configs-group', 'relive_classic_frontend_gutenberg_stylesheet');
    }

    public function relive_classic_settings_configs(){
        $editor = esc_attr(get_option( 'relive_classic_editor_enable' ));
        $widgets = esc_attr(get_option( 'relive_classic_widgets_enable' ));
        $frontend = esc_attr(get_option( 'relive_classic_frontend_gutenberg_stylesheet' ));
        ?>
        <div class="banner-plugin">
            <h2><?php echo esc_html__('Relive Classic', 'relive-classic'); ?></h2>
        </div>

        <div class="main-plugin">
            <div class="main-left">
            <form method="post" action="options.php">
                <?php settings_fields( 'relive-classic-settings-configs-group'); ?>
                <?php do_settings_sections( 'relive-classic-settings-configs-group'); ?>
                <h3><?php echo esc_html__('Classic Editor', 'relive-classic'); ?></h3>
                <p class="description"><?php echo esc_html__('Once Enable the restores the previous (“classic”) WordPress editor and the “Edit Post” screen. It makes it possible to use plugins that extend that screen, add old-style meta boxes, or otherwise depend on the previous editor.', 'relive-classic'); ?></p>
                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo esc_html__('Enable', 'relive-classic'); ?></th>
                            <td>
                                <input name="relive_classic_editor_enable" type="checkbox" id="relive_classic_editor_enable" value="yes" class="regular-text" <?php echo $editor == 'yes' ? 'checked="checked"' : ''; ?> />
                                <p class="description"><?php echo esc_html__('Allow use classic', 'relive-classic'); ?></p>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <h3><?php echo esc_html__('Classic Widgets', 'relive-classic'); ?></h3>
                <p class="description"><?php echo esc_html__('Once Enable and when using a classic (non-block) theme, this feature restores the previous widgets settings screens and disables the block editor from managing widgets.', 'relive-classic'); ?></p>
                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo esc_html__('Enable', 'relive-classic'); ?></th>
                            <td>
                                <input name="relive_classic_widgets_enable" type="checkbox" id="relive_classic_widgets_enable" value="yes" class="regular-text" <?php echo $widgets == 'yes' ? 'checked="checked"' : ''; ?>/>
                                <p class="description"><?php echo esc_html__('Allow use classic', 'relive-classic'); ?></p>
                            </td>
                        </tr>
                    </tbody>
                </table>

                
                <h3><?php echo esc_html__('Disable frontend Gutenberg stylesheet', 'relive-classic'); ?></h3>
                <p class="description"><?php echo esc_html__('By default the Gutenberg Block Editor loads its default CSS/stylesheet on the front-end of your WordPress site. This is fine for most cases, but there may be situations where you want to disable the Gutenberg styles for whatever reason.', 'relive-classic'); ?></p>
                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo esc_html__('Enable', 'relive-classic'); ?></th>
                            <td>
                                <input name="relive_classic_frontend_gutenberg_stylesheet" type="checkbox" id="relive_classic_frontend_gutenberg_stylesheet" value="yes" class="regular-text" <?php echo $frontend == 'yes' ? 'checked="checked"' : ''; ?>/>
                                <p class="description"><?php echo esc_html__('Allow use feature', 'relive-classic'); ?></p>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <?php submit_button(); ?>
            </form>
            </div>

            <div class="main-right">
                <div class="relive-classic-widgets documents">
                    <h3><?php echo esc_html__('Rate Plugin', 'relive-classic'); ?></h3>
                    <p><?php echo esc_html__('We\'ll update soon!', 'relive-classic'); ?></p>
                </div>

                <div class="relive-classic-widgets info-contact">
                    <h3><?php echo esc_html__('Contact Support', 'relive-classic'); ?></h3>
                    <ul>
                        <li><a href="https://nhathuynhvan.com/" target="_blank">Website: Nhathuynhvan.com</a></li>
                        <li><a href="mailto:contact@nhathuynhvan.com">Email: contact@nhathuynhvan.com</a></li>
                    </ul>
                </div>

                <div class="relive-classic-widgets recommend-plugin">
                    <h3><?php echo esc_html__('Recommend Plugin', 'relive-classic'); ?></h3>
                    <p><?php echo esc_html__('We\'ll update soon!', 'relive-classic'); ?></p>
                </div>
            </div>
        </div>
        <?php
    }
}

new RELIVE_CLASSIC_SETTINGS();