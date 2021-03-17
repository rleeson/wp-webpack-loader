<?php 
/**
 * Webpack Asset Loader Configuration
 * 
 * @package rleeson/wp-webpack-loader
 */

namespace WPWebpackLoader\Model;

class LoaderConfiguration {
	const DEFAULT_SCRIPT_PATH = '/assets/dist/js/';

	const DEFAULT_STATIC_PATH = '/assets/dist/static/';

	const DEFAULT_STYLE_PATH = '/assets/dist/css/';

	const DEFAULT_PREFIX = 'wpwebpack-';

	/**
	 * @var string
	 */
	protected $_handle_prefix;

    /**
     * @var array
     */
    protected $_production_domains;

    /**
	 * @var string
	 */
	protected $_script_path;

	/**
	 * @var string
	 */
	protected $_static_path;

	/**
	 * @var string
	 */
	protected $_style_path;

    /**
	 * @var string
	 */
	protected $_version;

    /**
	 * LoaderConfiguration constructor.
	 *
     * @param string|null $_version
     * @param array|null $_production_domains
	 * @param string|null $_handle_prefix
	 * @param string|null $_script_path
	 * @param string|null $_style_path
	 * @param string|null $_static_path
	 */
	public function __construct(
        ?string $_version = null,
        ?array $_production_domains = null,
		?string $_handle_prefix = null,
		?string $_script_path = null,
		?string $_style_path = null,
		?string $_static_path = null
	) {
        $this->_version             = $this->check_string( $_version, null );
		$this->_handle_prefix       = $this->check_string( $_handle_prefix, self::DEFAULT_PREFIX );
		$this->_script_path         = $this->check_string( $_script_path, self::DEFAULT_SCRIPT_PATH );
		$this->_static_path         = $this->check_string( $_static_path, self::DEFAULT_STATIC_PATH );
		$this->_style_path          = $this->check_string( $_style_path, self::DEFAULT_STYLE_PATH );
        $this->_production_domains  = is_array( $_production_domains ) ? $_production_domains : [];
	}

    /**
	 * @param string|null $_entry
	 * @param string|null $_default
	 *
	 * @return string|null
	 */
	protected function check_string( ?string $_entry, ?string $_default ) : ?string {
		return empty( trim( $_entry ) ) ? $_default : trim( $_entry );
	}

    /**
     * Prefix to namespace, placed before all enqueued asset handles
     */
	public function handle_prefix() : string {
        return $this->_handle_prefix;
    }

    /**
     * Set of production domains to prevent development mode
     */
    public function production_domains() : array {
        return $this->_production_domains;
    }

    /**
     * Url path fragment before scripts
     */
	public function script_path() : string {
        return $this->_script_path;
    }

    /**
     * Url path fragment before static files
     */
	public function static_path() : string {
        return $this->_static_path;
    }

    /**
     * Url path fragment before stylesheets
     */
	public function style_path() : string {
        return $this->_style_path;
    }
	
    /**
     * Asset version passed to enqueue calls
     */
	public function version() : string {
        return $this->_version;
    }
}