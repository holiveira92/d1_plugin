<?php
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Fontfaces CSS-->
    <link href="<?php echo plugins_url('d1_plugin/resources/css/font-face.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/font-awesome-4.7/css/font-awesome.min.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/font-awesome-5/css/fontawesome-all.min.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/mdi-font/css/material-design-iconic-font.min.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/bootstrap-4.1/bootstrap.min.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/animsition/animsition.min.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/wow/animate.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/css-hamburgers/hamburgers.min.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/slick/slick.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/select2/select2.min.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/perfect-scrollbar/perfect-scrollbar.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="<?php echo plugins_url('d1_plugin/resources/css/theme.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col form-style-5">

                <!-- Seção 1 - Configs Gerais -->

                <fieldset>
                    <legend><span class="number">1</span>Título da Seção</legend>
                    <label for="secao6_title">Nome:</label> <input type="text" name="secao6_title" value="<?php echo get_option_esc('secao6_title') ?>" placeholder="Titulo">
                </fieldset>
            </div>
        </div>

        <!-------------------------------------------------------------------------- Seção 2 - Inicio Modulo 1 --------------------------------------------------------------------->
        <div class="row">
            <div class="col form-style-5">
                <legend><span class="number">2</span><a class="" data-toggle="collapse" href="#modulo-1" role="button" aria-expanded="true" aria-controls="collapseExample">Módulo 1</a></legend>
            </div>
        </div>
        <div class="row">
            <div class="col form-style-5">
                <div class="collapse multi-collapse show" id="modulo-1">
                    <div class="row">
                        <div class="col form-style-5">
                            <label for="secao6_modulo1_nome">Nome do Módulo:</label> <input type="text" name="secao6_modulo1_nome" value="<?php echo get_option_esc('secao6_modulo1_nome') ?>" placeholder="Nome do Módulo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-style-5">
                            <!-- Seção 2 - Modulo 1 - Subitem 1 -->
                            <fieldset>
                                <legend><span class="number">1</span>Subitem 1</legend>
                                <label for="secao6_modulo1_subitem1">Nome do SubItem 1:</label> <input type="text" name="secao6_modulo1_subitem1" value="<?php echo get_option_esc('secao6_modulo1_subitem1') ?>" placeholder="Nome do SubItem 1:">
                                <label for="secao6_modulo1_subitem1_descricao">Descrição SubItem 1:</label> <textarea name="secao6_modulo1_subitem1_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo1_subitem1_descricao') ?></textarea>
                                <label for="secao6_modulo1_subitem1_link">Link Leia Mais SubItem 1:</label> <input type="text" name="secao6_modulo1_subitem1_link" value="<?php echo get_option_esc('secao6_modulo1_subitem1_link') ?>" placeholder="Link Leia Mais SubItem 1">
                                <label for="secao6_modulo1_subitem1_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo1_subitem1_image'); ?>
                            </fieldset>
                        </div>
                        <div class="col form-style-5">
                            <!-- Seção 2 - Modulo 1 - Subitem 2 -->
                            <fieldset>
                                <legend><span class="number">2</span>Subitem 2</legend>
                                <label for="secao6_modulo1_subitem2">Nome do SubItem 2:</label> <input type="text" name="secao6_modulo1_subitem2" value="<?php echo get_option_esc('secao6_modulo1_subitem2') ?>" placeholder="Nome do SubItem 2:">
                                <label for="secao6_modulo1_subitem2_descricao">Descrição SubItem 2:</label> <textarea name="secao6_modulo1_subitem2_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo1_subitem2_descricao') ?></textarea>
                                <label for="secao6_modulo1_subitem2_link">Link Leia Mais SubItem 2:</label> <input type="text" name="secao6_modulo1_subitem2_link" value="<?php echo get_option_esc('secao6_modulo1_subitem2_link') ?>" placeholder="Link Leia Mais SubItem 2">
                                <label for="secao6_modulo1_subitem2_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo1_subitem2_image'); ?>
                            </fieldset>
                        </div>
                        <div class="col form-style-5">
                            <!-- Seção 2 - Modulo 1 - Subitem 3 -->
                            <fieldset>
                                <legend><span class="number">3</span>Subitem 3</legend>
                                <label for="secao6_modulo1_subitem3">Nome do SubItem 3:</label> <input type="text" name="secao6_modulo1_subitem3" value="<?php echo get_option_esc('secao6_modulo1_subitem3') ?>" placeholder="Nome do SubItem 3:">
                                <label for="secao6_modulo1_subitem3_descricao">Descrição SubItem 3:</label> <textarea name="secao6_modulo1_subitem3_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo1_subitem3_descricao') ?></textarea>
                                <label for="secao6_modulo1_subitem3_link">Link Leia Mais SubItem 3:</label> <input type="text" name="secao6_modulo1_subitem3_link" value="<?php echo get_option_esc('secao6_modulo1_subitem3_link') ?>" placeholder="Link Leia Mais SubItem 3">
                                <label for="secao6_modulo1_subitem3_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo1_subitem3_image'); ?>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!---------------------------------------------------------------------- Seção 2 - Fim Modulo 1 ----------------------------------------------------------------------------------->

        <!----------------------------------------------------------------------- Seção 2 - Inicio Modulo 2 ----------------------------------------------------------------------------->
        <div class="row">
            <div class="col form-style-5">
                <legend><span class="number">3</span><a class="" data-toggle="collapse" href="#modulo-2" role="button" aria-expanded="true" aria-controls="modulo-2">Módulo 2</a></legend>
            </div>
        </div>
        <div class="row">
            <div class="col form-style-5">
                <div class="collapse multi-collapse show" id="modulo-2">
                    <div class="row">
                        <div class="col form-style-5">
                            <label for="secao6_modulo2_nome">Nome do Módulo:</label> <input type="text" name="secao6_modulo2_nome" value="<?php echo get_option_esc('secao6_modulo2_nome') ?>" placeholder="Nome do Módulo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-style-5">
                            <!-- Seção 2 - Modulo 2 - Subitem 1 -->
                            <fieldset>
                                <legend><span class="number">1</span>Subitem 1</legend>
                                <label for="secao6_modulo2_subitem1">Nome do SubItem 1:</label> <input type="text" name="secao6_modulo2_subitem1" value="<?php echo get_option_esc('secao6_modulo2_subitem1') ?>" placeholder="Nome do SubItem 1:">
                                <label for="secao6_modulo2_subitem1_descricao">Descrição SubItem 1:</label> <textarea name="secao6_modulo2_subitem1_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo2_subitem1_descricao') ?></textarea>
                                <label for="secao6_modulo2_subitem1_link">Link Leia Mais SubItem 1:</label> <input type="text" name="secao6_modulo2_subitem1_link" value="<?php echo get_option_esc('secao6_modulo2_subitem1_link') ?>" placeholder="Link Leia Mais SubItem 1">
                                <label for="secao6_modulo2_subitem1_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo2_subitem1_image'); ?>
                            </fieldset>
                        </div>
                        <div class="col form-style-5">
                            <!-- Seção 2 - Modulo 2 - Subitem 2 -->
                            <fieldset>
                                <legend><span class="number">2</span>Subitem 2</legend>
                                <label for="secao6_modulo2_subitem2">Nome do SubItem 2:</label> <input type="text" name="secao6_modulo2_subitem2" value="<?php echo get_option_esc('secao6_modulo2_subitem2') ?>" placeholder="Nome do SubItem 2:">
                                <label for="secao6_modulo2_subitem2_descricao">Descrição SubItem 2:</label> <textarea name="secao6_modulo2_subitem2_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo2_subitem2_descricao') ?></textarea>
                                <label for="secao6_modulo2_subitem2_link">Link Leia Mais SubItem 2:</label> <input type="text" name="secao6_modulo2_subitem2_link" value="<?php echo get_option_esc('secao6_modulo2_subitem2_link') ?>" placeholder="Link Leia Mais SubItem 2">
                                <label for="secao6_modulo2_subitem2_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo2_subitem2_image'); ?>
                            </fieldset>
                        </div>
                        <div class="col form-style-5">
                            <!-- Seção 2 - Modulo 2 - Subitem 3 -->
                            <fieldset>
                                <legend><span class="number">3</span>Subitem 3</legend>
                                <label for="secao6_modulo2_subitem3">Nome do SubItem 3:</label> <input type="text" name="secao6_modulo2_subitem3" value="<?php echo get_option_esc('secao6_modulo2_subitem3') ?>" placeholder="Nome do SubItem 3:">
                                <label for="secao6_modulo2_subitem3_descricao">Descrição SubItem 3:</label> <textarea name="secao6_modulo2_subitem3_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo2_subitem3_descricao') ?></textarea>
                                <label for="secao6_modulo2_subitem3_link">Link Leia Mais SubItem 3:</label> <input type="text" name="secao6_modulo2_subitem3_link" value="<?php echo get_option_esc('secao6_modulo2_subitem3_link') ?>" placeholder="Link Leia Mais SubItem 3">
                                <label for="secao6_modulo2_subitem3_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo2_subitem3_image'); ?>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-------------------------------------------------------------------------- Seção 2 - Fim Modulo 2 ------------------------------------------------------------------------------->

        <!----------------------------------------------------------------------- Seção 2 - Inicio Modulo 3 ----------------------------------------------------------------------------->
        <div class="row">
            <div class="col form-style-5">
                <legend><span class="number">4</span><a class="" data-toggle="collapse" href="#modulo-3" role="button" aria-expanded="true" aria-controls="modulo-3">Módulo 3</a></legend>
            </div>
        </div>
        <div class="row">
            <div class="col form-style-5">
                <div class="collapse multi-collapse show" id="modulo-3">
                    <div class="row">
                        <div class="col form-style-5">
                            <label for="secao6_modulo3_nome">Nome do Módulo:</label> <input type="text" name="secao6_modulo3_nome" value="<?php echo get_option_esc('secao6_modulo3_nome') ?>" placeholder="Nome do Módulo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-style-5">
                            <!-- Seção 2 - Modulo 3 - Subitem 1 -->
                            <fieldset>
                                <legend><span class="number">1</span>Subitem 1</legend>
                                <label for="secao6_modulo3_subitem1">Nome do SubItem 1:</label> <input type="text" name="secao6_modulo3_subitem1" value="<?php echo get_option_esc('secao6_modulo3_subitem1') ?>" placeholder="Nome do SubItem 1:">
                                <label for="secao6_modulo3_subitem1_descricao">Descrição SubItem 1:</label> <textarea name="secao6_modulo3_subitem1_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo3_subitem1_descricao') ?></textarea>
                                <label for="secao6_modulo3_subitem1_link">Link Leia Mais SubItem 1:</label> <input type="text" name="secao6_modulo3_subitem1_link" value="<?php echo get_option_esc('secao6_modulo3_subitem1_link') ?>" placeholder="Link Leia Mais SubItem 1">
                                <label for="secao6_modulo3_subitem1_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo3_subitem1_image'); ?>
                            </fieldset>
                        </div>
                        <div class="col form-style-5">
                            <!-- Seção 2 - Modulo 3 - Subitem 2 -->
                            <fieldset>
                                <legend><span class="number">2</span>Subitem 2</legend>
                                <label for="secao6_modulo3_subitem2">Nome do SubItem 2:</label> <input type="text" name="secao6_modulo3_subitem2" value="<?php echo get_option_esc('secao6_modulo3_subitem2') ?>" placeholder="Nome do SubItem 2:">
                                <label for="secao6_modulo3_subitem2_descricao">Descrição SubItem 2:</label> <textarea name="secao6_modulo3_subitem2_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo3_subitem2_descricao') ?></textarea>
                                <label for="secao6_modulo3_subitem2_link">Link Leia Mais SubItem 2:</label> <input type="text" name="secao6_modulo3_subitem2_link" value="<?php echo get_option_esc('secao6_modulo3_subitem2_link') ?>" placeholder="Link Leia Mais SubItem 2">
                                <label for="secao6_modulo3_subitem2_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo3_subitem2_image'); ?>
                            </fieldset>
                        </div>
                        <div class="col form-style-5">
                            <!-- Seção 2 - Modulo 3 - Subitem 3 -->
                            <fieldset>
                                <legend><span class="number">3</span>Subitem 3</legend>
                                <label for="secao6_modulo3_subitem3">Nome do SubItem 3:</label> <input type="text" name="secao6_modulo3_subitem3" value="<?php echo get_option_esc('secao6_modulo3_subitem3') ?>" placeholder="Nome do SubItem 3:">
                                <label for="secao6_modulo3_subitem3_descricao">Descrição SubItem 3:</label> <textarea name="secao6_modulo3_subitem3_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo3_subitem3_descricao') ?></textarea>
                                <label for="secao6_modulo3_subitem3_link">Link Leia Mais SubItem 3:</label> <input type="text" name="secao6_modulo3_subitem3_link" value="<?php echo get_option_esc('secao6_modulo3_subitem3_link') ?>" placeholder="Link Leia Mais SubItem 3">
                                <label for="secao6_modulo3_subitem3_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo3_subitem3_image'); ?>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-------------------------------------------------------------------------- Seção 2 - Fim Modulo 3 ------------------------------------------------------------------------------->

        <!----------------------------------------------------------------------- Seção 2 - Inicio Modulo 4 ----------------------------------------------------------------------------->
        <div class="row">
            <div class="col form-style-5">
                <legend><span class="number">5</span><a class="" data-toggle="collapse" href="#modulo-4" role="button" aria-expanded="true" aria-controls="modulo-4">Módulo 4</a></legend>
            </div>
        </div>
        <div class="row">
            <div class="col form-style-5">
                <div class="collapse multi-collapse show" id="modulo-4">
                    <div class="row">
                        <div class="col form-style-5">
                            <label for="secao6_modulo4_nome">Nome do Módulo:</label> <input type="text" name="secao6_modulo4_nome" value="<?php echo get_option_esc('secao6_modulo4_nome') ?>" placeholder="Nome do Módulo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-style-5">
                            <!-- Seção 2 - Modulo 4 - Subitem 1 -->
                            <fieldset>
                                <legend><span class="number">1</span>Subitem 1</legend>
                                <label for="secao6_modulo4_subitem1">Nome do SubItem 1:</label> <input type="text" name="secao6_modulo4_subitem1" value="<?php echo get_option_esc('secao6_modulo4_subitem1') ?>" placeholder="Nome do SubItem 1:">
                                <label for="secao6_modulo4_subitem1_descricao">Descrição SubItem 1:</label> <textarea name="secao6_modulo4_subitem1_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo4_subitem1_descricao') ?></textarea>
                                <label for="secao6_modulo4_subitem1_link">Link Leia Mais SubItem 1:</label> <input type="text" name="secao6_modulo4_subitem1_link" value="<?php echo get_option_esc('secao6_modulo4_subitem1_link') ?>" placeholder="Link Leia Mais SubItem 1">
                                <label for="secao6_modulo4_subitem1_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo4_subitem1_image'); ?>
                            </fieldset>
                        </div>
                        <div class="col form-style-5">
                            <!-- Seção 2 - Modulo 4 - Subitem 2 -->
                            <fieldset>
                                <legend><span class="number">2</span>Subitem 2</legend>
                                <label for="secao6_modulo4_subitem2">Nome do SubItem 2:</label> <input type="text" name="secao6_modulo4_subitem2" value="<?php echo get_option_esc('secao6_modulo4_subitem2') ?>" placeholder="Nome do SubItem 2:">
                                <label for="secao6_modulo4_subitem2_descricao">Descrição SubItem 2:</label> <textarea name="secao6_modulo4_subitem2_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo4_subitem2_descricao') ?></textarea>
                                <label for="secao6_modulo4_subitem2_link">Link Leia Mais SubItem 2:</label> <input type="text" name="secao6_modulo4_subitem2_link" value="<?php echo get_option_esc('secao6_modulo4_subitem2_link') ?>" placeholder="Link Leia Mais SubItem 2">
                                <label for="secao6_modulo4_subitem2_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo4_subitem2_image'); ?>
                            </fieldset>
                        </div>
                        <div class="col form-style-5">
                            <!-- Seção 2 - Modulo 4 - Subitem 3 -->
                            <fieldset>
                                <legend><span class="number">3</span>Subitem 3</legend>
                                <label for="secao6_modulo4_subitem3">Nome do SubItem 3:</label> <input type="text" name="secao6_modulo4_subitem3" value="<?php echo get_option_esc('secao6_modulo4_subitem3') ?>" placeholder="Nome do SubItem 3:">
                                <label for="secao6_modulo4_subitem3_descricao">Descrição SubItem 3:</label> <textarea name="secao6_modulo4_subitem3_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo4_subitem3_descricao') ?></textarea>
                                <label for="secao6_modulo4_subitem3_link">Link Leia Mais SubItem 3:</label> <input type="text" name="secao6_modulo4_subitem3_link" value="<?php echo get_option_esc('secao6_modulo4_subitem3_link') ?>" placeholder="Link Leia Mais SubItem 3">
                                <label for="secao6_modulo4_subitem3_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo4_subitem3_image'); ?>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-------------------------------------------------------------------------- Seção 2 - Fim Modulo 4 ------------------------------------------------------------------------------->

        <!----------------------------------------------------------------------- Seção 2 - Inicio Modulo 5 ----------------------------------------------------------------------------->
        <div class="row">
            <div class="col form-style-5">
                <legend><span class="number">6</span><a class="" data-toggle="collapse" href="#modulo-5" role="button" aria-expanded="true" aria-controls="modulo-5">Módulo 5</a></legend>
            </div>
        </div>
        <div class="row">
            <div class="col form-style-5">
                <div class="collapse multi-collapse show" id="modulo-5">
                    <div class="row">
                        <div class="col form-style-5">
                            <label for="secao6_modulo5_nome">Nome do Módulo:</label> <input type="text" name="secao6_modulo5_nome" value="<?php echo get_option_esc('secao6_modulo5_nome') ?>" placeholder="Nome do Módulo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-style-5">
                            <!-- Seção 2 - Modulo 5 - Subitem 1 -->
                            <fieldset>
                                <legend><span class="number">1</span>Subitem 1</legend>
                                <label for="secao6_modulo5_subitem1">Nome do SubItem 1:</label> <input type="text" name="secao6_modulo5_subitem1" value="<?php echo get_option_esc('secao6_modulo5_subitem1') ?>" placeholder="Nome do SubItem 1:">
                                <label for="secao6_modulo5_subitem1_descricao">Descrição SubItem 1:</label> <textarea name="secao6_modulo5_subitem1_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo5_subitem1_descricao') ?></textarea>
                                <label for="secao6_modulo5_subitem1_link">Link Leia Mais SubItem 1:</label> <input type="text" name="secao6_modulo5_subitem1_link" value="<?php echo get_option_esc('secao6_modulo5_subitem1_link') ?>" placeholder="Link Leia Mais SubItem 1">
                                <label for="secao6_modulo5_subitem1_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo5_subitem1_image'); ?>
                            </fieldset>
                        </div>
                        <div class="col form-style-5">
                            <!-- Seção 2 - Modulo 5 - Subitem 2 -->
                            <fieldset>
                                <legend><span class="number">2</span>Subitem 2</legend>
                                <label for="secao6_modulo5_subitem2">Nome do SubItem 2:</label> <input type="text" name="secao6_modulo5_subitem2" value="<?php echo get_option_esc('secao6_modulo5_subitem2') ?>" placeholder="Nome do SubItem 2:">
                                <label for="secao6_modulo5_subitem2_descricao">Descrição SubItem 2:</label> <textarea name="secao6_modulo5_subitem2_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo5_subitem2_descricao') ?></textarea>
                                <label for="secao6_modulo5_subitem2_link">Link Leia Mais SubItem 2:</label> <input type="text" name="secao6_modulo5_subitem2_link" value="<?php echo get_option_esc('secao6_modulo5_subitem2_link') ?>" placeholder="Link Leia Mais SubItem 2">
                                <label for="secao6_modulo5_subitem2_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo5_subitem2_image'); ?>
                            </fieldset>
                        </div>
                        <div class="col form-style-5">
                            <!-- Seção 2 - Modulo 5 - Subitem 3 -->
                            <fieldset>
                                <legend><span class="number">3</span>Subitem 3</legend>
                                <label for="secao6_modulo5_subitem3">Nome do SubItem 3:</label> <input type="text" name="secao6_modulo5_subitem3" value="<?php echo get_option_esc('secao6_modulo5_subitem3') ?>" placeholder="Nome do SubItem 3:">
                                <label for="secao6_modulo5_subitem3_descricao">Descrição SubItem 3:</label> <textarea name="secao6_modulo5_subitem3_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo5_subitem3_descricao') ?></textarea>
                                <label for="secao6_modulo5_subitem3_link">Link Leia Mais SubItem 3:</label> <input type="text" name="secao6_modulo5_subitem3_link" value="<?php echo get_option_esc('secao6_modulo5_subitem3_link') ?>" placeholder="Link Leia Mais SubItem 3">
                                <label for="secao6_modulo5_subitem3_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo5_subitem3_image'); ?>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-------------------------------------------------------------------------- Seção 2 - Fim Modulo 5 ------------------------------------------------------------------------------->


    </div>
    <!-- Jquery JS-->
    <script src="<?php echo plugins_url('d1_plugin/resources/vendor/jquery-3.2.1.min.js', 'd1_plugin'); ?>"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo plugins_url('d1_plugin/resources/vendor/bootstrap-4.1/popper.min.js', 'd1_plugin'); ?>"></script>
    <script src="<?php echo plugins_url('d1_plugin/resources/vendor/bootstrap-4.1/bootstrap.min.js', 'd1_plugin'); ?>"></script>
</body>

</html>