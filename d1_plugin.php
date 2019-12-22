<?php
/*
    Plugin name: D1 Plugin
    Plugin uri: https://dinius.design/
    Descriptions: Dinius - Design & Inovação
    Version: 1.0
    Author: Dinius - Design & Inovação
    License: GPLv2 or later
*/

//TODO LIST - DESENVOLVIMENTO
/*
2 - TESTAR SCRIPT DE INSTALAÇÃO/DESINSTALAÇÃO DO PLUGIN QUE APAGA DADOS NO BD
4 - UTILIZAR BIBLIOTECA PARA LINGUAGENS E TRADUÇÃO
7 - TROCAR NOME DA CLASSE ADMIN PARA HOME OU PAGINA PRINCIPAL
10 - CRIAR FUNÇÃO DE DELETAR IMAGENS(EXISTE O BOTÃO MAS AINDA NÃO EXISTE AÇÃO)
*/

defined('ABSPATH') or die('Access Denied!');

if (!class_exists('D1Plugin')) {

    function pre($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    //Utilizar essa função apenas para modo compatibilidade com PHP menor que 7
    function dirname_safe($path, $level = 0)
    {
        $dir = explode(DIRECTORY_SEPARATOR, $path);
        $level = $level * -1;
        if ($level == 0) $level = count($dir);
        array_splice($dir, $level);
        return implode($dir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
    }

    function get_option_esc($option_name)
    {
        return esc_attr(get_option($option_name));
    }

    class D1Plugin
    {
        public $plugin;
        function __construct()
        {
            $this->plugin = plugin_basename(__FILE__);
            $this->whitelist_plugin = array(
                'd1_plugin', 'd1_plugin_conteudo', 'upload.php', 'wpseo_dashboard', 'd1_plugin_footer', 'd1_plugin_solucoes', 'd1_plugin_segmentos',
                'd1_plugin_plataforma', 'd1_plugin_jornada', 'd1_plugin_seguranca', 'd1_plugin_preco', 'd1_plugin_contato', 'themes.php', 'd1_plugin_cases', 'd1_plugin_cta', 'd1_plugin_d1_midia', 'd1_plugin_modulos', 'd1_plugin_objetivos' , 'd1_plugin_departamentos'
            );
            require_once  dirname(__FILE__) . '/includes/fields/admin_fields.php';
            require_once  dirname(__FILE__) . '/includes/fields/cases_fields.php';
            require_once  dirname(__FILE__) . '/includes/fields/footer_fields.php';
            require_once  dirname(__FILE__) . '/includes/fields/segmentos_fields.php';
            require_once  dirname(__FILE__) . '/includes/fields/plataforma_fields.php';
            require_once  dirname(__FILE__) . '/includes/fields/jornada_fields.php';
            require_once  dirname(__FILE__) . '/includes/fields/seguranca_fields.php';
            require_once  dirname(__FILE__) . '/includes/fields/preco_fields.php';
            require_once  dirname(__FILE__) . '/includes/fields/contato_fields.php';
            require_once  dirname(__FILE__) . '/includes/fields/d1_midia_fields.php';
            require_once  dirname(__FILE__) . '/includes/fields/modulos_fields.php';
            require_once  dirname(__FILE__) . '/includes/fields/objetivos_fields.php';
            require_once  dirname(__FILE__) . '/includes/fields/departamentos_fields.php';

            $this->admin_fields = new Admin_Fields();
            $this->cases_fields = new Cases_Fields();
            $this->footer_fields = new Footer_Fields();
            $this->segmentos_fields = new Segmentos_Fields();
            $this->plataforma_fields = new Plataforma_Fields();
            $this->jornada_fields = new Jornada_Fields();
            $this->seguranca_fields = new Seguranca_Fields();
            $this->preco_fields = new Preco_Fields();
            $this->contato_fields = new Contato_Fields();
            $this->d1_midia_fields = new D1_Midia_Fields();
            $this->modulos_fields = new Modulos_Fields();
            $this->objetivos_fields = new Objetivos_Fields();
            $this->departamentos_fields = new Departamentos_Fields();
        }

        function add_custom_options_page()
        {
            add_filter('whitelist_options', array($this, 'setWhitelistOptions'));
        }

        function setWhitelistOptions($whitelist_options)
        {
            $home_options_settings = $this->admin_fields->getSettings();
            $cases_options_settings = $this->cases_fields->getSettings();
            $footer_options_settings = $this->footer_fields->getSettings();
            $segmentos_options_settings = $this->segmentos_fields->getSettings();
            $plataforma_options_settings = $this->plataforma_fields->getSettings();
            $jornada_options_settings = $this->jornada_fields->getSettings();
            $seguranca_options_settings = $this->seguranca_fields->getSettings();
            $preco_options_settings = $this->preco_fields->getSettings();
            $contato_options_settings = $this->contato_fields->getSettings();
            $d1_midia_options_settings = $this->d1_midia_fields->getSettings();
            $modulos_options_settings = $this->modulos_fields->getSettings();
            $objetivos_options_settings = $this->objetivos_fields->getSettings();
            $departamentos_options_settings = $this->departamentos_fields->getSettings();
            $all_options_settings = array_merge(
                $home_options_settings,
                $cases_options_settings,
                $footer_options_settings,
                $segmentos_options_settings,
                $plataforma_options_settings,
                $jornada_options_settings,
                $seguranca_options_settings,
                $preco_options_settings,
                $contato_options_settings,
                $d1_midia_options_settings,
                $modulos_options_settings,
                $objetivos_options_settings,
                $departamentos_options_settings
            );
            foreach ($all_options_settings as $option) {
                foreach ($option as $key => $setting) {
                    $whitelist_options[$setting['option_group']][] = $setting['option_name'];
                }
            }
            return $whitelist_options;
        }

        function register()
        {
            add_action('admin_enqueue_scripts', array($this, 'admin_enqueue')); //inserindo script para tela admin
            //add_action('wp_enqueue_scripts', array($this, 'main_enqueue')); //inserindo script para tela principal
            add_action('admin_menu', array($this, 'add_admin_pages'));
            add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
            add_action('admin_menu', array($this, 'custom_menu_page_removing'));
            add_action('admin_head', array($this, 'replace_admin_menu_icons_css'));
            $this->add_custom_options_page();
        }

        public function settings_link($links)
        {
            $settings_link = '<a href="admin.php?page=d1_plugin">Configurações</a>';
            array_push($links, $settings_link);
            return $links;
        }

        public function add_admin_pages()
        {
            /* HOME PAGE */
            add_menu_page('Página Inicial', 'Página Inicial', 'manage_options', 'd1_plugin', array($this, 'admin_index'), get_template_directory_uri() . "/images/d1_logo_admin.ico", 110);

            /* CONFIGURAÇÕES GERAIS*/
            add_menu_page('Configurações Gerais', 'Configurações Gerais', 'manage_options', 'd1_plugin_config_geral', array($this, 'config_geral_index'), "", 110);

            /* PLATAFORMA */
            add_menu_page('Plataforma', 'Plataforma', 'manage_options', 'd1_plugin_plataforma', array($this, 'plataforma_admin'), "", 111);

            /* NOSSA JORNADA */
            add_menu_page('Nossa Jornada', 'Nossa Jornada', 'manage_options', 'd1_plugin_jornada', array($this, 'jornada_admin'), "", 112);

            /* SEGURANÇA */
            add_menu_page('Segurança', 'Segurança', 'manage_options', 'd1_plugin_seguranca', array($this, 'seguranca_admin'), "", 111);

            /* SOLUÇÕES */
            add_menu_page('Segmentos', 'Segmentos', 'manage_options', 'd1_plugin_segmentos', array($this, 'segmentos_index'), 'dashicons-admin-site-alt3', 113);
            //add_submenu_page('d1_plugin_solucoes', 'Segmentos', 'Segmentos', 'manage_options', 'd1_plugin_segmentos', array($this, 'segmentos_index'));

            /* CONTEÚDO */
            add_menu_page('Cases', 'Cases', 'manage_options', 'd1_plugin_cases', array($this, 'cases_admin'), 'dashicons-welcome-widgets-menus', 114);
            add_submenu_page('d1_plugin_cases', 'Categorias', 'Categorias', 'manage_options', 'd1_plugin_cases&tab=secao2', array($this, 'cases_admin'));

            /* PREÇO */
            add_menu_page('Preço', 'Preço', 'manage_options', 'd1_plugin_preco', array($this, 'preco_admin'), 'dashicons-cart', 115);

            /* CONTATO */
            add_menu_page('Contato', 'Contato', 'manage_options', 'd1_plugin_contato', array($this, 'contato_admin'), '', 115);

            /* HEADER MENU, FOOTER, CTA */
            //add_menu_page('Header Menu', 'Header Menu', 'manage_options', 'd1_plugin_header_menu', '', '', 118);
            add_menu_page('Footer', 'Footer', 'manage_options', 'd1_plugin_footer', array($this, 'footer_admin'), '', 119);
            add_menu_page('Call To Action', 'Call To Action', 'manage_options', 'd1_plugin_cta', array($this, 'cta_admin'), '', 120);

            /* D1 NA MÍDIA */
            add_menu_page('D1 na Mídia', 'D1 na Mídia', 'manage_options', 'd1_plugin_d1_midia', array($this, 'd1_midia_admin'), '', 118);

            /* MODULOS */
            add_menu_page('Módulos', 'Módulos', 'manage_options', 'd1_plugin_modulos', array($this, 'modulos_index'), '', 113);

            /* OBJETIVOS DE NEGÓCIOS */
            add_menu_page('Objetivos de Négocio', 'Objetivos de Négocio', 'manage_options', 'd1_plugin_objetivos', array($this, 'objetivos_index'), '', 113);

            /* DEPARTAMENTOS */
            add_menu_page('Departamentos', 'Departamentos', 'manage_options', 'd1_plugin_departamentos', array($this, 'departamentos_index'), '', 113);
        }

        public function admin_index()
        {
            require_once plugin_dir_path(__FILE__) . 'includes/pages/admin.php';
            $adm = new Admin();
            $adm->register();
            require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
        }

        public function config_geral_index()
        {
            require_once plugin_dir_path(__FILE__) . 'includes/pages/config_geral.php';
            $adm = new Admin();
            $adm->register();
            require_once plugin_dir_path(__FILE__) . 'templates/config_geral.php';
        }

        public function plataforma_admin()
        {
            require_once plugin_dir_path(__FILE__) . 'includes/pages/plataforma.php';
            $plat = new Plataforma();
            $plat->register();
            require_once plugin_dir_path(__FILE__) . 'templates/plataforma.php';
        }

        public function cases_admin()
        {
            require_once plugin_dir_path(__FILE__) . 'includes/pages/cases.php';
            $cases = new Cases();
            $cases->register();
            require_once plugin_dir_path(__FILE__) . 'templates/cases.php';
        }

        public function footer_admin()
        {
            require_once plugin_dir_path(__FILE__) . 'includes/pages/footer.php';
            $footer = new Footer();
            $footer->register();
            require_once plugin_dir_path(__FILE__) . 'templates/footer.php';
        }

        public function segmentos_index()
        {
            require_once plugin_dir_path(__FILE__) . 'includes/pages/segmentos.php';
            $segmentos = new Segmentos();
            $segmentos->register();
            require_once plugin_dir_path(__FILE__) . 'templates/segmentos.php';
        }

        public function jornada_admin()
        {
            require_once plugin_dir_path(__FILE__) . 'includes/pages/jornada.php';
            $jornada = new Jornada();
            $jornada->register();
            require_once plugin_dir_path(__FILE__) . 'templates/jornada.php';
        }

        public function seguranca_admin()
        {
            require_once plugin_dir_path(__FILE__) . 'includes/pages/seguranca.php';
            $seguranca = new Seguranca();
            $seguranca->register();
            require_once plugin_dir_path(__FILE__) . 'templates/seguranca.php';
        }

        public function preco_admin()
        {
            require_once plugin_dir_path(__FILE__) . 'includes/pages/preco.php';
            $preco = new Preco();
            $preco->register();
            require_once plugin_dir_path(__FILE__) . 'templates/preco.php';
        }

        public function contato_admin()
        {
            require_once plugin_dir_path(__FILE__) . 'includes/pages/contato.php';
            $contato = new Contato();
            $contato->register();
            require_once plugin_dir_path(__FILE__) . 'templates/contato.php';
        }

        public function cta_admin()
        {
            require_once plugin_dir_path(__FILE__) . 'includes/pages/cta.php';
            $cta = new Cta();
            $cta->register();
            require_once plugin_dir_path(__FILE__) . 'templates/cta.php';
        }

        public function d1_midia_admin()
        {
            require_once plugin_dir_path(__FILE__) . 'includes/pages/d1_midia.php';
            $midia = new D1_Midia();
            $midia->register();
            require_once plugin_dir_path(__FILE__) . 'templates/d1_midia.php';
        }

        public function modulos_index()
        {
            require_once plugin_dir_path(__FILE__) . 'includes/pages/modulos.php';
            $modulos = new Modulos();
            $modulos->register();
            require_once plugin_dir_path(__FILE__) . 'templates/modulos.php';
        }

        public function objetivos_index()
        {
            require_once plugin_dir_path(__FILE__) . 'includes/pages/objetivos.php';
            $objetivos = new Objetivos();
            $objetivos->register();
            require_once plugin_dir_path(__FILE__) . 'templates/objetivos.php';
        }

        public function departamentos_index()
        {
            require_once plugin_dir_path(__FILE__) . 'includes/pages/departamentos.php';
            $departamentos = new Departamentos();
            $departamentos->register();
            require_once plugin_dir_path(__FILE__) . 'templates/departamentos.php';
        }


        function activate()
        {
            require_once plugin_dir_path(__FILE__) . 'includes/base/d1_plugin_activate.php';
            D1PluginActivate::activate();
        }

        function admin_enqueue()
        {
            // enqueue all our scripts
            wp_register_script('d1_upload', plugins_url('resources/d1_upload.js', __FILE__), array('jquery', 'media-upload', 'thickbox'));
            wp_register_script('d1_admin', plugins_url('resources/d1_admin.js', __FILE__), array('jquery'));
            wp_enqueue_script('jquery');
            wp_enqueue_script('thickbox');
            wp_enqueue_style('thickbox');
            wp_enqueue_script('media-upload');
            wp_enqueue_script('d1_upload');
            wp_enqueue_script('d1_admin');
        }

        function custom_menu_page_removing()
        {
            global $submenu, $menu;
            $menu_item = array_values($menu);
            $post_types = get_post_types();
            foreach ($menu_item as $key => $m) {
                if (!empty($m[2]) && !in_array($m[2], $this->whitelist_plugin)) {
                    //remove_menu_page($m[2]);
                }
            }
        }

        function replace_admin_menu_icons_css()
        {
            ?><style>
                #adminmenu .wp-menu-image img {
                    padding: 0 !important;
                }

                .wp-core-ui p .button {
                    vertical-align: baseline;
                    float: right;
                }
            </style><?php
                            }
                        }
                        //Inicialização do plugin
                        $d1 = new D1Plugin();
                        $d1->register();

                        //activation
                        register_activation_hook(__FILE__, array($d1, 'activate'));

                        //deactivation
                        require_once plugin_dir_path(__FILE__) . 'includes/base/d1_plugin_deactivate.php';
                        register_deactivation_hook(__FILE__, array('D1PluginDeactivate', 'deactivate'));
                        //Remove a notificação de atualização
                        add_action('admin_head', 'hide_update_notice_to_all', 1);
                        function hide_update_notice_to_all()
                        {
                            remove_action('admin_notices', 'update_nag', 3);
                        }

                        add_action('admin_bar_menu', 'remove_wp_logo', 999);
                        function remove_wp_logo($wp_admin_bar)
                        {
                            $wp_admin_bar->remove_node('updates'); //update informação
                        }

                        function alterar_admin_bar($admin_bar)
                        {

                            // Remove o logotipo
                            //$admin_bar->remove_menu('wp-logo');

                            // Remove o menu suspenso de adição de novo conteúdo
                            $admin_bar->remove_node('new-content');

                            // Remove o link para editar a página atual
                            $admin_bar->remove_menu('edit');

                            // Remove o notificador de atualizações
                            $admin_bar->remove_menu('updates');

                            // Remove o menu de pesquisa
                            $admin_bar->remove_menu('search');

                            // Remove o balão de comentários
                            $admin_bar->remove_menu('comments');

                            // Remove o menu suspenso com o nome do site
                            $admin_bar->remove_node('site-name');

                            // Remove o menu suspenso da conta do usuário
                            //$admin_bar->remove_node('my-account');

                            global $current_user;
                            wp_get_current_user();
                            $redirect = site_url();

                            $admin_bar->add_node(
                                array(
                                    'id'    => 'description',
                                    'title' => ('Painel de Controle - D1'),
                                    'href'     => site_url()
                                )
                            );

                            return $admin_bar;
                        }
                        add_action('admin_bar_menu', 'alterar_admin_bar', 99);

                        // Customizar o Footer do WordPress
                        function remove_footer_admin()
                        {
                            echo '© Desenvolvido por <a href="https://dinius.design/">Dinius</a> - Design & Inovação';
                        }
                        add_filter('admin_footer_text', 'remove_footer_admin');

                        // Adicionar Tema ao Wordpress
                        add_action('admin_enqueue_scripts', 'load_admin_style');
                        
                        //adicionando query variaveis para rescrever url de forma amigavel
                        add_filter('query_vars','d1_rewrite_add_var' );
                        function d1_rewrite_add_var($vars){
                            $vars[] = 'slug';
                            $vars[] = 'id';
                            return $vars;
                        }

                        function load_admin_style()
                        {
                            wp_register_style('admin_css', '/wp-content/plugins/d1_plugin/resources/css/theme.css', false, '1.0.0');
                            //OR
                            wp_enqueue_style('admin_css', '/wp-content/plugins/d1_plugin/resources/css/theme.css', false, '1.0.0');
                        }

                    }
