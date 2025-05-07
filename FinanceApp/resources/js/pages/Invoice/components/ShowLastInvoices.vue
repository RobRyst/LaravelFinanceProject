<template>
    <Head title="Dashboard" />

    <div class="py-12">
        <div class="mb-2 ml-8 flex">
            <button @click="showForm = true" class="rounded bg-zinc-700 px-4 py-2 text-white hover:bg-blue-700">+ New Invoice</button>
        </div>

        <Create v-if="showForm" @close="closeInvoiceCreateModal" />
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <ag-grid-vue class="ag-theme-alpine" style="height: 500px; width: 100%" :columnDefs="columnDefs" :rowData="rowData" />
        </div>
    </div>
</template>

<script>
import { Head } from '@inertiajs/vue3';
import { AllCommunityModule, ModuleRegistry } from 'ag-grid-community';
import { AgGridVue } from 'ag-grid-vue3';
import axios from 'axios';
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
            columnDefs: [
                { field: 'firstname', filter: true },
                { field: 'lastname', filter: true },
                { field: 'email', filter: true },
                { field: 'total', filter: true },
                { field: 'invoice_created', filter: true },
                { field: 'invoice_due_date', filter: true },
                {
                    headerName: 'Actions',
                    field: 'id',
                    cellRenderer: (params) => {
                        const button = document.createElement('button');
                        button.innerText = 'Delete';
                        button.className = 'bg-red-500 text-white px-2 py-1 rounded';

                        button.addEventListener('click', async () => {
                            const invoiceId = params.data.id;
                            if (confirm('Delete this invoice?')) {
                                await this.deleteInvoice(invoiceId);
                            }
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
                alert('Invoice deleted.');
                // eslint-disable-next-line @typescript-eslint/no-unused-vars
            } catch (error) {
                alert('Failed to delete invoice.');
            }
        },

        closeInvoiceCreateModal() {
            this.showForm = false;
        },
    },
};
</script>
