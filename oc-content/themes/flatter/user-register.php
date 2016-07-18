<?php
// meta tag robots
osc_add_hook('header', 'flatter_nofollow_construct');

flatter_add_body_class('register');
osc_enqueue_script('jquery-validate');
osc_current_web_theme_path('header.php');
?>
<div class="registerbox">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="login-register register_container">

                    <br>

                    <div class="col-md-12">
                        <ul id="error_list"></ul>
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-2">
                            <span class="login-text">
                                <a href="<?php echo osc_user_login_url() ?>">Login</a> 
                            </span>
                            <span class="login-text">
                                <span class="bold">Register</span>
                            </span>
                        </div>
                    </div>
                    <form name="register" action="<?php echo osc_base_url(true); ?>" method="post" >
                        <input type="hidden" name="page" value="register" />
                        <input type="hidden" name="action" value="register_post" />
                        <div class="row vertical-row user_login_row">
                            <div class="col-md-2 padding-right-0 z-index-1">
                                <img class="user-img img-responsive img-circle" src="<?php echo osc_current_web_theme_url() . 'images/user-default.jpg'; ?>" alt="User profile picture">
                            </div>
                            <div class="col-md-5 padding-0 margin-l-m-10">
                                <div class="form-group error-margin-left error-absolute">
                                    <input type="text" name="s_firstname" class="form-control" id="s_firstname" placeholder="<?php _e('First name', 'flatter'); ?>">
                                </div>
                            </div>
                            <div class="col-md-5 padding-right-0">
                                <div class="form-group error-absolute">
                                    <input type="text" name="s_name" class="form-control" id="s_name" placeholder="<?php _e('Name', 'flatter'); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row user_login_row equal">
                            <div class="col-md-2"></div>
                            <div class="col-md-5 margin-l-m-10">
                                <div class="row background-white padding-top-13per padding-bottom-13per">
                                    <div class="col-md-12">
                                        <h2>Create a free account</h2>
                                        <span>
                                            Newsfid is a social network.<br/>
                                            You can share stories and keep in touch with followers
                                        </span>
                                    </div>
                                </div>

                                <div class="row background-white padding-top-14per padding-bottom-14per">

                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <input type="checkbox" name="terms_checkbox" id="terms_checkbox" checked class="terms_checkbox">
                                        </div>
                                    </div>

                                    <div class="col-md-9 col-sm-9">
                                        I agree to the <a class="clr" href="<?php echo osc_get_preference("terms_link", "flatter_theme"); ?>"><?php _e("terms", 'flatter'); ?></a>.
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-5">                              
                                <div class="row margin-bottom-5">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="password" name="s_password" class="form-control" id="s_password" placeholder="<?php _e('Password', 'flatter'); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row margin-bottom-5">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="password" name="s_password2" class="form-control" id="s_password2" placeholder="<?php _e('Repeat password', 'flatter'); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row margin-bottom-5">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="s_email" class="form-control" id="s_email" placeholder="<?php _e('E-mail', 'flatter'); ?>">
                                        </div>
                                    </div>
                                </div>                                
                                <div class="row margin-bottom-5">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <?php UserForm::country_select(osc_get_countries()); ?>
                                            <!--<input type="text" name="s_country" class="form-control" id="s_country" placeholder="<?php _e('Country', 'flatter'); ?>">-->
                                        </div>
                                    </div>
                                </div>
                                <div class="row margin-bottom-5">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="s_birthday" class="form-control" id="s_birthday" placeholder="<?php _e('Birthday', 'flatter'); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row margin-bottom-5">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <?php //echo UserForm::city_select(array()); ?>
                                            <?php //UserForm::location_javascript(); ?>
                                            <input type="text" name="s_city" class="form-control" id="s_city" placeholder="<?php _e('City', 'flatter'); ?>">
                                            <input type="hidden" name="cityId" class="form-control" id="cityId">
                                        </div>
                                    </div>
                                </div>
                                <div class="row margin-bottom-5">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="s_age" class="form-control" id="s_age" placeholder="<?php _e('Age', 'flatter'); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-4 col-sm-4 padding-0">
                                <button type="submit" class="btn btn-clr theme-btn"><?php _e("Create", 'flatter'); ?></button>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo responsive_recaptcha(); ?>
                            <?php osc_show_recaptcha('register'); ?>
                        </div>
                        <div class="clearfix">
                            <div class="col-md-9 col-sm-8 col-xs-8 pull-right terms">
                                <small><?php _e("By register, you agree to our", 'flatter'); ?> <a class="clr" href="<?php echo osc_get_preference("terms_link", "flatter_theme"); ?>"><?php _e("terms of use", 'flatter'); ?></a> <?php _e("and", 'flatter'); ?> <a class="clr" href="<?php echo osc_get_preference("privacy_link", "flatter_theme"); ?>"><?php _e("privacy policy", 'flatter'); ?></a>.</small>
                            </div>
                        </div>
                        <?php if (function_exists("fbc_button2")) { ?>
                            <div class="divider">
                                <hr />
                                <span><?php _e("or", 'flatter'); ?></span>
                            </div>
                            <?php fbc_button2(); ?>

                        <?php } ?>
                        <div class="panel-footer" style="font-size: 11px;"><?php _e("Already have an account?", 'flatter'); ?> <a href="<?php echo osc_user_login_url(); ?>"><strong><?php _e("Login", 'flatter'); ?></strong></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

function ex_load_scripts() {
    osc_register_script('switch', osc_current_web_theme_js_url('bootstrap-switch.min.js'), 'switch-jquery');
    osc_enqueue_script('switch');
    osc_enqueue_style('switchCss', osc_current_web_theme_url('css/bootstrap-switch.min.css'));

    osc_register_script('typeahead', osc_current_web_theme_url('js/bootstrap-typeahead.min.js'), 'typeahead');
    osc_enqueue_script('typeahead');
}

function new_footer() {
    ?>
    <script type="text/javascript" src="<?php echo osc_current_web_theme_url('js/bootstrap-typeahead.min.js'); ?>"></script>
    <script>
        $(document).ready(function () {
            $('.terms_checkbox').bootstrapSwitch({
                'size': 'mini',
                'onText': '<?php echo __('Yes', 'flatter') ?>',
                'offText': '<?php echo __('No', 'flatter') ?>'
            });

            $('#s_birthday').datepicker();
            //            $('#countryId').on('change', function () {
            //                var c_id = $(this).val();
            //                var result = '';
            //                $.ajax({
            //                    url: "<?php echo osc_current_web_theme_url('401.php'); ?>" + '?function=get_city&country_id=' + c_id,
            //                    dataType: 'json',
            //                    success: function (data, textStatus, jqXHR) {
            //                        var length = data.length;
            //                        if (length > 0) {
            //                            result += '<option selected value=""><?php echo osc_esc_js(__("Select a city...")); ?></option>';
            //                            for (key in data) {
            //                                result += '<option value="' + data[key].pk_i_id + '">' + data[key].s_name + '</option>';
            //                            }
            //
            //                            $("#city").before('<select class="form-control" name="cityId" id="cityId" ></select>');
            //                            $("#city").remove();
            //                        } else {
            //                            result += '<option value=""><?php echo osc_esc_js(__('No results')); ?></option>';
            //                            $("#cityId").before('<input type="text" class="form-control" name="city" id="city" />');
            //                            $("#cityId").remove();
            //                        }
            //                        $("#cityId").html(result);
            //
            ////                        setNormalSelectText(self);
            ////                        setNormalSelectText($("#cityId"));
            //                        $("#cityId").attr('disabled', false);
            //                    }
            //                });
            $('#s_city').typeahead({
                source: function (query, process) {
                    var $items = new Array;
                    var c_id = $('#countryId').val();
                    if (c_id) {
                        $items = [""];
                        $.ajax({
                            url: "<?php echo osc_current_web_theme_url('city_ajax.php') ?>",
                            dataType: "json",
                            type: "POST",
                            data: {city_name: query, country_id: c_id},
                            success: function (data) {
                                $.map(data, function (data) {
                                    var group;
                                    group = {
                                        id: data.pk_i_id,
                                        name: data.s_name,
                                        //                                    toString: function () {
                                        //                                        return JSON.stringify(this);
                                        //                                        //return this.app;
                                        //                                    },
                                        //                                    toLowerCase: function () {
                                        //                                        return this.name.toLowerCase();
                                        //                                    },
                                        //                                    indexOf: function (string) {
                                        //                                        return String.prototype.indexOf.apply(this.name, arguments);
                                        //                                    },
                                        //                                    replace: function (string) {
                                        //                                        var value = '';
                                        //                                        value += this.name;
                                        //                                        if (typeof (this.level) != 'undefined') {
                                        //                                            value += ' <span class="pull-right muted">';
                                        //                                            value += this.level;
                                        //                                            value += '</span>';
                                        //                                        }
                                        //                                        return String.prototype.replace.apply('<div style="padding: 10px; font-size: 1.5em;">' + value + '</div>', arguments);
                                        //                                    }
                                    };
                                    $items.push(group);
                                });

                                process($items);
                            }
                        });
                    } else {
                        alert('Please select country first');
                    }
                },
                afterSelect: function (obj) {
                    $('#cityId').val(obj.id);
                },
            });
        });
    </script>
    <?php
}

osc_add_hook('footer', 'new_footer');
osc_add_hook('init', 'ex_load_scripts');
?>

<?php RegisterValidation(); ?>
<?php osc_current_web_theme_path('footer.php'); ?>