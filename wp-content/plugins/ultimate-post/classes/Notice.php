<?php
/**
 * Notice Action.
 * 
 * @package ULTP\Notice
 * @since v.1.0.0
 */
namespace ULTP;

defined('ABSPATH') || exit;

/**
 * Notice class.
 */
class Notice {
    /**
	 * Setup class.
	 *
	 * @since v.1.0.0
	 */
    private $notice_version = 'v12';

    public function __construct(){
        $default_notice = ultimate_post()->get_notice_data();
        if (count($default_notice) > 0) {
            foreach ($default_notice as $key => $notice) {
                $current_time = date('U');
                if ($current_time > strtotime($notice['start']) && $current_time < strtotime($notice['end'])) {
                    $this->type = $notice['type'];
                    $this->content = $notice['content'];
                    $this->force = $notice['force'];
                    // add_action('admin_notices', array($this, 'ultp_installation_notice_callback'));
                }
            }
        }
		add_action('admin_init', array($this, 'set_dismiss_notice_callback'));
	}

    /**
	 * Promotional Dismiss Notice Option Data
     * 
     * @since v.2.0.1
	 * @param NULL
	 * @return NULL
	 */
	public function set_dismiss_notice_callback() {
		if (!isset($_GET['disable_postx_notice_' . $this->notice_version])) {
			return ;
        }
        if (sanitize_key($_GET['disable_postx_notice_' . $this->notice_version]) == 'yes') {
            set_transient( 'ultp_get_pro_notice_' . $this->notice_version, 'off', 2592000 ); // 30 days notice
        }
	}

    /**
	 * Dismiss Notice HTML Data
     * 
     * @since v.1.0.0
	 * @param NULL
	 * @return STRING
	 */
	public function ultp_installation_notice_callback() {
		if (ultimate_post()->get_tran('ultp_get_pro_notice_' . $this->notice_version) != 'off') {
            if (!ultimate_post()->is_lc_active() && ($this->force || get_transient('wpxpo_installation_date') != 'yes')) {
                if (!isset($_GET['disable_postx_notice_' . $this->notice_version])) {
                    $this->ultp_notice_css();
                    ?>
                    <div class="wc-install ultp-free-notice">
                        <?php
                            switch ($this->type) {
                                case 'banner': ?>
                                    <div class="wc-install-body ultp-image-banner">
                                        <a class="wc-dismiss-notice" href="<?php echo esc_url( add_query_arg( 'disable_postx_notice_' . $this->notice_version, 'yes' ) ); ?>">
                                            Dismiss
                                        </a>
                                        <a class="ultp-btn-image" target="_blank" href="<?php echo esc_url(ultimate_post()->get_premium_link('', 'dashboard_db_banner')); ?>">
                                            <img loading="lazy" src="<?php echo esc_url($this->content); ?>" alt="Discount Banner"/>
                                        </a>
                                    </div>
                                <?php break;
                                case 'content': ?>
                                    <div class="wc-install-body">
                                    <?php echo $this->content; ?>
                                        <!-- <a class="button button-primary button-hero ultp-btn-notice-pro" target="_blank" href="< ?php echo esc_url(ultimate_post()->get_premium_link('','dashboard_db_banner')); ?  >"><span class="dashicons dashicons-image-rotate"></span>< ?php esc_html_e('Upgrading to Pro', 'ultimate-post'); ?></a>
                                        <a class="button-secondary button-large" href="< ?php echo esc_url( add_query_arg( 'disable_postx_notice_' . $this->notice_version, 'yes' ) ); ? >">< ?php esc_html_e('No Thanks / Close.', 'ultimate-post'); ? ></a>  -->
                                    </div>
                                <?php break;
                            }
                        ?>
                    </div>
                    <?php
                }
            }
		}
	}

    /**
	 * Admin Notice CSS File
     * 
     * @since v.1.0.0
	 * @param NULL
	 * @return STRING
	 */
	public function ultp_notice_css() {
		?>
		<style type="text/css">
            .ultp-free-notice.wc-install {
                display: flex;
                align-items: center;
                background: #fff;
                margin-top: 40px;
                width: calc(100% - 50px);
                border: 1px solid #ccd0d4;
                padding: 4px;
                border-radius: 4px;
                border-left: 3px solid #007fe1;
                line-height: 0;
            }   
            .ultp-free-notice.wc-install img {
                margin-right: 0; 
                max-width: 100%;
            }
            .ultp-free-notice .wc-install-body {
                -ms-flex: 1;
                flex: 1;
                position: relative;
                padding: 10px;
            }
            .ultp-free-notice .wc-install-body.ultp-image-banner{
                padding: 0px;
            }
            .ultp-free-notice .wc-install-body h3 {
                margin-top: 0;
                font-size: 24px;
                margin-bottom: 15px;
            }
            .ultp-install-btn {
                margin-top: 15px;
                display: inline-block;
            }
			.ultp-free-notice .wc-install .dashicons{
				display: none;
				animation: dashicons-spin 1s infinite;
				animation-timing-function: linear;
			}
			.ultp-free-notice.wc-install.loading .dashicons {
				display: inline-block;
				margin-top: 12px;
				margin-right: 5px;
			}
            .ultp-free-notice .wc-install-body h3 {
                font-size: 20px;
                margin-bottom: 5px;
            }
            .ultp-free-notice .wc-install-body > div {
                max-width: 100%;
                margin-bottom: 10px;
            }
            .ultp-free-notice .button-hero {
                padding: 8px 14px !important;
                min-height: inherit !important;
                line-height: 1 !important;
                box-shadow: none;
                border: none;
                transition: 400ms;
            }
            .ultp-free-notice .ultp-btn-notice-pro {
                background: #2271b1;
                color: #fff;
            }
            .ultp-free-notice .ultp-btn-notice-pro:hover,
            .ultp-free-notice .ultp-btn-notice-pro:focus {
                background: #185a8f;
            }
            .ultp-free-notice .button-hero:hover,
            .ultp-free-notice .button-hero:focus {
                border: none;
                box-shadow: none;
            }
			@keyframes dashicons-spin {
				0% {
					transform: rotate( 0deg );
				}
				100% {
					transform: rotate( 360deg );
				}
			}
			.ultp-free-notice .wc-dismiss-notice {
                color: #fff;
                background-color: #000000;
                padding-top: 0px;
                position: absolute;
                right: 0;
                top: 0px;
                padding: 10px 10px 14px;
                border-radius: 0 0 0 4px;
                display: inline-block;
                transition: 400ms;
            }
            .ultp-free-notice .wc-dismiss-notice:hover {
                color:red;
            }
			.ultp-free-notice .wc-dismiss-notice .dashicons{
                display: inline-block;
                text-decoration: none;
                animation: none;
                font-size: 16px;
			}
            /* ===== Eid Banner Css ===== */
            .ultp-free-notice .wc-install-body {
                background: linear-gradient(90deg,rgb(0,110,188) 0%,rgb(2,17,196) 100%);
            }
            .ultp-free-notice p{
                color: #fff;
                margin: 5px 0px;
                font-size: 16px;
                font-weight: 300;
                letter-spacing: 1px;
            }
            .ultp-free-notice p.ultp-enjoy-offer {
                display: inline;
                font-weight: bold;
                
            }
            .ultp-free-notice .ultp-get-now {
                font-size: 14px;
                color: #fff;
                background: #14a8ff;
                padding: 8px 12px;
                border-radius: 4px;
                text-decoration: none;
                margin-left: 10px;
                position: relative;
                top: -4px;
                transition: 400ms;
            }
            .ultp-free-notice .ultp-get-now:hover{
                background: #068fe0;
            }
            .ultp-free-notice .ultp-dismiss {
                color: #fff;
                background-color: #000964;
                padding-top: 0px;
                position: absolute;
                right: 0;
                top: 0px;
                padding: 10px 8px 12px;
                border-radius: 0 0 0 4px;
                display: inline-block;
                transition: 400ms;
            }
            .ultp-free-notice .ultp-dismiss:hover {
                color: #d2d2d2;
            }
		</style>
		<?php
    }

}