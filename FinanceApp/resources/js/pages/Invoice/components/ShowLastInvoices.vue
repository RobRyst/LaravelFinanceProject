<template>
    <Head title="Dashboard" />

    <div class="py-12">
        <div class="mb-3 flex flex-row justify-between">
            <div>
                <input
                    v-model="quickFilterText"
                    type="text"
                    placeholder="Søk gjennom Invoices"
                    class="w-3/3 ml-8 rounded rounded-xl border px-4 py-2 shadow-sm focus:outline-none"
                />
            </div>
            <div class="flex flex-row">
                <div class="ml-2 mr-8 flex">
                    <button @click="showForm = true" class="rounded rounded-xl bg-zinc-700 px-4 py-2 text-white hover:bg-blue-700">
                        + New Invoice
                    </button>
                </div>
                <div class="ml-2 mr-8 flex">
                    <button @click="exportInvoices" class="rounded rounded-xl bg-zinc-700 px-4 py-2 text-white hover:bg-blue-700">
                        Download all
                    </button>
                </div>
            </div>
        </div>

        <Create v-if="showForm" @close="closeInvoiceCreateModal" />
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <ag-grid-vue
                class="ag-theme-alpine"
                style="height: 500px; width: 100%"
                :columnDefs="columnDefs"
                :rowData="rowData"
                :quickFilterText="quickFilterText"
                @grid-ready="onGridReady"
                @cell-value-changed="onCellValueChanged"
            />
        </div>
    </div>
</template>

<script lang="ts">
import { Head } from '@inertiajs/vue3';
import { AllCommunityModule, ModuleRegistry } from 'ag-grid-community';
import { AgGridVue } from 'ag-grid-vue3';
import axios from 'axios';
import Swal from 'sweetalert2';
import Create from '../Create.vue';

ModuleRegistry.registerModules([AllCommunityModule]);

export default {
    name: 'ShowLastInvoice',
    components: {
        AgGridVue,
        Create,
        // eslint-disable-next-line vue/no-reserved-component-names
        Head,
    },
    data() {
        return {
            showForm: false,
            gridApi: null,
            quickFilterText: '',
            columnDefs: [
                { field: 'firstname', filter: true },
                { field: 'lastname', filter: true },
                { field: 'email', filter: true },
                { field: 'total', filter: true, editable: true, cellEditor: 'agTextCellEditor' },
                { field: 'invoice_created', filter: true },
                { field: 'invoice_due_date', filter: true, editable: true, cellEditor: 'agTextCellEditor' },
                {
                    headerName: 'Actions',
                    field: 'id',
                    cellRenderer: (params) => {
                        const button = document.createElement('button');
                        button.innerText = 'Delete';
                        button.className = 'bg-red-500 text-white px-2 py-1 rounded';

                        button.addEventListener('click', async () => {
                            const invoiceId = params.data.id;
                            Swal.fire({
                                title: 'Are you sure want to delete the invoice?',
                                text: "You won't be able to revert this!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, delete it!',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    this.deleteInvoice(invoiceId);
                                    Swal.fire({
                                        title: 'Deleted!',
                                        text: 'Invoice has been deleted.',
                                        icon: 'success',
                                    });
                                }
                            });
                        });

                        return button;
                    },
                },
                {
                    headerName: 'Download',
                    field: 'id',
                    cellRenderer: (params) => {
                        const invoiceBtn = document.createElement('button');
                        invoiceBtn.textContent = 'Download';
                        invoiceBtn.className = 'bg-blue-500 text-white px-2 py-1 rounded';

                        invoiceBtn.addEventListener('click', () => {
                            window.open(`/invoices/${params.data.id}/download`, '_blank');
                        });

                        return invoiceBtn;
                    },
                },
            ],
            rowData: [],
        };
    },
    mounted() {
        this.loadInvoices();
    },
    methods: {
        async loadInvoices() {
            try {
                const response = await axios.get('http://localhost:8000/api/invoices');
                this.rowData = response.data.map((invoice) => ({
                    id: invoice.id,
                    firstname: invoice.user.firstname,
                    lastname: invoice.user.lastname,
                    email: invoice.user.email,
                    total: invoice.total,
                    invoice_created: invoice.invoice_created,
                    invoice_due_date: invoice.invoice_due_date,
                }));
            } catch (error) {
                console.error('Error loading invoices:', error);
            }
        },
        async deleteInvoice(id) {
            try {
                await axios.delete(`http://localhost:8000/api/invoices/${id}`);
                this.rowData = this.rowData.filter((invoice) => invoice.id !== id);
                // eslint-disable-next-line @typescript-eslint/no-unused-vars
            } catch (error) {
                alert('Failed to delete invoice.');
            }
        },

        async onCellValueChanged(event) {
            const { data, colDef } = event;
            const updatedField = colDef.field;

            const payload = {
                [updatedField]: data[updatedField],
            };

            try {
                await axios.put(`/api/invoices/${data.id}`, payload);
                console.log('Invoice updated successfully');
            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong when updating Invoice!',
                });
                console.error(error);
            }
        },

        onGridReady(params) {
            this.gridApi = params.api;
        },

        exportInvoices() {
            if (!this.gridApi) return;

            this.gridApi.exportDataAsCsv({
                fileName: 'invoices-overview.csv',
                columnKeys: this.columnDefs
                    .filter((col) => col.field && col.headerName !== 'Actions' && col.headerName !== 'Download')
                    .map((col) => col.field),
            });
        },

        closeInvoiceCreateModal() {
            this.showForm = false;
        },
    },
};
</script>
