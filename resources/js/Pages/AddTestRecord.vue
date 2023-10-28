<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import InputError from '@/Components/InputError.vue';
import {computed, onMounted, ref} from "vue";
import {useForm} from "@inertiajs/vue3";

import {store} from "@/store";

const formNewTestRecord = useForm({
    responsible_manager_id: null,
    full_name: "",
    location: "",
    is_gradable: false,
    date: null,
});

const assignManager = ref(false);
const managers = computed(() => {
    return store.initialProps.managers;
});
onMounted(() => {
    //   <!-- BEGIN: Theme JS-->
    $.getScript(
        "tpl_0/app-assets/js/core/app-menu.js",
        function (data, textStatus, jqxhr) {
            $.getScript(
                "tpl_0/app-assets/js/core/app.js",
                function (data, textStatus, jqxhr) {
                    // <!-- BEGIN: Page JS-->
                    $.getScript(
                        "data/pages/invoice.js",
                        function (data, textStatus, jqxhr) {
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

    assignManager.value._managers = store.initialProps.managers;
    window.__t = () => {
        const selectedManagerId =
            assignManager.value.querySelector("select").value;
        //  console.log({_managers:$('.assign-manager')[0]._managers})
        console.log({selectedManagerId});
    };
});

function submit() {
    formNewTestRecord
        .transform((data) => ({
            ...data,
            responsible_manager_id: assignManager.value.querySelector("select").value

        }))
        .post(route('test_record_store'), {
            preserveScroll: true,
            onSuccess: (res) => {
                console.log("onSuccess", {res});
            },
        });
}
</script>

<template>
    <AppLayout title="AddTestRecord">
        <template #header>
            <div class="row" style="justify-content: center">
                <div class="col-xl-9 col-md-8 col-12">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">AddTestRecord</h2>
                </div>
            </div>
        </template>
        <section class="invoice-add-wrapper">
            <div class="row invoice-add" style="justify-content: center">
                <!-- Invoice Add Left starts -->
                <div class="col-xl-9 col-md-8 col-12">
                    <div class="card invoice-preview-card">
                        <!-- Header starts -->
                        <div class="card-body invoice-padding pb-0">
                            <div
                                class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0"
                            >
                                <div>
                                    <div class="logo-wrapper">
                                        <svg
                                            height="24"
                                            version="1.1"
                                            viewBox="0 0 139 95"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                        >
                                            <defs>
                                                <linearGradient
                                                    id="invoice-linearGradient-1"
                                                    x1="100%"
                                                    x2="50%"
                                                    y1="10.5120544%"
                                                    y2="89.4879456%"
                                                >
                                                    <stop offset="0%" stop-color="#000000"/>
                                                    <stop offset="100%" stop-color="#FFFFFF"/>
                                                </linearGradient>
                                                <linearGradient
                                                    id="invoice-linearGradient-2"
                                                    x1="64.0437835%"
                                                    x2="37.373316%"
                                                    y1="46.3276743%"
                                                    y2="100%"
                                                >
                                                    <stop offset="0%" stop-color="#EEEEEE" stop-opacity="0"/>
                                                    <stop offset="100%" stop-color="#FFFFFF"/>
                                                </linearGradient>
                                            </defs>
                                            <g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1">
                                                <g transform="translate(-400.000000, -178.000000)">
                                                    <g transform="translate(400.000000, 178.000000)">
                                                        <path
                                                            class="text-primary"
                                                            d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                                            style="
                                                                fill: currentColor;
                                                            "
                                                        />
                                                        <path
                                                            d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                                            fill="url(#invoice-linearGradient-1)"
                                                            opacity="0.2"
                                                        />
                                                        <polygon
                                                            fill="#000000"
                                                            opacity="0.049999997"
                                                            points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"
                                                        />
                                                        <polygon
                                                            fill="#000000"
                                                            opacity="0.099999994"
                                                            points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"
                                                        />
                                                        <polygon
                                                            fill="url(#invoice-linearGradient-2)"
                                                            opacity="0.099999994"
                                                            points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"
                                                        />
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        <h3 class="text-primary invoice-logo">Vuexy</h3>
                                    </div>
                                    <p class="card-text mb-25">Office 149, 450 South Brand Brooklyn</p>
                                    <p class="card-text mb-25">San Diego County, CA 91905, USA</p>
                                    <p class="card-text mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p>
                                </div>
                                <div class="invoice-number-date mt-md-0 mt-2">
                                    <div class="d-flex align-items-center justify-content-md-end mb-1">
                                        <h4 class="invoice-title">New TestRecord</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Header ends -->

                        <hr class="invoice-spacing"/>

                        <!-- Address and Contact starts -->
                        <div class="card-body invoice-padding pt-0">
                            <div class="row row-bill-to invoice-spacing">
                                <div class="col-xl-8 mb-lg-1 col-bill-to ps-0">
                                    <h6 class="assign-to-title">Assign to:</h6>
                                    <div ref="assignManager" class="assign-manager">
                                        <div class="d-flex vstack">
                                            <select class="assignto form-select">
                                                <option></option>
                                                <option
                                                    v-for="(
                                                    manager, index
                                                ) in managers"
                                                    :key="index"
                                                    :value="manager.id"
                                                >{{ manager.name }}
                                                </option>
                                            </select>
                                            <InputError
                                                :message="formNewTestRecord.errors.responsible_manager_id"
                                                class="ps-2 pt-2 text-danger text-nowrap"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Address and Contact ends -->

                        <!-- Product Details starts -->
                        <div class="card-body invoice-padding invoice-product-details">
                            <form class="source-item" @submit.prevent="submit">
                                <div data-repeater-list="group-a">
                                    <div class="repeater-wrapper" data-repeater-item>
                                        <div class="row">
                                            <div class="col-12 d-flex product-details-border position-relative pe-0">
                                                <div class="row w-100 pe-lg-0 pe-1 py-5">
                                                    <div class="d-flex vstack align-items-center py-2">
                                                        <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                                                            <div class="d-flex my-1">
                                                                <label
                                                                    class="form-label px-1"
                                                                    style="
                                                                        white-space: nowrap;
                                                                    "
                                                                >
                                                                    Full name
                                                                    of the
                                                                    subject:
                                                                </label>
                                                                <div class="d-flex vstack">
                                                                    <input
                                                                        v-model="
                                                                        formNewTestRecord.full_name
                                                                    "
                                                                        class="form-control ms-50"
                                                                        placeholder="Miss Aimee Effertz"
                                                                        type="text"
                                                                    />
                                                                    <InputError
                                                                        :message="
                                                                        formNewTestRecord.errors.full_name
                                                                    "
                                                                        class="ps-2 pt-2 text-danger text-nowrap"
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                                                            <div class="d-flex my-1">
                                                                <label
                                                                    class="form-label px-1"
                                                                    style="
                                                                        white-space: nowrap;
                                                                    "
                                                                >
                                                                    location
                                                                    :
                                                                </label>
                                                                <div class="d-flex vstack">
                                  <textarea
                                      v-model="
                                                                        formNewTestRecord.location
                                                                    "
                                      class="form-control ms-50"
                                      placeholder="4013 Jake Plains Apt. 753
West Annetta, AR 25482-6025"
                                      rows="2"
                                  ></textarea>
                                                                    <InputError
                                                                        :message="
                                                                        formNewTestRecord.errors.location
                                                                    "
                                                                        class="ps-2 pt-2 text-danger text-nowrap"
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                                                            <div class="d-flex align-items-center mb-1">
                                                                <label
                                                                    class="form-label px-1"
                                                                    style="
                                                                        white-space: nowrap;
                                                                    "
                                                                >
                                                                    Make
                                                                    gradable?
                                                                    :
                                                                </label>
                                                                <div class="form-check form-check-primary form-switch">
                                                                    <input
                                                                        v-model="
                                                                            formNewTestRecord.is_gradable
                                                                        "
                                                                        class="form-check-input cursor-pointer"
                                                                        type="checkbox"
                                                                    />
                                                                    <InputError
                                                                        :message="
                                                                            formNewTestRecord.errors.is_gradable
                                                                        "
                                                                        class="ps-2 pt-2 text-danger text-nowrap"
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                                                            <div class="d-flex mt-2 mb-1">
                                                                <label
                                                                    class="form-label px-1"
                                                                    style="
                                                                        white-space: nowrap;
                                                                    "
                                                                >Issue date:</label>
                                                                <div class="d-flex vstack">
                                                                    <div
                                                                        class="form-check form-check-primary form-switch">
                                                                        <input
                                                                            v-model="
                                                                            formNewTestRecord.date
                                                                        "
                                                                            class="form-control invoice-edit-input date-picker"
                                                                            type="text"
                                                                        />
                                                                    </div>
                                                                    <InputError
                                                                        :message="
                                                                            formNewTestRecord.errors.date
                                                                        "
                                                                        class="ps-2 pt-0 text-danger text-nowrap"
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                                                            <div class="d-flex justify-content-end mb-1">
                                                                <button class="btn btn-primary">Ok</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex flex-column align-items-center justify-content-between border-start invoice-product-actions py-50 px-25"
                                                >
                                                    <i
                                                        class="cursor-pointer font-medium-3"
                                                        data-feather="x"
                                                        data-repeater-delete
                                                    ></i>
                                                    <div class="dropdown">
                                                        <i
                                                            id="dropdownMenuButton"
                                                            aria-expanded="false"
                                                            aria-haspopup="true"
                                                            class="cursor-pointer more-options-dropdown me-0"
                                                            data-bs-toggle="dropdown"
                                                            data-feather="settings"
                                                            role="button"
                                                        ></i>
                                                        <div
                                                            aria-labelledby="dropdownMenuButton"
                                                            class="dropdown-menu dropdown-menu-end item-options-menu p-50"
                                                        >
                                                            <div class="mb-1">
                                                                <label class="form-label" for="discount-input">Discount(%)</label>
                                                                <input id="discount-input" class="form-control"
                                                                       type="number"/>
                                                            </div>
                                                            <div class="form-row mt-50">
                                                                <div class="mb-1 col-md-6">
                                                                    <label class="form-label" for="tax-1-input">
                                                                        Tax
                                                                        1
                                                                    </label>
                                                                    <select
                                                                        id="tax-1-input"
                                                                        class="form-select tax-select"
                                                                        name="tax-1-input"
                                                                    >
                                                                        <option selected value="0%">0%</option>
                                                                        <option value="1%">1%</option>
                                                                        <option value="10%">10%</option>
                                                                        <option value="18%">18%</option>
                                                                        <option value="40%">40%</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-1 col-md-6">
                                                                    <label class="form-label" for="tax-2-input">
                                                                        Tax
                                                                        2
                                                                    </label>
                                                                    <select
                                                                        id="tax-2-input"
                                                                        class="form-select tax-select"
                                                                        name="tax-2-input"
                                                                    >
                                                                        <option selected value="0%">0%</option>
                                                                        <option value="1%">1%</option>
                                                                        <option value="10%">10%</option>
                                                                        <option value="18%">18%</option>
                                                                        <option value="40%">40%</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown-divider my-1"></div>
                                                            <div class="d-flex justify-content-between">
                                                                <button
                                                                    class="btn btn-outline-primary btn-apply-changes"
                                                                    type="button"
                                                                >Apply
                                                                </button>
                                                                <button class="btn btn-outline-secondary" type="button">
                                                                    Cancel
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Product Details ends -->

                        <hr class="invoice-spacing mt-0"/>

                        <div class="card-body invoice-padding py-0">
                            <!-- Invoice Note starts -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label fw-bold" for="note">Note:</label>
                                        <textarea id="note" class="form-control" rows="2">
It was a pleasure working with you and your team. We hope you will keep us in mind for future freelance projects. Thank You!</textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- Invoice Note ends -->
                        </div>
                    </div>
                </div>
                <!-- Invoice Add Left ends -->
            </div>

            <!-- Add New Customer Sidebar -->
            <div id="add-new-customer-sidebar" aria-hidden="true" class="modal modal-slide-in fade">
                <div class="modal-dialog sidebar-lg">
                    <div class="modal-content p-0">
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">×</button>
                        <div class="modal-header mb-1">
                            <h5 class="modal-title">
                                <span class="align-middle">Add Customer</span>
                            </h5>
                        </div>
                        <div class="modal-body flex-grow-1">
                            <form>
                                <div class="mb-1">
                                    <label class="form-label" for="customer-name">Customer Name</label>
                                    <input id="customer-name" class="form-control" placeholder="John Doe" type="text"/>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="customer-email">Email</label>
                                    <input
                                        id="customer-email"
                                        class="form-control"
                                        placeholder="example@domain.com"
                                        type="email"
                                    />
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="customer-address">Customer Address</label>
                                    <textarea
                                        id="customer-address"
                                        class="form-control"
                                        cols="2"
                                        placeholder="1307 Lady Bug Drive New York"
                                        rows="2"
                                    ></textarea>
                                </div>
                                <div class="mb-1 position-relative">
                                    <label class="form-label" for="customer-country">Country</label>
                                    <select id="customer-country" class="form-select" name="customer-country">
                                        <option label="select country"></option>
                                        <option value="Australia">Australia</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United States of America">United States of America</option>
                                    </select>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="customer-contact">Contact</label>
                                    <input
                                        id="customer-contact"
                                        class="form-control"
                                        placeholder="763-242-9206"
                                        type="number"
                                    />
                                </div>
                                <div class="mb-1 d-flex flex-wrap mt-2">
                                    <button class="btn btn-primary me-1" data-bs-dismiss="modal" type="button">Add
                                    </button>
                                    <button
                                        class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal"
                                        type="button"
                                    >Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add New Customer Sidebar -->
        </section>
    </AppLayout>
</template>
