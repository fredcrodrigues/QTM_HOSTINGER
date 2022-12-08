<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],
        'imagem_banner' => [
            'driver' => 'local',
            'root' => storage_path('app/public/imagem_banner'),
            'url' => env('APP_URL').'/banner-imagem',
            'visibility' => 'public',
        ],
        'imagem_sobre' => [
            'driver' => 'local',
            'root' => storage_path('app/public/imagem_sobre'),
            'url' => env('APP_URL').'/sobre-imagem',
            'visibility' => 'public',
        ],

        'imagem_sobre_principal_01' => [
            'driver' => 'local',
            'root' => storage_path('app/public/imagem_sobre_principal_01'),
            'url' => env('APP_URL').'/sobre-principal-01',
            'visibility' => 'public',
        ],
        'imagem_sobre_principal_02' => [
            'driver' => 'local',
            'root' => storage_path('app/public/imagem_sobre_principal_02'),
            'url' => env('APP_URL').'/sobre-principal-02',
            'visibility' => 'public',
        ],
        'imagem_sobre_secundario_01' => [
            'driver' => 'local',
            'root' => storage_path('app/public/imagem_sobre_secundario_01'),
            'url' => env('APP_URL').'/sobre-secundario-01',
            'visibility' => 'public',
        ],
        'imagem_sobre_secundario_02' => [
            'driver' => 'local',
            'root' => storage_path('app/public/imagem_sobre_secundario_02'),
            'url' => env('APP_URL').'/sobre-secundario-02',
            'visibility' => 'public',
        ],
        'imagem_time' => [
            'driver' => 'local',
            'root' => storage_path('app/public/imagem_time'),
            'url' => env('APP_URL').'/time-imagem',
            'visibility' => 'public',
        ],

        'video_sobre_secundario' => [
            'driver' => 'local',
            'root' => storage_path('app/public/video_sobre_secundario'),
            'url' => env('APP_URL').'/sobre-secundario-video',
            'visibility' => 'public',
        ],


        'imagem_parceiro' => [
            'driver' => 'local',
            'root' => storage_path('app/public/imagem_parceiro'),
            'url' => env('APP_URL').'/parceiro-imagem',
            'visibility' => 'public',
        ],
        'imagem_logomarca' => [
            'driver' => 'local',
            'root' => storage_path('app/public/imagem_logomarca'),
            'url' => env('APP_URL').'/logomarca-imagem',
            'visibility' => 'public',
        ],
        'imagem_video' => [
            'driver' => 'local',
            'root' => storage_path('app/public/imagem_video'),
            'url' => env('APP_URL').'/video-imagem',
            'visibility' => 'public',
        ],
        'imagem_depoimento' => [
            'driver' => 'local',
            'root' => storage_path('app/public/imagem_depoimento'),
            'url' => env('APP_URL').'/depoimento-imagem',
            'visibility' => 'public',
        ],
        'imagem_servico' => [
            'driver' => 'local',
            'root' => storage_path('app/public/imagem_servico'),
            'url' => env('APP_URL').'/servico-imagem',
            'visibility' => 'public',
        ],
        'imagem_servico_oferecido' => [
            'driver' => 'local',
            'root' => storage_path('app/public/imagem_servico_oferecido'),
            'url' => env('APP_URL').'/servico-oferecido-imagem',
            'visibility' => 'public',
        ],
        'imagem_noticia' => [
            'driver' => 'local',
            'root' => storage_path('app/public/imagem_noticia'),
            'url' => env('APP_URL').'/noticia',
            'visibility' => 'public',
        ],

        'imagem_produto' => [
            'driver' => 'local',
            'root' => storage_path('app/public/imagem_produto'),
            'url' => env('APP_URL').'/produto-imagem',
            'visibility' => 'public',
        ],

        'imagem_cliente' => [
            'driver' => 'local',
            'root' => storage_path('app/public/imagem_cliente'),
            'url' => env('APP_URL').'/cliente-imagem',
            'visibility' => 'public',
        ],

        'comprovante_residencia' => [
            'driver' => 'local',
            'root' => storage_path('app/public/comprovante_residencia'),
            'url' => env('APP_URL').'/comprovante-residencia',
            'visibility' => 'public',
        ],

        'licenca_funcionamento' => [
            'driver' => 'local',
            'root' => storage_path('app/public/licenca_funcionamento'),
            'url' => env('APP_URL').'/licenca-funcionamento',
            'visibility' => 'public',
        ],

        'registro' => [
            'driver' => 'local',
            'root' => storage_path('app/public/registro'),
            'url' => env('APP_URL').'/registro',
            'visibility' => 'public',
        ],
        'imagem_covidas' => [
            'driver' => 'local',
            'root' => storage_path('app/public/imagem_covidas'),
            'url' => env('APP_URL').'/covidas-imagem',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
        public_path('banner-imagem') => storage_path('app/public/imagem_banner'),
        public_path('logomarca-imagem') => storage_path('app/public/imagem_logomarca'),
        public_path('sobre-imagem') => storage_path('app/public/imagem_sobre'),
        public_path('parceiro-imagem') => storage_path('app/public/imagem_parceiro'),
        public_path('video-imagem') => storage_path('app/public/imagem_video'),
        public_path('depoimento-imagem') => storage_path('app/public/imagem_depoimento'),
        public_path('servico-imagem') => storage_path('app/public/imagem_servico'),
        public_path('servico-oferecido-imagem') => storage_path('app/public/imagem_servico_oferecido'),
        public_path('noticia') => storage_path('app/public/imagem_noticia'),
        public_path('sobre-principal-01') => storage_path('app/public/imagem_sobre_principal_01'),
        public_path('sobre-principal-02') => storage_path('app/public/imagem_sobre_principal_02'),
        public_path('sobre-secundario-01') => storage_path('app/public/imagem_sobre_secundario_01'),
        public_path('sobre-secundario-02') => storage_path('app/public/imagem_sobre_secundario_02'),
        public_path('sobre-secundario-video') => storage_path('app/public/video_sobre_secundario'),
        public_path('time-imagem') => storage_path('app/public/imagem_time'),
        public_path('produto-imagem') => storage_path('app/public/imagem_produto'),
        public_path('cliente-imagem') => storage_path('app/public/imagem_cliente'),
        public_path('comprovante-residencia') => storage_path('app/public/comprovante_residencia'),
        public_path('licenca-funcionamento') => storage_path('app/public/licenca_funcionamento'),
        public_path('registro') => storage_path('app/public/registro'),
        public_path('covidas-imagem') => storage_path('app/public/imagem_covidas'),
    ],

];
