<?php

Class InTouch_Autoloader 
{
    private $baseDir;

    public function __construct( $baseDir = null ) 
    {
        $baseDir = dirname(__FILE__) . '/..';

        $realDir = realpath( $baseDir );
        if ( is_dir( $realDir ) ) {
            $this->baseDir = $realDir;
        } else {
            $this->baseDir = $baseDir;
        }


    }

    public function register( $baseDir = null ) 
    {

        $loader = new self( $baseDir );
        spl_autoload_register( array( $loader, 'autoload' ) );
        return $loader;
    }

    public function autoload( $class )
    {
        if ( $class[0] == '\\' ) {
            $class = substr( $class, 1 );
        }

        if ( strpos( $class, 'InTouch' ) !== 0 ) {
            return;
        }
        $file = sprintf( '%s/%s.php', $this->baseDir, str_replace( '_', '/', $class ) );

        if ( is_file( $file ) ) {
            require $file;
        }
    }
}