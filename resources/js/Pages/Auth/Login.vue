<script setup>
import {onMounted} from "vue";
import {useForm} from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

// <!-- BEGIN: Page CSS-->

$.map(
    [
        "tpl_0/app-assets/css/core/menu/menu-types/vertical-menu.css",
        "tpl_0/app-assets/css/plugins/forms/form-validation.css",
        "tpl_0/app-assets/css/pages/authentication.css",
    ],
    function (url) {
        return $.get(url, function (css) {
            $("<style>" + css + "</style>").appendTo("head");
        });
    }
);

onMounted(() => {
    //  <!-- BEGIN: Page Vendor JS-->
    $.getScript(
        "tpl_0/app-assets/vendors/js/forms/validation/jquery.validate.min.js",
        function (data, textStatus, jqxhr) {
            //   <!-- BEGIN: Theme JS-->
            $.getScript(
                "tpl_0/app-assets/js/core/app-menu.js",
                function (data, textStatus, jqxhr) {
                    $.getScript(
                        "tpl_0/app-assets/js/core/app.js",
                        function (data, textStatus, jqxhr) {
                            // <!-- BEGIN: Page JS-->
                            $.getScript(
                                "tpl_0/app-assets/js/scripts/pages/auth-login.js",
                                function (data, textStatus, jqxhr) {
                                }
                            );
                        }
                    );
                }
            );
        }
    );

    if (feather) {
        feather.replace({
            width: 14,
            height: 14,
        });
    }
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.transform((data) => ({
        ...data,
        remember: form.remember ? "on" : "",
    })).post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <div class="blank-page">
        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-header row"></div>
                <div class="content-body">
                    <div class="auth-wrapper auth-cover">
                        <div class="auth-inner row m-0">
                            <!-- Brand logo-->
                            <a class="brand-logo" href="index.html">
                                <svg
                                    height="28"
                                    version="1.1"
                                    viewBox="0 0 139 95"
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                >
                                    <defs>
                                        <lineargradient
                                            id="linearGradient-1"
                                            x1="100%"
                                            x2="50%"
                                            y1="10.5120544%"
                                            y2="89.4879456%"
                                        >
                                            <stop offset="0%" stop-color="#000000"/>
                                            <stop offset="100%" stop-color="#FFFFFF"/>
                                        </lineargradient>
                                        <lineargradient
                                            id="linearGradient-2"
                                            x1="64.0437835%"
                                            x2="37.373316%"
                                            y1="46.3276743%"
                                            y2="100%"
                                        >
                                            <stop offset="0%" stop-color="#EEEEEE" stop-opacity="0"/>
                                            <stop offset="100%" stop-color="#FFFFFF"/>
                                        </lineargradient>
                                    </defs>
                                    <g id="Page-1" fill="none" fill-rule="evenodd" stroke="none" stroke-width="1">
                                        <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                            <g id="Group" transform="translate(400.000000, 178.000000)">
                                                <path
                                                    id="Path"
                                                    class="text-primary"
                                                    d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                                    style="fill: currentColor"
                                                />
                                                <path
                                                    id="Path1"
                                                    d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                                    fill="url(#linearGradient-1)"
                                                    opacity="0.2"
                                                />
                                                <polygon
                                                    id="Path-2"
                                                    fill="#000000"
                                                    opacity="0.049999997"
                                                    points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"
                                                />
                                                <polygon
                                                    id="Path-21"
                                                    fill="#000000"
                                                    opacity="0.099999994"
                                                    points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"
                                                />
                                                <polygon
                                                    id="Path-3"
                                                    fill="url(#linearGradient-2)"
                                                    opacity="0.099999994"
                                                    points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"
                                                />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <h2 class="brand-text text-primary ms-1">Vuexy</h2>
                            </a>
                            <!-- /Brand logo-->
                            <!-- Left Text-->
                            <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                                    <img
                                        alt="Login V2"
                                        class="img-fluid"
                                        src="tpl_0/app-assets/images/pages/login-v2.svg"
                                    />
                                </div>
                            </div>
                            <!-- /Left Text-->
                            <!-- Login-->
                            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                    <h2 class="card-title fw-bold mb-1">Welcome to Vuexy! 👋</h2>
                                    <p class="card-text mb-2">
                                        Please sign-in to your account and start
                                        the adventure
                                    </p>

                                    <form class="auth-login-form mt-2" @submit.prevent="submit">
                                        <div class="mb-1">
                                            <label class="form-label" for="login-email">Email</label>
                                            <input
                                                id="login-email"
                                                v-model="form.email"
                                                aria-describedby="login-email"
                                                autofocus
                                                class="form-control"
                                                name="login-email"
                                                placeholder="john@example.com"
                                                tabindex="1"
                                                type="text"
                                            />
                                            <InputError :message="form.errors.email" class="mt-2"/>
                                        </div>
                                        <div class="mb-1">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-label" for="login-password">Password</label>
                                                <a href="auth-forgot-password-cover.html">
                                                    <small>Forgot Password?</small>
                                                </a>
                                            </div>
                                            <div class="input-group input-group-merge form-password-toggle">
                                                <input
                                                    id="login-password"
                                                    v-model="form.password"
                                                    aria-describedby="login-password"
                                                    class="form-control form-control-merge"
                                                    name="login-password"
                                                    placeholder="············"
                                                    tabindex="2"
                                                    type="password"
                                                />
                                                <span class="input-group-text cursor-pointer">
                          <i data-feather="eye"></i>
                        </span>
                                                <InputError :message="form.errors.password" class="mt-2"/>
                                            </div>
                                        </div>
                                        <div class="mb-1">
                                            <div class="form-check">
                                                <input
                                                    id="remember-me"
                                                    v-model="form.remember"
                                                    class="form-check-input"
                                                    tabindex="3"
                                                    type="checkbox"
                                                />
                                                <label class="form-check-label" for="remember-me">Remember Me</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary w-100" tabindex="4">Sign in</button>
                                    </form>
                                    <p class="text-center mt-2">
                                        <span>New on our platform?</span>

                                        <a :href="route('register')">
                                            <span>&nbsp;Create an account</span>
                                        </a>
                                    </p>
                                    <div class="divider my-2">
                                        <div class="divider-text">or</div>
                                    </div>
                                    <div class="auth-footer-btn d-flex justify-content-center">
                                        <a class="btn btn-facebook" href="#">
                                            <i data-feather="facebook"></i>
                                        </a>
                                        <a class="btn btn-twitter white" href="#">
                                            <i data-feather="twitter"></i>
                                        </a>
                                        <a class="btn btn-google" href="#">
                                            <i data-feather="mail"></i>
                                        </a>
                                        <a class="btn btn-github" href="#">
                                            <i data-feather="github"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Login-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
