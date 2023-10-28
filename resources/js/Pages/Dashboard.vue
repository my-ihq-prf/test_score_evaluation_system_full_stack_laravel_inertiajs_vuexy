<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {onMounted, ref} from "vue";
import {useForm} from "@inertiajs/vue3";

import {store} from '@/store'


const tbTestRecord = ref(false);

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
                        "data/ajax/test-list.js",
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
    tbTestRecord.value._onTestRecordChange = onTestRecordChange
    tbTestRecord.value._onTestRecordDelete = onTestRecordDelete
    tbTestRecord.value._user = store.initialProps.auth.user
    tbTestRecord.value._addTestRecordUrl = route('add_test_record')
});

const formTestRecord = useForm({
    data: null,
})

function onTestRecordChange(id, data, dt) {
    formTestRecord
        .transform(() => ({data})).put(route('test_record_update', id), {
        preserveScroll: true,
        onSuccess: (res) => {

            dt.ajax.reload()
        },
    })
}

function onTestRecordDelete(id, dt) {
    formTestRecord.delete(route('test_record_delete', id), {
        preserveScroll: true,
        onSuccess: (res) => {

            dt.ajax.reload()
        },
    })
}


</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <section class="invoice-list-wrapper">
            <div class="card">
                <div class="card-datatable table-responsive">
                    <table ref="tbTestRecord" class="invoice-list-table table">
                        <thead>
                        <tr>
                            <th style="text-align: center;">#</th>
                            <th style="text-align: center;">name</th>
                            <th class="text-truncate" style="text-align: center;">date</th>
                            <th style="text-align: center;">location</th>
                            <th style="text-align: center;">grade</th>
                            <th style="text-align: center;">is_gradable</th>
                            <th style="text-align: center;">Client</th>
                            <th class="text-truncate" style="text-align: center;">Manager</th>
                            <th style="text-align: center;">actions</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </section>
    </AppLayout>
</template>
