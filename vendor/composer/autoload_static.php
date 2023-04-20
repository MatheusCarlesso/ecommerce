<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0af2f5311ba68f302e3c6faf08faf1ff
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MatheusCarlesso\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MatheusCarlesso\\' => 
        array (
            0 => __DIR__ . '/..' . '/matheuscarlesso/php-classes/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Slim' => 
            array (
                0 => __DIR__ . '/..' . '/slim/slim',
            ),
        ),
        'R' => 
        array (
            'Rain' => 
            array (
                0 => __DIR__ . '/..' . '/rain/raintpl/library',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'EasyPeasyICS' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/EasyPeasyICS.php',
        'PHPMailer' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
        'PHPMailerOAuth' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauth.php',
        'PHPMailerOAuthGoogle' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauthgoogle.php',
        'POP3' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.pop3.php',
        'SMTP' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.smtp.php',
        'ntlm_sasl_client_class' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/ntlm_sasl_client.php',
        'phpmailerException' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0af2f5311ba68f302e3c6faf08faf1ff::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0af2f5311ba68f302e3c6faf08faf1ff::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit0af2f5311ba68f302e3c6faf08faf1ff::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit0af2f5311ba68f302e3c6faf08faf1ff::$classMap;

        }, null, ClassLoader::class);
    }
}